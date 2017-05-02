<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class TipoHospitalDao {
   public function getAllTipoHospital(){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM tipoHospital";
      $stmt = $con->prepare($query);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         return $array;
      }
      return NULL;
   }
}
