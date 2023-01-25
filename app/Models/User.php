<?php

namespace App\Models;

use App\Services\SmsSender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Twilio\TwiML\Voice\Sms;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->hasOne(PhoneBook::class);
    }

    /**
     * @return HasOne
     */
    public function country(): HasOne
    {
        return $this->hasOne(UserCountry::class);
    }

    /**
     * @return void
     */
    public function sendWelcomeSms(): void
    {
        SmsSender::newSms($this->phone->number, env('WELCOME_SMS_TXT'));
    }
}
