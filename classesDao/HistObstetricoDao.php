<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class HistObstetricoDao {
   public function inserirHistObstetrico($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO histObstetrico VALUES (?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiiss", $array['idProntuario'], $array['primGestacao'], 
              $array['quantGravidez'], $array['quantVivos'], $array['quantMortos'], 
              $array['teveAborto'], $array['quantAbortos'], $array['malformacao'],
              $array['descMalformacao'], $array['dataNascimento']);
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
   
   public function getHistObstetricoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM histObstetrico WHERE idProntuario=?";
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
   
   public function updateHistObstetrico($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE histObstetrico SET primGestacao=?, quantGravidez=?, "
              . "quantVivos=?, quantMortos=?, teveAborto=?, quantAbortos=?, "
              . "malformacao=?, descMalformacao=?, dataNascimento=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issssssidi", $array['primGestacao'], 
              $array['quantGravidez'], $array['quantVivos'], $array['quantMortos'], 
              $array['teveAborto'], $array['quantAbortos'], $array['malformacao'],
              $array['descMalformacao'], $array['dataNascimento'], $array['idProntuario']);
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