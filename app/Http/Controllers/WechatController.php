<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WechatController extends Controller
{
    /**
     * wecaht server verify
     *
     * @return string
     */
    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return "letsshowtime.com";
        });

        return $wechat->server->serve();
    }
}
