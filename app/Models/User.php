<?php

namespace App\Models;

use App\Models\Traits\HasTwoFactorAuthentication;
use App\Notifications\MailResetPasswordNotification;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use App\Tenant\Traits\ForSystem;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable, HasRolesAndAbilities, HasMediaTrait, ForSystem, HasTwoFactorAuthentication;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'password_updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'password_updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(30)
            ->height(30)
            ->performOnCollections('avatars');

        $this->addMediaConversion('profile')
            ->width(200)
            ->height(200)
            ->performOnCollections('avatars');

    }
}
