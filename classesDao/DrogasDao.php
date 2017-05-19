<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class DrogasDao {
   public function inserirDrogas($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO drogas VALUES (?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issssssss", $array['idProntuario'], $array['usoMaconha'], 
              $array['usoCocaina'], $array['usoDrogaInjetavel'], $array['usoCrack'], 
              $array['usoLolo'], $array['usoLSD'], $array['usoEcstasy'], $array['usoAnfetamina']);
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
   
   public function getDrogasByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM drogas WHERE idProntuario=?";
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
   
   public function updateDrogas($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE drogas SET usoMaconha=?, usoCocaina=?, "
              . "usoDrogaInjetavel=?, usoCrack=?, usoLolo=?, usoLSD=?, "
              . "usoEcstasy=?, usoAnfetamina=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issssssss", $array['usoMaconha'], 
              $array['usoCocaina'], $array['usoDrogaInjetavel'], $array['usoCrack'], 
              $array['usoLolo'], $array['usoLSD'], $array['usoEcstasy'], 
              $array['usoAnfetamina'], $array['idProntuario']);
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