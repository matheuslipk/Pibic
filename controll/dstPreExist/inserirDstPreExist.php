<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DstPreExistDao.php';

function inserirDstPreExist(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['hiv'] = isset($_POST['hiv']) ? TRUE : FALSE;
   $array['sifilis'] = isset($_POST['sifilis']) ? TRUE : FALSE;
   $array['gonorreia'] = isset($_POST['gonorreia']) ? TRUE : FALSE;
   $array['clamidia'] = isset($_POST['clamidia']) ? TRUE : FALSE;
   $array['hepatite'] = isset($_POST['hepatite']) ? TRUE : FALSE;
   $array['herpes'] = isset($_POST['herpes']) ? TRUE : FALSE;
   $array['outrasDsts'] = $_POST['outrasDsts'];
   
   $DstPreExistDao = new DstPreExistDao();
   if(isDstPreExistExiste($_POST['prontuario'])){
      $result = $DstPreExistDao->updateDstPreExist($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $DstPreExistDao->inserirDstPreExist($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isDstPreExistExiste($prontuario){
   $exameDao = new DstPreExistDao();
   $result = $exameDao->getDstPreExistByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirDstPreExist();