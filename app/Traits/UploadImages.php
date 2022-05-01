<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadImages
{
    /**
     * @param $image
     * @return string
     */
    protected function uploadImage($image): string
    {
        $fileName = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();

        foreach ($this->folders as $folder) {
            $img = Image::make($image);
            if (preg_match('/^(\d+)x(\d+)$/', $folder, $parameters)) {
                [,$width, $height] = $parameters;
                $img->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $path = "{$this->root_folder}/{$folder}/";
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }

            $img->save($path . $fileName);
        }

       return $fileName;
    }

    /**
     * @param $image_name
     * @return void
     */
    protected function deleteOldImages($image_name)
    {
        if ($image_name) {
            foreach ($this->folders as $folder) {
                Storage::delete("{$this->root_folder}/{$folder}/{$image_name}");
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getRootFolderAttribute(): string
    {
        return $this->image_folder ?? 'uploads';
    }

    public function getFoldersAttribute()
    {
        return $this->images ?? ['origin' => 'origin'];
    }
}
