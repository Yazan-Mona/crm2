<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public const PROPERTY_TYPE_SELECT = [
        'Villa' => 'Villa',
        'Townhouse' => 'Townhouse',
        'Penthouse' => 'Penthouse',
        'Beach house' => 'Beach House',
        'Apartment' => 'Apartment',
        'Studio' => 'Studio',
        'Plot' => 'Plot',
        'Office' => 'Office',
    ];

    protected $casts = [
        'property_type' => 'array',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'ref',
        'name',
        'community',
        'description',
        'developer',
        'emirate',
        'state',
        'note',
        'title',
        'property_type',
        'floor_number',
        'created_at',
        'updated_at',
        'deleted_at',
        'main_image',
        'images',
        'file',
    ];


    public function listings() {
        return $this->hasMany(Listing::class,'project_id');
    }
    public function images() {
        return $this->hasMany(Proimage::class,'project_id');
    }
}
