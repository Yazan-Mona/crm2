<?php

namespace App\Imports;

use App\Models\Owner;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportOwner implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Owner([
            'firstname' => $row[0],
            'lastname' => $row[1],
            'emirate_id_number'=> $row[2],
            'source' => $row[3],
            'email' => $row[4],
            'nationality' => $row[5],
            'mobile' => $row[6],
            'alternate_mobile' => $row[7],

            'state' => $row[8],
            'unitNo' => $row[9],
            'call' => $row[10],

            'created_at' => $row[11],
            'updated_at' => $row[12],
            'user_id' => $row[13],
            'created_by' => $row[14],
            'project_id' => $row[15],
        ]);



    }
}
