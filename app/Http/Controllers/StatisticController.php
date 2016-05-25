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
    

    /**
     * add pv by artwork_id
     *
     * @param $artworkid
     */
    public function addLikeByArtworkMD5($artwork_md5)
    {

        $statistic = new Statistic();
        $statistic->artworkid = $artworkid;
        $statistic->type = 'like';
        $statistic->ip = $this->request->ip();

        if($statistic->save())
            return response()->json(['code' => '1', 'message' => 'addlikebyartwork success!']);
        else
            return response()->json(['code' => '0', 'message' => 'addlikebyartwork fail!']);

    }


}
