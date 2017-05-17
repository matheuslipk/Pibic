<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ExameHemogramaDao.php';



function inserirExameHemograma(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['hemograma'] = $_POST['hemograma'];
   $array['dataHemograma'] = isset($_POST['dataHemograma']) ? $_POST['dataHemograma'] : NULL;
   $array['hb'] = $_POST['hb'] ? $_POST['hb'] : NULL;
   $array['ht'] = $_POST['ht'] ? $_POST['ht'] : NULL;
   $array['leococitos'] = $_POST['leococitos'] ? $_POST['leococitos'] : NULL;
   $array['bastonetes'] = $_POST['bastonetes'] ? $_POST['bastonetes'] : NULL;
   $array['segmentados'] = $_POST['segmentados'] ? $_POST['segmentados'] : NULL;
   $array['monocitos'] = $_POST['monocitos'] ? $_POST['monocitos'] : NULL;
   $array['linfocitos'] = $_POST['linfocitos'] ? $_POST['linfocitos'] : NULL;
   $array['plaquetas'] = $_POST['plaquetas'] ? $_POST['plaquetas'] : NULL;
   $array['glicose'] = $_POST['glicose'] ? $_POST['glicose'] : NULL;
   
   $ExameHemogramaDao = new ExameHemogramaDao();
   if(isExameHemograma($_POST['prontuario'])){
      $result = $ExameHemogramaDao->updateExameHemograma($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.3-examesInespecificos.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $ExameHemogramaDao->inserirExameHemograma($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/examesInespecificos.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isExameHemograma($prontuario){
   $exameDao = new ExameHemogramaDao();
   $result = $exameDao->getExameHemogramaByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirExameHemograma();