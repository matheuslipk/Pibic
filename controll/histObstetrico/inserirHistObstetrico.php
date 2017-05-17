<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/HistObstetricoDao.php';

function inserirHistObstetrico(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['primGestacao'] = $_POST['primGestacao'];
   $array['quantGravidez'] = $_POST['quantGravidez'];
   $array['quantVivos'] = $_POST['quantVivos'];
   $array['quantMortos'] = $_POST['quantMortos'];
   $array['teveAborto'] = isset($_POST['teveAborto']) ? $_POST['teveAborto']:NULL;
   $array['quantAbortos'] = $_POST['quantAbortos'];
   $array['malformacao'] = isset($_POST['malformacao']) ? $_POST['malformacao'] : NULL;
   $array['descMalformacao'] = $_POST['descMalformacao'];
   $array['dataNascimento'] = $_POST['dataNascimento'] ? $_POST['dataNascimento'] : NULL;
   
   $HistObstetricoDao = new HistObstetricoDao();
   if(isHistObstetrico($_POST['prontuario'])){
      $result = $HistObstetricoDao->updateHistObstetrico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $HistObstetricoDao->inserirHistObstetrico($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isHistObstetrico($prontuario){
   $exameDao = new HistObstetricoDao();
   $result = $exameDao->getHistObstetricoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirHistObstetrico();