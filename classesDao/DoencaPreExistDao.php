<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class DoencaPreExistDao {
   public function inserirDoencaPreExist($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO doencapreexist VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiiiiis", $array['idProntuario'], $array['diabetes'], 
              $array['outrasMetabolicas'], $array['hiperArterial'], $array['cardiopatia'], 
              $array['doencaRenal'], $array['pneumopatia'], $array['hemoglobinopatia'], 
              $array['cancer'], $array['autoimune'], $array['neuroleptica'], $array['outros']);
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
   
   public function getDoencaPreExistByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM doencapreexist WHERE idProntuario=?";
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
   
   public function updateDoencaPreExist($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE doencapreexist SET diabetes=?, outrasMetabolicas=?, "
              . "hiperArterial=?, cardiopatia=?, doencaRenal=?, pneumopatia=?, "
              . "hemoglobinopatia=?, cancer=?, autoimune=?, neuroleptica=?, "
              . "outros=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiiiisi", $array['diabetes'], 
              $array['outrasMetabolicas'], $array['hiperArterial'], $array['cardiopatia'], 
              $array['doencaRenal'], $array['pneumopatia'], $array['hemoglobinopatia'], 
              $array['cancer'], $array['autoimune'], $array['neuroleptica'], $array['outros'], $array['idProntuario']);
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