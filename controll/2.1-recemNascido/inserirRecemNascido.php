<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/RecemNascidoDao.php';

function inserirRecemNascido(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['dataParto'] = $_POST['dataParto'];
   $array['sexo'] = $_POST['sexo'];
   $array['idadeGestacionalSem'] = $_POST['idadeGestacionalSem'];
   $array['idadeGestacionalDia'] = $_POST['idadeGestacionalDia'];
   $array['classIdadeGest'] = $_POST['classIdadeGest'];
   $array['gemelar'] = $_POST['gemelar'];
   $array['tipoGemelar'] = $_POST['tipoGemelar'];
   $array['tipoParto'] = $_POST['tipoParto'];
   $array['danoPerinatal'] = $_POST['danoPerinatal'];
   $array['tipoDanoPerinatal'] = $_POST['tipoDanoPerinatal'];
   $array['outroDano'] = $_POST['outroDano'];
   
   $recemDao = new RecemNascidoDao();
   if(isRecemNascidoExiste($_POST['prontuario'])){
      $result = $recemDao->updateRecemNascido($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.1-recemNascido.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $recemDao->inserirRecemNascido($array);
      echo $result;
      if($result === TRUE){
//         header("Location: /view/recemNascido.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isRecemNascidoExiste($prontuario){
   $recemDao = new RecemNascidoDao();
   $result = $recemDao->getRecemNascidoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirRecemNascido();