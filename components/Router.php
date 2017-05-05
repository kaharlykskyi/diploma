<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
     * Returns request string
     * @return string
     */
    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $uriPatern => $path) {
            if( preg_match("~$uriPatern~", $uri)) {
                $internalRoute = preg_replace("~$uriPatern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                $controllerObj = new $controllerName;
                if (method_exists($controllerObj, $actionName)){
                    $result = call_user_func_array(array($controllerObj, $actionName), $parameters);
                    if( $result != null ) {
                        break;
                    }
                } else {
                    include_once(ROOT.'/views/site/404.html');
                    return true;
                }
            }
        }
    }
}