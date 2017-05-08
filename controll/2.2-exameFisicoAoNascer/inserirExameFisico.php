<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ExameFisicoDao.php';

function inserirExameFisico(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['peso'] = $_POST['peso'];
   $array['estatura'] = $_POST['estatura'];
   $array['perimToracico'] = $_POST['perimToracico'];
   $array['perimCefalico'] = $_POST['perimCefalico'];
   $array['apgar1'] = $_POST['apgar1'];
   $array['apgar5'] = $_POST['apgar5'];
   $array['apgar10'] = $_POST['apgar10'];
   $array['malformacao'] = $_POST['malformacao'];
   
   if(isset($_POST['tipoMalformacao'])){
      $array['tipoMalformacao'] = $_POST['tipoMalformacao'];
   }else{
      $array['tipoMalformacao'] = NULL;
   }
   if(isset($_POST['descMalformacao'])){
      $array['descMalformacao'] = $_POST['descMalformacao'];
   }else{
      $array['descMalformacao'] = NULL;
   }   
   
   $array['achadosClinicos'] = $_POST['achadosClinicos'];
   
   if(isset($_POST['outrosAchadosClinicos'])){
      $array['outrosAchadosClinicos'] = $_POST['outrosAchadosClinicos'];
   }else{
      $array['outrosAchadosClinicos'] = NULL;
   }
   
   
   $exameFisicoDao = new ExameFisicoDao();
   if(isExameFisicoExiste($_POST['prontuario'])){
      $result = $exameFisicoDao->updateExameFisico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.3-examesInespecificos.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $exameFisicoDao->inserirExameFisico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.3-examesInespecificos.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isExameFisicoExiste($prontuario){
   $recemDao = new ExameFisicoDao();
   $result = $recemDao->getExameFisicoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirExameFisico();