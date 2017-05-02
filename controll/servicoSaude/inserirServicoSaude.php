<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ServicoSaudeDao.php';

function inserirServicoSaude(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['idTipoHospital'] = $_POST['tipoHospital'];
   $array['identServico'] = $_POST['identServico'];
   $array['municipioOcorrencia'] = $_POST['municipioOcorrencia'];
   $array['resp'] = $_POST['resp'];
   
   $servDao = new ServicoSaudeDao();
   if(isServicoExiste($_POST['prontuario'])){
      $result = $servDao->updateServicoSaude($array);
      if($result === TRUE){
         header("Location: /view/recemNascido.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $servDao->inserirServicoSaude($array);
      if($result === TRUE){
         header("Location: /view/recemNascido.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isServicoExiste($prontuario){
   $proDao = new ServicoSaudeDao();
   $result = $proDao->getServicoSaudeById($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirServicoSaude();