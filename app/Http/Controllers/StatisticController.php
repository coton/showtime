<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Statistic;

class StatisticController extends Controller
{
    public $request;

    /**
     * StatisticController constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    

 


}
