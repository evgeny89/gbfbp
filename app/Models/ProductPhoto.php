<?php

namespace App\Models;

use App\Traits\UploadImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    use HasFactory, UploadImages;

    protected $fillable = [
        'file_name',
        'product_id',
    ];

    protected $images = [
        'origin' => 'origin',
        'small' => '150x198',
        'medium' => '250x330',
        'large' => '523x600',
    ];

    protected $appends = [
        'image',
        'small_image',
        'medium_image',
        'large_image',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTION
    |--------------------------------------------------------------------------
    */
    public function delete()
    {
        $this->deleteCurrentImages($this->file_name);

        parent::delete();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getImageAttribute(): string
    {
        return asset("{$this->root_folder}/{$this->images['origin']}/{$this->file_name}");
    }

    public function getSmallImageAttribute(): string
    {
        return asset("{$this->root_folder}/{$this->images['small']}/{$this->file_name}");
    }

    public function getMediumImageAttribute(): string
    {
        return asset("{$this->root_folder}/{$this->images['medium']}/{$this->file_name}");
    }

    public function getLargeImageAttribute(): string
    {
        return asset("{$this->root_folder}/{$this->images['large']}/{$this->file_name}");
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setFileNameAttribute($image)
    {
        $fileName = $this->uploadImage($image);

        $this->deleteCurrentImages($this->file_name);

        $this->attributes['file_name'] = $fileName;
    }
}
