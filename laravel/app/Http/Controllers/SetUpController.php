<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SetUpController extends Controller
{
    public function native_curl_ampm($url)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_POST, true);
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, false);
                                                                         
        
        $result = curl_exec($curl_handle);

        curl_close($curl_handle);

        return $result;

    }

    public function getCoronaTabel(){
        $result = $this->native_curl_ampm("https://api.kawalcorona.com/");

        $result2 = json_decode($result, true);

        $result3 = array('data' => $result2);

        $result4 = json_encode($result3);

        //dd($result4);

        echo $result4;
    }

    public function getCorona()
    {
        $result = $this->native_curl_ampm("https://api.kawalcorona.com/");

        $result2 = json_decode($result, true);

        $total_negara = count($result2);
        $total_positif = 0;
        $total_meninggal = 0;
        $total_sembuh = 0;

        for ($i=0; $i < count($result2) ; $i++) { 
            $total_positif = $result2[$i]['attributes']['Confirmed'] + $total_positif;
            $total_meninggal = $result2[$i]['attributes']['Deaths'] + $total_meninggal;
            $total_sembuh = $result2[$i]['attributes']['Recovered'] + $total_sembuh;

        }
        

        return view('setup.setupcorona.setupcorona', compact('total_negara','total_positif','total_meninggal','total_sembuh'));
    }


}
