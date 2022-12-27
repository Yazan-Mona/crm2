<?php

namespace App\Imports;

use App\Models\Listing;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportListing implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Listing([
            'title' => $row[0],
            'type' => $row[1],
            'purpose'=> $row[2],
            'rent_pricing_duration' => $row[3],
            'price' => $row[4],
            'beds' => $row[5],
            'baths' => $row[6],
            'plotarea_size' => $row[7],
            'plotarea_size_postfix' => $row[8],
            'area_size' => $row[9],
            'area_size_postfix' => $row[10],
            'developer' => $row[11],
            'note' => $row[12],
            'description' => $row[13],
            'state' => $row[14],
            'unitNo' => $row[15],
            'available' => $row[16],
            'main_image' => $row[17],
            'images' => $row[18],
            'file' => $row[19],
            'fresh' => $row[20],
            'created_at' => $row[21],
            'updated_at' => $row[22],
            'user_id' => $row[23],
            'owner_id' => $row[24],
            'project_id' => $row[25],
            'ref' => $row[26],
          
        ]);
    }
}
