<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'ExteriorStreet',
        'Interior',
        'PublicRealm',
        'RearYardArea',
        'Factsheet',
        'Finishes',
        'Floor_Plan',
        'Lifestyle_Images',
        'Master_Plan',
        'Payment_Plan',
        'brochure',

    ];

}
