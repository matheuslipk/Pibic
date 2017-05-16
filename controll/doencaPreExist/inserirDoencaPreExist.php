<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DoencaPreExistDao.php';

function inserirDoencaPreExist(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['diabetes'] = isset($_POST['diabetes']) ? TRUE : FALSE;
   $array['outrasMetabolicas'] = isset($_POST['outrasMetabolicas']) ? TRUE : FALSE;
   $array['hiperArterial'] = isset($_POST['hiperArterial']) ? TRUE : FALSE;
   $array['cardiopatia'] = isset($_POST['cardiopatia']) ? TRUE : FALSE;
   $array['doencaRenal'] = isset($_POST['doencaRenal']) ? TRUE : FALSE;
   $array['pneumopatia'] = isset($_POST['pneumopatia']) ? TRUE : FALSE;
   $array['hemoglobinopatia'] = isset($_POST['hemoglobinopatia']) ? TRUE : FALSE;
   $array['cancer'] = isset($_POST['cancer']) ? TRUE : FALSE;
   $array['autoimune'] = isset($_POST['autoimune']) ? TRUE : FALSE;
   $array['neuroleptica'] = isset($_POST['neuroleptica']) ? TRUE : FALSE;
   $array['outros'] = $_POST['outros'];
   
   $DoencaPreExistDao = new DoencaPreExistDao();
   if(isDoencaPreExistExiste($_POST['prontuario'])){
      $result = $DoencaPreExistDao->updateDoencaPreExist($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $DoencaPreExistDao->inserirDoencaPreExist($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isDoencaPreExistExiste($prontuario){
   $exameDao = new DoencaPreExistDao();
   $result = $exameDao->getDoencaPreExistByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirDoencaPreExist();