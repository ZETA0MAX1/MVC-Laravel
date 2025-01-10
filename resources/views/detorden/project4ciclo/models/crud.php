<?php
require_once("conexion.php");
class crud extends Conexion{
    private $pdo;
    public function __construct(
        public string $tabla
    ){
        parent::__construct();
        $this->pdo=$this->conexion();
    }
    public function delete(int $id){
        try{
            $stm=$this->pdo->prepare("DELETE from $this->tabla where id=?");
            $stm->execute([$id]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();

        }
    }
    public function crear(string $columnas,string $marcadores,array $datos){
        $stm=$this->pdo->prepare("INSERT INTO $this->tabla $columnas VALUES $marcadores");
        $stm->execute($datos);
    }


    public function modificar(string $columnas,array $datos,string $condicion,array $condicionDatos){
        $sql= "UPDATE $this->tabla SET $columnas WHERE $condicion";

        $todosDatos = array_merge($datos, $condicionDatos);
        
        $stm=$this->pdo->prepare($sql);
        $stm->execute($todosDatos);
    }

    public function buscarUsuarioPorNombre($nombre) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE usuario = ?");
            $stm->execute([$nombre]);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

        
}