<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class UsoTabacoDao {
   public function inserirUsoTabaco($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO usotabaco VALUES (?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isiis", $array['idProntuario'], $array['cigarro'], 
              $array['tempoFumante'], $array['tempoExFumante'], $array['escalaTempo']);
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
   
   public function getUsoTabacoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM usotabaco WHERE idProntuario=?";
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
   
   public function updateUsoTabaco($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE usotabaco SET cigarro=?, tempoFumante=?, "
              . "tempoExFumante=?, escalaTempo=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("siisi", $array['cigarro'], $array['tempoFumante'],
              $array['tempoExFumante'], $array['escalaTempo'], $array['idProntuario']);
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