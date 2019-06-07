<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ConvertCurrencyTrait;

class APIController extends Controller
{
    use ConvertCurrencyTrait;
    public function postConvert(Request $r){

    
    $cost = $this->convertWithEnvRate($r->credits);
    return [
        'cost' => $cost
    ];

    }
}
