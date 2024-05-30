<?php
namespace controller;

use model\TablaLogin;
use model\TablaCiber;
use config\View;
use config\Router;

require_once realpath('./vendor/autoload.php');


class Test extends View {

    private function verificarSesion() {
        session_start();
        if (!isset($_SESSION['id_usuario'])) {
            $route = new Router;
            return $route->redirigir('login'); // Redirige al login si no hay sesión activa
        }
    }

    public function index() {
        $this->verificarSesion();
        $consulta = new TablaLogin;
        return parent::vista('home', $consulta->consulta()->all());
    }

    public function home() {
        $this->verificarSesion();
        return parent::vista('home');
    }

    public function login() {
        return parent::vista('login');
    }

    public function loginUser() {
        return parent::vista('loginUser');
    }

    public function register() {
        return parent::vista('register');
    }

    public function registerUser() {
        return parent::vista('registerUser');
    }

    public function formulario() {
        $this->verificarSesion();
        return parent::vista('formulario');
    }

    public function editForm() {
        $this->verificarSesion();
        return parent::vista('editForm');
    }
    

    public function editarDatos() {
        return parent::vista('editarDatos');
    }

    public function edit() {
        return parent::vista('edit');
    }

    public function eliminarDatos() {
        return parent::vista('eliminarDatos');
    }

    public function principal() {
        $this->verificarSesion();
        $consulta = new TablaCiber;
        return parent::vista('principal', $consulta->consulta()->all());
    }

    public function ciberForm() {
        $this->verificarSesion();
        return parent::vista('ciberForm');
    }

    public function usuarios() {
        $this->verificarSesion();
        $consulta = new TablaLogin;
        return parent::vista('usuarios', $consulta->consulta()->all());
    }
}

$controlador = new Test();
?>
