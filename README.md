
[![Laravel](https://img.shields.io/badge/Laravel-~5.0-orange.svg?style=flat-square)](http://laravel.com)

适用于 Laravel 5 的 sso单点登录客户端。



## Getting Started

### 安装

    Via Composer
    
    ``` bash
    $ composer require zhoufanqq/sso-client
    ```

### 添加 Provider 到 `config/app.php` 配置项中。

  ```php
  'providers' => [

    /*
     * Application Service Providers...
     */
       App\Providers\AppServiceProvider::class,
       App\Providers\AuthServiceProvider::class,
       App\Providers\EventServiceProvider::class,
       App\Providers\RouteServiceProvider::class,
    // ...

    // 添加 FIS 的 Provider
    zhoufanqq\ssoClient\ssoClientServiceProvider::class,

  ],
  
  ```
### 如果你想更直接的使用 FIS Facades 的话，请添加 aliases。同样是 `config/app.php` 配置项中。

  ```php
  'aliases' => [

    'View' => Illuminate\Support\Facades\View::class,
    'Curl' => Ixudra\Curl\Facades\Curl::class,

    // ...

    
    'ssoClient' => zhoufanqq\ssoClient\Facades\ssoClient::class,
  ],
  ```
### **重要事项**
   *暂时使用redis保存信息，使用名为Redisp
   *默认sso异步通知URI为：
    ```
       /sso-client/check
    ```
  
### 使用
   -添加拦截中间件
   
     ``` php
     use ssoClient;
     
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            if (!ssoClient::isLogin()) {
                return redirect('login-path');
            }
            return $next($request);
        }
     ```
   
### 函数
  
  #### isLogin()
  判断用户是否登录，返回true or false
  
  #### check(Request $request)
  sso中心授权成功后，sso客户端根据返回的ticket判断用户是否登录。返回true or false 
   
  #### getUserInfo()
  返回用户信息

  ## Change Log

  ### 2015/07/13 发布 1.0 版本
