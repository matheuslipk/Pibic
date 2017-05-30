<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ExameEtiologicoDao {
   public function inserirExameEtiologico($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameetiologico VALUES (?,?,0,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisiii", $array['idProntuario'], $array['idAgente'], 
              $array['data00'], $array['igm00'],
              $array['igg00'], $array['pcr00']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         $this->inserirExameEtiologico1($array);
         $this->inserirExameEtiologico2($array);
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   private function inserirExameEtiologico1($array){
      if($array['data01']===NULL){
         return TRUE;
      }
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameetiologico VALUES (?,?,1,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisiii", $array['idProntuario'], $array['idAgente'], 
              $array['data01'], $array['igm01'],
              $array['igg01'], $array['pcr01']);
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
   
   private function inserirExameEtiologico2($array){
      if($array['data02']===NULL){
         return TRUE;
      }
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameetiologico VALUES (?,?,2,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisiii", $array['idProntuario'], $array['idAgente'], 
              $array['data02'], $array['igm02'],
              $array['igg02'], $array['pcr02']);
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
   
   public function getExameEtiologicoByProntuario($prontuario, $idAgente){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM exameetiologico WHERE idProntuario=? AND idAgente=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii", $prontuario, $idAgente);
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
   
   public function updateExameEtiologico($array){      
      $con = ConexaoDao::getConecao();
      $query = "DELETE FROM exameetiologico WHERE idProntuario=? AND idAgente=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii", $array['idProntuario'], $array['idAgente']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         $this->inserirExameEtiologico($array);
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function updateExameEtiologic2($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE exameetiologico SET ExameEtiologico=?, freqAlcool=?, "
              . "dosesDrinks=?, freqDrinks=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isssi", $array['ExameEtiologico'], 
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