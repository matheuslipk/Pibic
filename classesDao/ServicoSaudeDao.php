<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ServicoSaudeDao {
   public function inserirServicoSaude($array){
      $con = ConexaoDao::getConecao();
      $idProntuario = $array['idProntuario'];
      $idTipoHospital = $array['idTipoHospital'];
      $identServico = $array['identServico'];
      $municipioOcorrencia = $array['municipioOcorrencia'];
      $resp = $array['resp'];
      
      $query = "INSERT INTO servicoSaude VALUES (?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisss", $idProntuario, $idTipoHospital, $identServico, $municipioOcorrencia, $resp);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno;
   }
   
   public function getServicoSaudeById($prontuario){      
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM servicoSaude WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $array;
      }
      return NULL;
   }
   
   public function updateServicoSaude($array){
      $con = ConexaoDao::getConecao();
      $idProntuario = $array['idProntuario'];
      $idTipoHospital = $array['idTipoHospital'];
      $identServico = $array['identServico'];
      $municipioOcorrencia = $array['municipioOcorrencia'];
      $resp = $array['resp'];
      
      $query = "UPDATE servicoSaude SET idTipoHospital=?, "
              . "identServico=?, municipioOcorrencia=?, resp=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isssi", $idTipoHospital, $identServico, $municipioOcorrencia, $resp, $idProntuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno;
   }
}
