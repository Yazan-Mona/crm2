<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public const PURPOSE_SELECT = [
        'Sale' => 'Sale',
        'Rent' => 'Rent',
    ];
     public const PRICING_DURATION_SELECT = [
        'Yearly' => 'Yearly',
        'Monthly' => 'Monthly',
    ];
    public const STATE_SELECT = [
        'Hot' => 'Hot',
        'Signature' => 'Signature',
        'Basic' => 'Basic',
    ];
    
    public const TYPE_SELECT = [
        'Villa' => 'Villa',
        'Apartment' => 'Apartment',
        'Studio' => 'Studio',
        'Townhouse' => 'Townhouse',
        'Office' => 'Office',
        'Plot' => 'Plot',
    ];

    
    
    public $table = 'listings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'title',
        'type',
        'purpose',
        'rent_pricing_duration',
        'price',
        'beds',
        'baths',
        'plotarea_size',
        'area_size',
        'plotarea_size_postfix',
        'area_size_postfix',
        'developer',
        'note',
        'description',
        'state',
        'unitNo',
        'owner_id',
        'user_id',
        'project_id',
        'ref',
        'main_image',
        'images',
        'file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function usert() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function owner() {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    public function project() {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class,'listing_id');
    }
}
