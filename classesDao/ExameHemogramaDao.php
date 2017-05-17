<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ExameHemogramaDao {
   public function inserirExameHemograma($array){
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameHemograma VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisiiiiiiiii", $array['idProntuario'], $array['hemograma'], 
              $array['dataHemograma'], $array['hb'], $array['ht'], $array['leococitos'], 
              $array['bastonetes'], $array['segmentados'], $array['monocitos'], 
              $array['linfocitos'], $array['plaquetas'], $array['glicose']);
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
   
   public function getExameHemogramaByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM exameHemograma WHERE idProntuario=?";
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
   
   public function updateExameHemograma($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE exameHemograma SET hemograma=?, dataHemograma=?, hb=?, "
              . "ht=?, leococitos=?, bastonetes=?, segmentados=?, "
              . "monocitos=?, linfocitos=?, plaquetas=?, "
              . "glicose=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isiiiiiiiiii", $array['hemograma'], 
              $array['dataHemograma'], $array['hb'], $array['ht'], 
              $array['leococitos'], $array['bastonetes'], $array['segmentados'], 
              $array['monocitos'], $array['linfocitos'], $array['plaquetas'], 
              $array['glicose'], $array['idProntuario']);
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
