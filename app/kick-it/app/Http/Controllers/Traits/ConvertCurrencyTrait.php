<?php

namespace App\Http\Controllers\Traits;

trait ConvertCurrencyTrait{

    public function convertWithEnvRate($amount, $from ='credits' , $to='euro', $precision= 2){

        $ratio = env('CREDIT_RATIO');
        
        if($from =='credits'){
            $convert = round($amount * $ratio, $precision);
        }else{
            $convert = round($amount/$ratio, 0);
        }
        return $convert;
    }
}