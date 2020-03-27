<?php

namespace App\Imports;

use App\Models\SetUp\st_parameter;
use Maatwebsite\Excel\Concerns\ToModel;

class ParameterImport implements ToModel
{
    public function model(array $row)
    {
        return new st_parameter([
            'name' => $row[1],
        ]);
    }
}
