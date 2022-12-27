<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;
    public const ACTIVITY_SELECT = [
        'call' => 'Call', 
        'meeting' => 'Meeting',
        'viewing' => 'Viewing',
    ];

    public $table = 'followups';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'activity',
        'user_id',
        'contact_id',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
        'file',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
       public function contact() {
        return $this->belongsTo(Contact::class,'contact_id');
    }
}
