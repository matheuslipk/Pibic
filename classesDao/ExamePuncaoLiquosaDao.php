<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ExamePuncaoLiquoricaDao {
   public function inserirPuncaoLiquorica($array){
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO examePuncaoLiquorica VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iissiiiiiiii", $array['idProntuario'], $array['puncaoLiquorica'], 
              $array['dataPuncaoLiquorica'], $array['aspecto'], $array['hemacias'], 
              $array['leococitos'], $array['bastonetes'], $array['segmentados'], 
              $array['monocitos'], $array['linfocitos'], $array['cloreto'], 
              $array['glicose']);
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
   
   public function getPuncaoLiquoricaByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM examePuncaoLiquorica WHERE idProntuario=?";
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
   
   public function updatePuncaoLiquorica($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE examePuncaoLiquorica SET puncaoLiquorica=?, dataPuncaoLiquorica=?, "
              . "aspecto=?, hemacias=?, leococitos=?, bastonetes=?, segmentados=?, "
              . "monocitos=?, linfocitos=?, cloreto=?, glicose=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiiiiiiiii", $array['puncaoLiquorica'], 
              $array['dataPuncaoLiquorica'], $array['aspecto'], $array['hemacias'], 
              $array['leococitos'], $array['bastonetes'], $array['segmentados'], 
              $array['monocitos'], $array['linfocitos'], $array['cloreto'], 
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
//$eDao = new ExamePuncaoLiquosaDao();
//var_dump($eDao->getPuncaoLiquoricaByProntuario(1));