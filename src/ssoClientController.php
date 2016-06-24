<?php

namespace zhoufanqq\ssoClient;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ssoClient;

class ssoClientController extends Controller
{
    public function check(Request $request){

        return ssoClient::check($request);

    }

}
