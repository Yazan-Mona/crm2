<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'team_role',
        'team_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Comments() {
        return $this->hasMany(Comment::class,'user_id');
    }
    public function Followups() {
        return $this->hasMany(Followup::class,'user_id');
    }
    public function Listings() {
        return $this->hasMany(Listing::class,'user_id');
    }
    public function Contacts() {
        return $this->hasMany(Contact::class,'user_id');
    }

    public function team() {
        return $this->belongsTo(Team::class,'team_id');
    }
}
