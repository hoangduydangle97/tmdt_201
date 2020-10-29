<?php
class App{
    protected $controller = "Home";
    protected $action = "Action";
    protected $params;

    final public function __construct(){
        $arr = $this->url_process();
        $url = [];
        if(isset($arr[0])){
            $url[] = $arr[0];
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller();
        if(isset($arr[1])){
            $url[] = $arr[1];
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        $this->params = $arr?array_values($arr):[];

        if((isset($url[0]) && $url[0] != 'login') 
            && (isset($url[0]) && $url[0] != 'logout') 
            && (isset($url[1]) && $url[1] != 'review')){
            $_SESSION['path'] = $_SERVER['REQUEST_URI'];
        }
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    final public function url_process(){
        if (isset($_GET["url"])){
            return explode("/", trim($_GET["url"]));
        }
    }
}
?>