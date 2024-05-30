<?php
    namespace config;
    class View{
        public function vista($mi_vista, $consulta = []){
            if(file_exists('./view/'.$mi_vista.'.view.php')){
                $mi_vista = './view/'.$mi_vista.'.view.php';
            }else {
                $mi_vista = './view/error.view.php';
            }
            $consulta;
            require_once $mi_vista;
        }
    }
?>