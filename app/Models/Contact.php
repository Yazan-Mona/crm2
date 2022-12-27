<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref',
        'firstname',
        'lastname',
        'email',
        'nationality',
        'salutation',
        'source',
        'status',
        'lead_status',
        'user_id',
        'assign_to',
        'mobile',
        'file',
        'alternate_mobile',
        'created_at',
        'created_by',
        'updated_at',
        'deleted_at',
    
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function createdBy() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function followups() {
        return $this->hasMany(Followup::class,'contact_id');
    }

    

}
