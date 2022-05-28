<?php

namespace App\Models;

use App\Traits\UploadImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, UploadImages;

    protected $fillable = [
        'name',
        'slug',
        'published',
        'image',
    ];

    /**
     * The image resolutions to save
     *
     * @var array<int, string>
     */
    protected $images = [
        'origin' => 'origin',
        'home' => '320x250',
    ];

    protected $appends = [
        'home'
    ];

    /**
     * photo directory
     * @var string
     */
    protected $image_folder = 'category_photos';

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    /**
     * @return string
     */
    public function getHomeAttribute(): string
    {
        return $this->image ? asset("{$this->root_folder}/{$this->images['home']}/{$this->image}") : '';
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    /**
     * @param $image
     * @return void
     */
    public function setImageAttribute($image)
    {
        $fileName = $this->uploadImage($image);

        $this->deleteCurrentImages($this->image);

        $this->attributes['image'] = $fileName;
    }
}
