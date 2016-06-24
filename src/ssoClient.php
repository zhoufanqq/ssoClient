<?php

namespace zhoufanqq\ssoClient;

use Illuminate\Http\Request;

use Redisp;

class ssoClient
{
    public function isLogin(){
        return session()->has('logged_user_zf');
    }
    public function check(Request $request){
        $api=$request->api;
        $ticket=$api.':'.config('app.key');
        echo $ticket;
        if(Redisp::exists($ticket)){
            $data = json_decode(Redisp::get($ticket), TRUE);
            Redisp::del($ticket);
            session()->setId($data['sid']);
            session()->set('logged_user_zf',$data['info']);
        }else{
            echo 'Can not find ticket';
        }
    }
    public function getUserInfo(){
        return session()->get('logged_user_zf');
    }
    public function del(){
        session()->flush();
    }
}
