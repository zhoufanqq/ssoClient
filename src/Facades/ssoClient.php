<?php namespace zhoufanqq\ssoClient\Facades;


use Illuminate\Support\Facades\Facade;

class ssoClient extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ssoClient';
    }

}