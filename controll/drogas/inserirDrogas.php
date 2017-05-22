<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DrogasDao.php';

function inserirDrogas(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['usoMaconha'] = $_POST['usoMaconha'];
   $array['usoCocaina'] = $_POST['usoCocaina'];
   $array['usoDrogaInjetavel'] = $_POST['usoDrogaInjetavel'];
   $array['usoCrack'] = $_POST['usoCrack'];
   $array['usoLolo'] = $_POST['usoLolo'];
   $array['usoLSD'] = $_POST['usoLSD'];
   $array['usoEcstasy'] = $_POST['usoEcstasy'];
   $array['usoAnfetamina'] = $_POST['usoAnfetamina'];
   
   $DrogasDao = new DrogasDao();
   if(isDrogasExiste($_POST['prontuario'])){
      $result = $DrogasDao->updateDrogas($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/prenatal.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $DrogasDao->inserirDrogas($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/prenatal.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isDrogasExiste($prontuario){
   $exameDao = new DrogasDao();
   $result = $exameDao->getDrogasByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirDrogas();