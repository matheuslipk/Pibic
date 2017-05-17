<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class DstPreExistDao {
   public function inserirDstPreExist($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO dstpreexist VALUES (?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiis", $array['idProntuario'], $array['hiv'], 
              $array['sifilis'], $array['gonorreia'], $array['clamidia'], 
              $array['hepatite'], $array['herpes'], $array['outrasDsts']);
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
   
   public function getDstPreExistByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM dstpreexist WHERE idProntuario=?";
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
   
   public function updateDstPreExist($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE dstpreexist SET hiv=?, sifilis=?, "
              . "gonorreia=?, clamidia=?, hepatite=?, herpes=?, "
              . "outrasDsts=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiisi", $array['hiv'], $array['sifilis'], 
              $array['gonorreia'], $array['clamidia'], $array['hepatite'], 
              $array['herpes'], $array['outrasDsts'], $array['idProntuario']);
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