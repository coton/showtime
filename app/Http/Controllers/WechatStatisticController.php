<?php

namespace App\Http\Controllers;

use App\Models\WechatStatistic;
use Illuminate\Http\Request;

use App\Http\Requests;

class WechatStatisticController extends Controller
{

    /**
     * wechat statistic
     *
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request)
    {
        $wechat_statistic = new WechatStatistic();
        $wechat_statistic->page = $request->page;
        $wechat_statistic->artwork_md5 = $request->artworkmd5;
        $wechat_statistic->type = $request->type;
        $wechat_statistic->ip = $request->getClientIp();

        if($wechat_statistic->save())
            return response()->json(['code' => '1', 'success' => 'success']);
        else
            return response()->json(['code' => '0', 'error' => 'error']);
    }
}
