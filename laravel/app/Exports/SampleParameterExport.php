<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\parameters_test_request;

class SampleParameterExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $idsample)
    {
        $this->idsample = $idsample;
    }

    public function query()
    {
        return parameters_test_request::query()->where('sample_type_test_id','=', $this->idsample);
    }
}
