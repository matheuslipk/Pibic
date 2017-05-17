<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class DuranteGestacaoDao {
   public function inserirDuranteGestacao($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO durantegestacao VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiisisisisissi", $array['idProntuario'], $array['contatoPesticida'], 
              $array['contatoAgrotoxico'], $array['descAgrotoxicos'], $array['exameRX'], 
              $array['periodoExameRX'], $array['usoAcidoFolico'], $array['dataUsoAcidoFolico'], 
              $array['usoFerro'], $array['dataUsoFerro'], $array['usoOutrosMed'], 
              $array['descUsoOutrosMed'], $array['dataIniTratamento'], $array['manchaVermelha']);
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
   
   public function getDuranteGestacaoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM durantegestacao WHERE idProntuario=?";
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
   
   public function updateDuranteGestacao($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE durantegestacao SET contatoPesticida=?, contatoAgrotoxico=?, "
              . "descAgrotoxicos=?, exameRX=?, periodoExameRX=?, usoAcidoFolico=?, "
              . "dataUsoAcidoFolico=?, usoFerro=?, dataUsoFerro=?, usoOutrosMed=?, "
              . "descUsoOutrosMed=?, dataIniTratamento=?, manchaVermelha=? "
              . " WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisisisisissii", $array['contatoPesticida'], 
              $array['contatoAgrotoxico'], $array['descAgrotoxicos'], $array['exameRX'], 
              $array['periodoExameRX'], $array['usoAcidoFolico'], $array['dataUsoAcidoFolico'], 
              $array['usoFerro'], $array['dataUsoFerro'], $array['usoOutrosMed'], 
              $array['descUsoOutrosMed'], $array['dataIniTratamento'], $array['manchaVermelha'], 
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