<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref',
        'firstname',
        'lastname',
        'emirate_id_number',
        'email',
        'nationality',
        'mobile',
        'alternate_mobile',
        'source',
        'status',
        'lead_status',
        'user_id',
        'created_at',
        'created_by',
        'updated_at',
        'deleted_at',
        'unitNo',
        'project_id',
        'call',
        'state',
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
    public function project() {
        return $this->belongsTo(Project::class,'project_id');
    }

}
