<?php
class Conexion{
    public function __construct(
        public string $driver = "mysql",
        public string $host ="localhost",
        public string $user="root",
        public string $pass="",
        public string $bdName = "unac",
        public string $charset="utf8"){}

        protected function conexion(){
            try{
                $pdo = new PDO("$this->driver:host=$this->host;
                dbname=$this->bdName;
                charset=$this->charset", $this->user,
                $this->pass);
                return $pdo;
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }

        }
        public function getConexion() {
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->bdName);
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }
            return $conn;
        }
    }