<?php

namespace App\Models;

use App\Traits\UploadImages;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UploadImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'favorite_card_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The image resolutions to save
     *
     * @var array<int, string>
     */
    protected $images = [
        'origin' => 'origin',
        'small' => '150x150',
    ];

    /**
     * photo directory
     * @var string
     */
    protected $image_folder = 'photos';

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function paymentCards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PaymentCard::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    /**
     * @return string
     */
    public function getSmallAvatarAttribute(): string
    {
        return asset("photos/{$this->images['small']}/{$this->photo}");
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    /**
     * Add a mutator to ensure hashed passwords
     * @param $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param $photo
     * @return void
     */
    public function setPhotoAttribute($photo)
    {
        $fileName = $this->uploadImage($photo);

        $this->deleteOldImages($this->photo);

        $this->attributes['photo'] = $fileName;
    }
}
