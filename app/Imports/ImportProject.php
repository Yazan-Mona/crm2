<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProject implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'ref' => $row[0],
            'name' => $row[1],
            'community'=> $row[2],
            'description' => $row[3],
            'developer' => $row[4],
            'emirate' => $row[5],
            'state' => $row[6],
            'note' => $row[7],
            'title' => $row[8],
            'main_image' => $row[9],
            'images' => $row[10],
            'file' => $row[11],
            'property_type' => $row[12],
            'floor_number' => $row[13],
            'created_at' => $row[14],
            'updated_at	' => $row[15],
        ]);



    }
}
