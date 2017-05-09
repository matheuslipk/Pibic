<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class MunicipioDao {
   
   
   public function getMunicipioById($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM prontuario WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function getMunicipiosByUf($uf){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM municipio WHERE uf=? ORDER BY nome ASC";
      $stmt = $con->prepare($query);
      $stmt->bind_param('s', $uf);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function getAllMunicipios(){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM municipio ORDER BY nome ASC";
      $stmt = $con->prepare($query);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
}
