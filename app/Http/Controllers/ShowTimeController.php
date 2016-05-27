<?php

namespace App\Http\Controllers;


class ShowTimeController extends BaseController
{

    /**
     * welcome
     *
     * @return mixed
     */
    public function welcome()
    {
        $wechat = app('wechat');
        return view('welcome', ['js'=>$wechat->js]);
    }
}
