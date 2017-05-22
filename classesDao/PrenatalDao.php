<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class PrenatalDao {
   public function inserirPrenatal($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO prenatal VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiisiiiisiiid", $array['idProntuario'], $array['preNatal'], 
              $array['unidadeSaude'], $array['ufPrenatal'], $array['municipioPrenatal'], 
              $array['numConsultas1'], $array['numConsultas2'], $array['numConsultas3'], 
              $array['dataConsultas1'], $array['idadeGest1'], $array['pesoIniGestacao'], 
              $array['pesoFimGestacao'], $array['altura']);
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
   
   public function getPrenatalByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM prenatal WHERE idProntuario=?";
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
   
   public function updatePrenatal($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE prenatal SET preNatal=?, unidadeSaude=?, "
              . "ufPrenatal=?, municipioPrenatal=?, numConsultas1=?, numConsultas2=?, "
              . "numConsultas3=?, dataConsultas1=?, idadeGest1=?, pesoIniGestacao=?, "
              . "pesoFimGestacao=?, altura=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisiiiisiiidi", $array['preNatal'], 
              $array['unidadeSaude'], $array['ufPrenatal'], $array['municipioPrenatal'], 
              $array['numConsultas1'], $array['numConsultas2'], $array['numConsultas3'], 
              $array['dataConsultas1'], $array['idadeGest1'], $array['pesoIniGestacao'], 
              $array['pesoFimGestacao'], $array['altura'], $array['idProntuario']);
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