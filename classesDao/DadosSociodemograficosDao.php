<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class DadosSociodemogradicosDao {
   public function inserirDadosSociodemogradicos($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO dadossociodemograficos VALUES (?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issssssidi", $array['idProntuario'], $array['nome'], 
              $array['dataNascimento'], $array['racaCor'], $array['escolaridade'], 
              $array['estadoCivil'], $array['ocupacao'], $array['pessoasNaCasa'],
              $array['rendaFamiliar'], $array['enderecoAtual']);
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
   
   public function getDadosSociodemogradicosByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM dadossociodemograficos WHERE idProntuario=?";
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
   
   public function updateDadosSociodemogradicos($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE dadossociodemograficos SET nome=?, dataNascimento=?, "
              . "racaCor=?, escolaridade=?, estadoCivil=?, ocupacao=?, "
              . "pessoasNaCasa=?, rendaFamiliar=?, enderecoAtual=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssssssidii", $array['nome'], 
              $array['dataNascimento'], $array['racaCor'], $array['escolaridade'], 
              $array['estadoCivil'], $array['ocupacao'], $array['pessoasNaCasa'],
              $array['rendaFamiliar'], $array['enderecoAtual'], $array['idProntuario']);
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