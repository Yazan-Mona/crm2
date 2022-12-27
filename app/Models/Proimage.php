<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proimage extends Model
{
    use HasFactory;
        protected $fillable = [
        'project_id',
        'filename',
    ];

    public function project() {
        return $this->belongsTo(Project::class,'project_id');
    }
}
