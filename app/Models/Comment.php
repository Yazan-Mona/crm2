<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public $table = 'comments';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'activity',
        'user_id',
        'listing_id',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
        'file',
    ];


    public function listing() {
        return $this->belongsTo(Listing::class,'listing_id');
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
