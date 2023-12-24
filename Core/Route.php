<?php

namespace Core;

class Route
{
    protected $route = [];

    protected function add($uri,$Controller,$method="GET"){
        $this->route[]=compact("uri","Controller","method");
    }

    public function route($uri,$method){
        foreach($this->route as $routes){
            if($routes['method']==strtoupper($method) && $routes['uri']==$uri){
               return require base_path("Controller/{$routes['Controller']}");
            }
        }

        return Route::abort();
    }

    public function get($uri,$controller):Route{
        $this->add($uri,$controller,"GET");
        return $this;
    }

    public function post($uri,$controller):Route{
        $this->add($uri,$controller,"POST");
        return $this;
    }

    public function show():array{
        return $this->route;
    }


    //for showing error handling messages
    static function abort($error=404){
        return require base_path("Controller/{$error}.php");
    }
}