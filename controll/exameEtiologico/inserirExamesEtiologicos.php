<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/UsoAlcoolDao.php';

function inserirUsoAlcool(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['amostra'] = 0;
   $array['data00'] = $_POST['data00'];
   $array['data00'] = $_POST['igm00'];
   $array['data00'] = $_POST['igg00'];
   $array['data00'] = $_POST['pcr00'];
   
   $UsoAlcoolDao = new UsoAlcoolDao();
   
   if(isUsoAlcool($_POST['prontuario'])){
      $result = $UsoAlcoolDao->updateUsoAlcool($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/habitosGestacao.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $UsoAlcoolDao->inserirUsoAlcool($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/habitosGestacao.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isUsoAlcool($prontuario){
   $exameDao = new UsoAlcoolDao();
   $result = $exameDao->getUsoAlcoolByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirUsoAlcool();