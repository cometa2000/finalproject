<?php
    namespace config;
    use config\Conexion;
    use PDO;
    require_once realpath('.../../vendor/autoload.php');
    class ORM{
        protected $tabla;
        protected $id_tabla;
        protected $atributos;
        private $contadorWhere;
        private $query;

        function __construct(){
            $this->atributos = $this->atributos_tabla();        
        }
  
        private function atributos_tabla(){
            try{
                $consulta = Conexion::obtener_conexion()->prepare("DESCRIBE $this->tabla");
                $consulta->execute();
                $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                $atributos = [];
                foreach($campos as $campo){
                    array_push($atributos,$campo['Field']);              
                }
                return $atributos;        

            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function where($campo,$valor_campo = "",$tipo = "AND"){
            try{
                $queryFinal = $this->query;
                // $this->query = "$queryFinal WHERE $campo = :$valor_campo";
                if($valor_campo == ""){
                    $this->query = "$queryFinal WHERE $campo ";
                }else{
                    if($this->contadorWhere > 0){
                        $this->query = "$queryFinal".($tipo != "AND" ? "OR" : $tipo)." $campo = '$valor_campo'";
                    }else{
                        $this->query = "$queryFinal WHERE $campo = '$valor_campo'";
                        $this->contadorWhere++;
                    }
                }
                return $this;
                // echo count($this);
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }   

        public function contar($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);   
                $this->query = "SELECT COUNT($seleccion) FROM $this->tabla";
                return   $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function limite($limite = 0){
            try{
                $queryFinal = $this->query;
                if($limite != 0){
                    $this->query = "$queryFinal LIMIT $limite";
                }else {
                    $limite = 100;
                    $this->query ="$queryFinal LIMIT $limite";
                }
                return $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function likes($valor1 = ""){
            try{
                $queryFinal = $this->query; 
                if($valor1 != ""){
                    $this->query = "$queryFinal LIKE '$valor1'"; 
                }
                return $this;
                // echo $this->query;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function maximo($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);   
                $this->query = "SELECT MAX($seleccion) FROM $this->tabla";
                return   $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function minimo($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);   
                $this->query = "SELECT MIN($seleccion) FROM $this->tabla";
                return   $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function suma($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);   
                $this->query = "SELECT SUM($seleccion) FROM $this->tabla";
                return   $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function avg($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);   
                $this->query = "SELECT AVG($seleccion) FROM $this->tabla";
                return   $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function all(){
            try{
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
                if($consulta->execute()){
                    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $data = [];
                }    
                return $data;        
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }
        
        public function first(){
            try{
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
                if($consulta->execute()){
                    $data = $consulta->fetch(PDO::FETCH_ASSOC);
                }else{
                    $data = [];
                }    
                return $data;        
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function get(){
            try{
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
                return $consulta->execute();        
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }
        
        public function consulta($seleccion = ['*']){
            try{
                $seleccion = implode(',',$seleccion);
                $this->query = "SELECT $seleccion FROM $this->tabla";
                return  $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function insercion($datos){
            try{
                $temp = array();
                foreach($this->atributos as $valor){
                    if($this->id_tabla != $valor){
                        array_push($temp,$valor);                    
                    }
                }
                $propiedades = implode(",", $temp);
                $propiedades_key = ":" . implode(", :", $temp);
                $consulta = Conexion::obtener_conexion()->prepare("INSERT INTO $this->tabla ($propiedades) VALUES ($propiedades_key)");
                return $consulta->execute($datos);
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function actualizar($datos){
            try{
                $queryBloque = [];
                foreach(array_keys($datos) as $key ){
                    if($this->id_tabla != $key){
                        array_push($queryBloque,$key.'='."'$datos[$key]'");
                    }
                }
                $queryBloque = implode(', ',$queryBloque);
                $this->query = "UPDATE $this->tabla SET $queryBloque";
                return $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }

        public function eliminar(){
            try{
                $this-> query = "DELETE FROM $this->tabla";
                return $this;
            }catch (\Exception $e) {
                return ["error" => $e->getMessage()];
            }
        }
    }
?>




        