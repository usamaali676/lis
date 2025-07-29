<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Carbon\CarbonInterface;
use SimpleStatsIo\LaravelClient\Contracts\TrackablePerson;
use SimpleStatsIo\LaravelClient\Contracts\TrackablePersonWithCondition;

class User extends Authenticatable implements MustVerifyEmail
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
        'role_id',
        'password',
        'status',
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function passTrackingCondition(): bool
    {
        return $this->email_verified_at != NULL;
    }

    /**
     * The field(s) we should watch for changes to recheck the condition.
     */
    public function watchTrackingFields(): array
    {
        return ['email_verified_at'];
    }
    public function getTrackingTime(): CarbonInterface
    {
        return $this->created_at;
    }
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

}
