<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class AntecedentesDao {
   public function inserirAntecedentes($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO antecedentes VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisisiisiiii", $array['idProntuario'], $array['grauParentesco'], 
              $array['descGrauParentesco'], $array['malFormacao'], $array['descMalFormacao'], 
              $array['parenteMicrocefalia'], $array['usoMedContinuo'], $array['descUsoMedContinuo'], 
              $array['doencaPreExist'], $array['descDoencaPreExist'], $array['dst'], $array['descDstPreExist']);
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
   
   public function getAntecedentesByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM antecedentes WHERE idProntuario=?";
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
   
   public function updateAntecedentes($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE antecedentes SET grauParentesco=?, descGrauParentesco=?, "
              . "malFormacao=?, descMalFormacao=?, parenteMicrocefalia=?, usoMedContinuo=?, "
              . "descUsoMedContinuo=?, doencaPreExist=?, descDoencaPreExist=?, dst=?, "
              . "descDstPreExist=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isisiisiiiii", $array['grauParentesco'], 
              $array['descGrauParentesco'], $array['malFormacao'], $array['descMalFormacao'], 
              $array['parenteMicrocefalia'], $array['usoMedContinuo'], $array['descUsoMedContinuo'], 
              $array['doencaPreExist'], $array['descDoencaPreExist'], $array['dst'], $array['descDstPreExist'], 
              $array['idProntuario']);
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