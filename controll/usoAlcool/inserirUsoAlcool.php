<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/UsoAlcoolDao.php';



function inserirUsoAlcool(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['usoAlcool'] = $_POST['usoAlcool'];
   $array['freqAlcool'] = $_POST['freqAlcool'];
   $array['dosesDrinks'] = isset($_POST['dosesDrinks']) ? $_POST['dosesDrinks'] : NULL;
   $array['freqDrinks'] = $_POST['freqDrinks'];
   
   $UsoAlcoolDao = new UsoAlcoolDao();
   
   if(isUsoAlcool($_POST['prontuario'])){
      $result = $UsoAlcoolDao->updateUsoAlcool($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $UsoAlcoolDao->inserirUsoAlcool($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
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