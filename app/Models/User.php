<?php

namespace App\Models;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Logs;
use App\Notifications\CustomNotification;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ADMIN_ROLE = 1;
    const COMPANY_ROLE = 2;
    const MEMBER_ROLE = 3;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // protected $dispatchesEvents = [
    //     'created'=> SendEmailVerificationNotification::class,
    // ];
    public function logs(): MorphMany
    {
        return $this->morphMany(Logs::class, 'logable');
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomNotification($token));
    }
}
