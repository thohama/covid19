<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\parameters_test_request;
use DB;

class ParameterExportReport implements FromQuery
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
        $tabel = DB::table('parameters_test_request')
                    ->join('st_parameter','parameters_test_request.parameter_id','=','st_parameter.id_parameter')
                    ->join('st_group','st_parameter.st_group_id','=','st_group.id_group')
                    ->join('st_method','parameters_test_request.method_id','=','st_method.id_method')
                    ->join('st_unit','parameters_test_request.unit_id','=','st_unit.id_unit')
                    ->join('sample_type_test_request','parameters_test_request.sample_type_test_id','=','sample_type_test_request.id')
                    ->join('st_sample_type','sample_type_test_request.sample_type_id','=','st_sample_type.id')
                    ->where('parameters_test_request.sample_type_test_id','=', $this->idsample)
                    ->select('st_sample_type.name as name_sample_type',
                             'sample_type_test_request.deskripsi',
                             'st_parameter.name as name_parameter',
                             'st_group.name as name_group',
                             'st_unit.name as name_unit',
                             'st_method.name as name_method',
                             'parameters_test_request.notes')
                    ->orderby('parameters_test_request.id_parameters_test_request','asc');
        return $tabel;
        //return parameters_test_request::query()->where('sample_type_test_id','=', $this->idsample);
    }
}
