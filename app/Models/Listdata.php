<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listdata extends Model
{
    use HasFactory;

    protected $fillable = [

        'firstname',
        'lastname',
        'emirate_id_number',
        'status',
        'unit_number',
        'email',
        'nationality',
        'mobile',
        'alternate_mobile',
        'comment',
        'contact',
        'project',
        'note',
        'user_id',
        'created_by',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function createby() {
        return $this->belongsTo(User::class,'created_by');
    }
    public function listings() {
        return $this->hasMany(Listing::class,'owner_id');
    }
}

