<?php

class Router {
    public static function get($url, $class, $params = '') {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
            Router::call_router($url, $class, $params);
    }

    public static function post($url, $class, $params = '') {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            Router::call_router($url, $class, $params);
    }

    public static function call_router($url, $class, $params) {
        $uri = isset($_GET['uri']) ? '/' . preg_replace('(\/$)', '', $_GET['uri']) : '/';

        if($uri == $url) {
            Router::validate($params);
            Router::call_class($class);
        }
        else if(strpos($url, ':') !== FALSE) {
            $_uri = explode('/', $uri);
            $_url = explode('/', $url);

            if(count($_uri) == count($_url)){
                $args = [];

                for($i = 0; $i < count($_uri); $i++) {
                    if(strpos($_url[$i], ':') !== FALSE)
                        $args[] = $_uri[$i];
                    else if($_uri[$i] != $_url[$i])
                        return;
                }

                Router::validate($params);
                Router::call_class($class, $args);
            }
        }
    }

    public static function validate($params) {
        if($params == '')
            return;

        $params = explode(':', $params);

        if($params[0] == 'login' && !isset($_SESSION['userlevel']))
            Response::redirectWithAlert('login/', ['danger', 'Anda harus login dulu']);
        else if($params[0] == 'notlogin' && isset($_SESSION['userlevel']))
            Response::redirect('');
        else if(($params[1] == 1 && $_SESSION['userlevel'] == 2) || ($params[1] == 2 && $_SESSION['userlevel'] == 1))
            Response::redirect('');
    }

    public static function call_class($class, $args = []) {
        $class = explode('@', $class);
        $model = BASEPATH . "models/" . str_replace('Controller', '', $class[0]) . ".php";

        if(file_exists($model) && !class_exists(str_replace('Controller', '', $class[0])))
            include $model;

        include BASEPATH . "controllers/" . $class[0] . ".php";
        $obj = new $class[0];
        call_user_func_array([$obj, $class[1]], $args);

        exit();
    }

    public static function not_found() {
        Response::part('404');
        exit();
    }

    public static function resource($url, $class, $params = '') {
        Router::get($url, $class . '@index', $params);
        Router::get($url . "/add", $class . '@add', $params);
        Router::post($url . "/add", $class . '@store', $params);
        Router::get($url . "/:id/edit", $class . '@edit', $params);
        Router::post($url . "/:id/edit", $class . '@update', $params);
        Router::get($url . "/:id/delete", $class . '@delete', $params);
    }
}