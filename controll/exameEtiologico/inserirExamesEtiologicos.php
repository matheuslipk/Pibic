<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ExameEtiologicoDao.php';

function inserirExameEtiologico(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['idAgente'] = $_POST['idAgente'];
   $array['data00'] = $_POST['data00'] ? $_POST['data00'] : NULL;
   $array['igm00'] = $_POST['igm00'] ? $_POST['igm00'] : NULL;
   $array['igg00'] = $_POST['igg00'] ? $_POST['igg00'] : NULL;
   $array['pcr00'] = $_POST['pcr00'] ? $_POST['pcr00'] : NULL;
   
   $array['data01'] = $_POST['data01'] ? $_POST['data01'] : NULL;
   $array['igm01'] = $_POST['igm01'] ? $_POST['igm01'] : NULL;
   $array['igg01'] = $_POST['igg01'] ? $_POST['igg01'] : NULL;
   $array['pcr01'] = $_POST['pcr01'] ? $_POST['pcr01'] : NULL;
   
   $array['data02'] = $_POST['data02'] ? $_POST['data02'] : NULL;
   $array['igm02'] = $_POST['igm02'] ? $_POST['igm02'] : NULL;
   $array['igg02'] = $_POST['igg02'] ? $_POST['igg02'] : NULL;
   $array['pcr02'] = $_POST['pcr02'] ? $_POST['pcr02'] : NULL;
   
   $ExameEtiologicoDao = new ExameEtiologicoDao();
   
   if(isExameEtiologico($_POST['prontuario'], $_POST['idAgente'])){
      $result = $ExameEtiologicoDao->updateExameEtiologico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/examesEtiologicos.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $ExameEtiologicoDao->inserirExameEtiologico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/examesEtiologicos.php?prontuario={$array['idProntuario']}");
      }
   }   
}

function isExameEtiologico($prontuario, $agente){
   $exameDao = new ExameEtiologicoDao();
   $result = $exameDao->getExameEtiologicoByProntuario($prontuario, $agente);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirExameEtiologico();