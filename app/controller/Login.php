<?php
namespace controller;
use model\TablaLogin;
use config\Router;
use config\View;
use controller\Test;
require_once realpath('.../../vendor/autoload.php');



class Login extends View{
    public function insertar_Datos(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nombreUser = $_POST['nombreUser'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmarPassword = $_POST['confirmarPassword'];

        $campos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nombredeusuario' => $nombreUser,
            'email' => $email,
            'pass' => $password,
            'confirmacióndecontraseña' => $confirmarPassword
        ];

        foreach ($campos as $campo => $valor) {
            if (empty($valor)) {
                echo "<script>alert('El campo $campo no puede ir vacío'); window.history.back();</script>";
                return;
            }
        }

        $expresionRegular = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";
        if (!preg_match($expresionRegular, $email)) {
            echo "<script>alert('Por favor ingrese un email válido'); window.history.back();</script>";
            return;
        } 

        if($campos['pass'] != $campos['confirmacióndecontraseña']){
            echo "<script>alert('El Password tiene que ser el mismo'); window.history.back();</script>";
            return;
        }
        
        $login = new TablaLogin();
        if(!$campos['nombredeusuario'] == "") {
            $usuario = $login->consulta()->where('nombreUser',  $campos['nombredeusuario'])->first();
            if($usuario){
                echo "<script>alert('nombredeusuario ya existente Usa otro'); window.history.back();</script>";
                return;
            }
        } 
        
        $password_encriptada = password_hash($campos['pass'], PASSWORD_DEFAULT);

        $result = $login->insercion([
            'nombre' => $campos['nombre'],
            'apellido' => $campos['apellido'],
            'nombreUser' => $campos['nombredeusuario'],
            'email' => $campos['email'],
            'password' => $password_encriptada
        ]);
        
        $route = new Router;
        if ($result) {
            return $route->redirigir('login');
        } else {
           echo "<script>alert('Error al insertar los datos'); window.history.back();</script>";
        }
    }

    public function conculta_Datos() {
        session_start();
        $nombreUser = $_POST['nombreUser'];
        $password = $_POST['password'];
        $login = new TablaLogin();
        $usuario = $login->consulta()->where('nombreUser',  $nombreUser)->first();
        $route = new Router;

        $campos = [
            'nombredeusuario' => $nombreUser,
            'contraseña' => $password
        ];

        foreach ($campos as $campo => $valor) {
            if (empty($valor)) {
                echo "<script>alert('El campo $campo no puede ir vacío'); window.history.back();</script>";
                return;
            }
        }
        
        if ($usuario) {
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario'] = $usuario['nombreUser'];
                $_SESSION['id_usuario'] = $usuario['id']; // Suponiendo que la columna id existe en la tabla
                return $route->redirigir('principal');
            } else {
                echo "<script>alert('No es la contraseña, Intenta de nuevo'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('nombredeusuario incorrecto'); window.history.back();</script>";
        }
    }

    public function verificarSession() {
        session_start();
        if (!isset($_SESSION['id_usuario'])) {
            $route = new Router;
            return $route->redirigir('login');
        }
    }

    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        $route = new Router;
        return $route->redirigir('login');
    }

    

    public function editar_Usuarios(){
        
        // $route = new Router;
        // return $route->redirigir('editarUsuarios');

    }

    public function actualiza_Usuarios(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nombreUser = $_POST['nombreUser'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmarPassword = $_POST['confirmarPassword'];

        $campos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nombredeusuario' => $nombreUser,
            'email' => $email,
        ];

        foreach ($campos as $campo => $valor) {
            if (empty($valor)) {
                echo "<script>alert('El campo $campo no puede ir vacío'); window.history.back();</script>";
                return;
            }
        }

        $expresionRegular = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";
        if (!preg_match($expresionRegular, $email)) {
            echo "<script>alert('Por favor ingrese un email válido'); window.history.back();</script>";
            return;
        } 

        // if($campos['pass'] != $campos['confirmacióndecontraseña']){
        //     echo "<script>alert('El Password tiene que ser el mismo'); window.history.back();</script>";
        //     return;
        // }
        
        $login = new TablaLogin();
        // if(!$campos['nombredeusuario'] == "") {
        //     $usuario = $login->consulta()->where('nombreUser',  $campos['nombredeusuario'])->first();
        //     if($usuario){
        //         echo "<script>alert('nombredeusuario ya existente Usa otro'); window.history.back();</script>";
        //         return;
        //     }
        // } 
        
        // $password_encriptada = password_hash($campos['pass'], PASSWORD_DEFAULT);

        $result = $login->actualizar([
            'nombre' => $campos['nombre'],
            'apellido' => $campos['apellido'],
            'nombreUser' => $campos['nombredeusuario'],
            'email' => $campos['email']
        ])->where('id', $id);
        
        $route = new Router;
        if ($result) {
            return $route->redirigir('usuarios');
        } else {
           echo "<script>alert('Error al editar los datos'); window.history.back();</script>";
        }
    }

    public function elimina_Usuarios(){
        $id = $_POST['id']; 
        $login = new TablaLogin();
        $result = $login->eliminar()->where('id',$id);

        $route = new Router;
        if ($result) {
            return $route->redirigir('usuarios');
        } else {
           echo "<script>alert('Error al eliminar los datos'); window.history.back();</script>";
        }

    }
}


