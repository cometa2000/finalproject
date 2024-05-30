<?php
    namespace config;
    use Dotenv\Dotenv;
    use PDO;
    use PDOException;
    $dotenv = Dotenv::createImmutable('./');
    $dotenv->load();
    define('SERVER',$_ENV['DB_HOST']);
    define('DB',$_ENV['DB_DATABASE']);
    define('USER',$_ENV['DB_USERNAME']);
    define('PASS',$_ENV['DB_PASSWORD']);
    define('PORT',$_ENV['DB_PORT']);
    
    class Conexion{
        private static $conexion;

        private static function abrir_conexion(){
            if(!isset(self::$conexion)){
                try{
                    self::$conexion = new PDO('mysql:host='.SERVER.';dbname='.DB,USER,PASS);
                    self::$conexion->exec('SET CHARACTER SET utf8');
                    return self::$conexion;
                }catch(PDOException $e){
                    echo "Error en la conexion".$e;
                    die();
                }
            }else{
                return self::$conexion;
                
            }
        }

        public static function obtener_conexion(){
            $conexion = self::abrir_conexion();
            return $conexion;
        }

        public static function cerrar_conexion(){
            self::$conexion = null;
        }

        

    }
    

    // Conexion::agregar('Ariel','Segura','SIS','2');
    // Conexion::actualizar(5,'Pepe','Barrera','GES','1');

    
    // Conexion::consultar();
    // Conexion::insercion(['nombre'=>'Diego','apellido'=>'Bollas','carrera'=>'SIS','semestre'=>'16']);
    // Conexion::actualizar(['nombre'=>'Diego','apellido'=>'Bollas','carrera'=>'SIS','semestre'=>'16','id'=> 2]);
?>