<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/UsoTabacoDao.php';

function inserirUsoAlcool(){
   $array['idProntuario'] = $_POST['prontuario'];
   $array['cigarro'] = $_POST['cigarro'];
   $array['tempoFumante'] = $_POST['tempoFumante'];
   $array['tempoExFumante'] = isset($_POST['tempoExFumante']) ? $_POST['tempoExFumante'] : NULL;
   $array['escalaTempo'] = $_POST['escalaTempo'];
//   var_dump($array);
//   die();
   $UsoTabacoDao = new UsoTabacoDao();
   
   if(isUsoTabaco($_POST['prontuario'])){
      $result = $UsoTabacoDao->updateUsoTabaco($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/habitosGestacao.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $UsoTabacoDao->inserirUsoTabaco($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/habitosGestacao.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isUsoTabaco($prontuario){
   $exameDao = new UsoTabacoDao();
   $result = $exameDao->getUsoTabacoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirUsoAlcool();