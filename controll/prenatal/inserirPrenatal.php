<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/PrenatalDao.php';



function inserirPrenatal(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['preNatal'] = $_POST['preNatal'];
   $array['unidadeSaude'] = $_POST['unidadeSaude'];
   $array['ufPrenatal'] = $_POST['ufPrenatal'];
   $array['municipioPrenatal'] = $_POST['municipioPrenatal'];
   $array['numConsultas1'] = $_POST['numConsultas1'];
   $array['numConsultas2'] = $_POST['numConsultas2'];
   $array['numConsultas3'] = $_POST['numConsultas3'];
   $array['dataConsultas1'] = $_POST['dataConsultas1'] ? $_POST['dataConsultas1'] : NULL;
   $array['idadeGest1'] = $_POST['idadeGest1'];
   $array['pesoIniGestacao'] = $_POST['pesoIniGestacao'];
   $array['pesoFimGestacao'] = $_POST['pesoFimGestacao'];
   $array['altura'] = $_POST['altura'];
   
   $PrenatalDao = new PrenatalDao();
   if(isPrenatal($_POST['prontuario'])){
      $result = $PrenatalDao->updatePrenatal($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $PrenatalDao->inserirPrenatal($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isPrenatal($prontuario){
   $exameDao = new PrenatalDao();
   $result = $exameDao->getPrenatalByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirPrenatal();