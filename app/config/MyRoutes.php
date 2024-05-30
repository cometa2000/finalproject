<?php 
namespace config;
use config\Router;
require_once realpath('./vendor/autoload.php');

$router = new Router;
$router->get("/", ['Test', 'login']);
$router->get("/login", ['Test', 'login']);
$router->post("/loginUser", ['Login', 'conculta_Datos']);
$router->get("/logout", ['Login', 'logout']);

$router->get("/register", ['Test', 'register']);
$router->post("/registerUser", ['Test', 'registerUser']);

$router->get("/usuarios", ['Test', 'usuarios']);
$router->get("/home", ['Test', 'home']);

$router->get("/formulario", ['Test', 'formulario']);
$router->post("/ciberForm", ['Test', 'ciberForm']);
$router->get("/principal", ['Test', 'principal']);
$router->get("/editForm", ['Test', 'editForm']);
$router->post("/editarDatos", ['Ciber', 'editar_Datos']); 
$router->post("/edit", ['Test', 'edit']); 
$router->post("/eliminarDatos", ['Ciber', 'eliminar_Datos']);

$router->run();
?>
