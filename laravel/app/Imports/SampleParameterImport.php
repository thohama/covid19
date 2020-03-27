<?php

namespace App\Imports;

use App\Models\parameters_test_request;
use Maatwebsite\Excel\Concerns\ToModel;

class SampleParameterImport implements ToModel
{
    public function model(array $row)
    {
        return new parameters_test_request([
            'sample_type_test_id' => $row[1],
            'parameter_id' => $row[2],
            'method_id' => $row[3],
            'unit_id' => $row[4],
            'notes' => $row[5],
        ]);
    }
}
