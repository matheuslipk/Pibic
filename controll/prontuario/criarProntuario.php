<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ProntuarioDao.php';

function inserirProntuario(){
   $numProntuario = $_GET['prontuario'];
   
   if(isProntuarioExiste()){
      header("Location: /view/servicoSaude.php?prontuario=$numProntuario");
   }
   
   $proDao = new ProntuarioDao();
   $result = $proDao->inserirProntuario($numProntuario);
   if($result===TRUE){
      header("Location: /view/servicoSaude.php?prontuario=$numProntuario");
   }elseif ($result===1062) {
      echo 'Registro duplicado';
   }else{
      echo $result;
   }
}

function isProntuarioExiste(){
   $proDao = new ProntuarioDao();
   $result = $proDao->getProntuarioById($_GET['prontuario']);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirProntuario();