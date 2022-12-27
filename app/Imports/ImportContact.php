<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportContact implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'firstname' => $row[0],
            'lastname' => $row[1],
            'email' => $row[2],
            'nationality' => $row[3],
            'source' => $row[4],
            'status' => $row[5],
            'lead_status' => $row[6],
            'mobile' => $row[7],
            'alternate_mobile' => $row[8],
            'created_at' => $row[9],
            'updated_at' => $row[10],
            'user_id' => $row[11],
            'created_by' => $row[12],
        ]);
    }
}
