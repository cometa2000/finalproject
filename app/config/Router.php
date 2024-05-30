<?php
namespace config;

require_once realpath('./vendor/autoload.php');

class Router {
    private const SERVER = "http://back-end.local/";
    private const DEP_IMG = self::SERVER."public/img/";
    private const DEP_JS = self::SERVER."public/js/";
    private const DEP_CSS = self::SERVER."public/css/";
    private const ERROR = "view/error.view.php";

    private $controller;
    private $method;
    private $routes = [];
    private $ruta2 = [];
    protected $importacion;

    public function __construct() {
        $this->importacion;
    }

    public function enlace($ruta) {
        return self::SERVER . $ruta;
    }

    public function dep_css($archivo) {
        return self::DEP_CSS . $archivo . '.css';
    }

    public function dep_js($archivo) {
        return self::DEP_JS . $archivo . '.css';
    }

    public function dep_img($archivo) {
        return self::DEP_IMG . $archivo . '.css';
    }

    public function redirigir($ruta) {
        echo '<script>window.location="/' . $ruta . '";</script>';
    }

    public function redireccion($ruta){
        $ruta_completa = self::SERVER . $ruta;
        return $ruta_completa;
    }

    public function get($ruta, $metodo) {
        $ruta_final = trim($ruta, '/');
        $this->routes['GET'][$ruta_final] = $metodo;
    }

    public function post($ruta, $metodo) {
        $ruta_final = trim($ruta, '/');
        $this->routes['POST'][$ruta_final] = $metodo;
    }

    public function put($ruta, $metodo) {
        $ruta_final = trim($ruta, '/');
        $this->routes['PUT'][$ruta_final] = $metodo;
    }

    public function delete($ruta, $metodo) {
        $ruta_final = trim($ruta, '/');
        $this->routes['DELETE'][$ruta_final] = $metodo;
    }

    public function match_route($ruta, $method) {
        if (preg_match('/[a-zA-Z0-9_-]\/[a-zA-Z0-9_-]/', $ruta)) {
            $this->ruta2 = explode('/', $ruta);
            $this->controller = array_key_exists($this->ruta2[0], $this->routes[$method]) ? $this->routes[$method][$this->ruta2[0]] : self::ERROR;
        } else {
            $this->controller = array_key_exists($ruta, $this->routes[$method]) ? $this->routes[$method][$ruta] : self::ERROR;
        }
        $this->method = $this->controller[1];
        $controllerClass = $this->controller[0];
        
        // Verificación de la ruta antes de requerir el archivo
        $controllerPath = __DIR__ . '/../controller/' . $controllerClass . '.php';
        if (!file_exists($controllerPath)) {
            die("Controller file not found: " . $controllerPath);
        }

        require_once $controllerPath;

        $controllerFullName = "\\controller\\" . $controllerClass;
        $this->importacion = new $controllerFullName();
    }

    public function run() {
        $ruta = $_SERVER['REQUEST_URI'];
        $ruta = trim($ruta, '/');
        $this->match_route($ruta, $_SERVER['REQUEST_METHOD']);
        $metodo = $this->method;
        $this->importacion->$metodo();
    }
}
?>
