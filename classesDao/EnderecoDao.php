<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class EnderecoDao {
   public function inserirEndereco($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO endereco VALUES (?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isisiss", $array['idProntuario'], $array['uf'], 
              $array['municipio'], $array['logradouro'], $array['numero'], 
              $array['bairro'], $array['telefone']);
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
   
   public function getEnderecoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM endereco WHERE idProntuario=?";
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
   
   public function updateEndereco($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE endereco SET uf=?, municipio=?, "
              . "logradouro=?, numero=?, bairro=?, telefone=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("sisissi", $array['uf'], $array['municipio'], 
              $array['logradouro'], $array['numero'], $array['bairro'], 
              $array['telefone'], $array['idProntuario']);
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