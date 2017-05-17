<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class UsoAlcoolDao {
   public function inserirUsoAlcool($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO usoalcool VALUES (?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisss", $array['idProntuario'], $array['usoAlcool'], 
              $array['freqAlcool'], $array['dosesDrinks'], $array['freqDrinks']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function getUsoAlcoolByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM usoalcool WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function updateUsoAlcool($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE usoalcool SET usoAlcool=?, freqAlcool=?, "
              . "dosesDrinks=?, freqDrinks=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isssi", $array['usoAlcool'], 
              $array['freqAlcool'], $array['dosesDrinks'], $array['freqDrinks'], $array['idProntuario']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
}