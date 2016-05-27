<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{
    protected $request;


    /**
     * StatisticController constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->setLocalebyBrowerLanguage();
        
    }


    /**
     *
     */
    private function setLocalebyBrowerLanguage()
    {
        $locale = "en";

        if(starts_with($this->request->server('HTTP_ACCEPT_LANGUAGE'),'zh-CN'))
            $locale = "zh-CN";

        App::setLocale($locale);
    }
}
