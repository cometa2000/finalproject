<?php
namespace controller;
use model\TablaCiber;
use config\Router;
use config\View;

class Ciber extends View {

	public function insertar_Datos() {
        $nombre_maquina = $_POST['nombre_maquina'];
        $fecha_hora_actual = date("Y-m-d H:i:s");
        $dia_actual = date("Y-m-d");
        $datos = [
            'nombre_maquina' => $nombre_maquina,
            'tiempo_de_inicio' => $fecha_hora_actual,
            'cronometro' => 0, // En segundos
            'dia' => $dia_actual,
            'precio' => 0,
            'estado' => 'activo'
        ];
        $ciber = new TablaCiber();
        $resultado = $ciber->insercion($datos);
        if($resultado){
            $route = new Router();
            return $route->redirigir('principal');
        }
    }

	public function edit() {
		$id = $_POST['id'];
		$consulta = new TablaCiber();
        $ciber = $consulta->consulta()->where('id', $id)->first();
        return parent::vista('editForm', $ciber);

	}

    public function editar_Datos() {
        $id = $_POST['id'];
        $nombre_maquina = $_POST['nombre_maquina'];
        $ciber = new TablaCiber();
        $resultado = $ciber->actualizar(['nombre_maquina' => $nombre_maquina])->where('id', $id)->first();
		
		$route = new Router();
		return $route->redirigir('principal');
		
    }
    public function eliminar_Datos() {
        $id = $_POST['id'];
        $ciber = new TablaCiber();
        $resultado = $ciber->eliminar()->where('id', $id)->get();
		if($resultado){
			$route = new Router();
			return $route->redirigir('principal');
		}
    }

	

}
?>
