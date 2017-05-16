<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/AntecedentesDao.php';

function inserirAntecedentes(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['grauParentesco'] = $_POST['grauParentesco'];
   $array['descGrauParentesco'] = isset($_POST['descGrauParentesco']) ? $_POST['descGrauParentesco'] : NULL;
   $array['malFormacao'] = isset($_POST['malFormacao']) ? TRUE : FALSE;
   $array['descMalFormacao'] = isset($_POST['descMalFormacao']) ? $_POST['descMalFormacao'] : NULL;
   $array['parenteMicrocefalia'] = $_POST['parenteMicrocefalia'];
   $array['usoMedContinuo'] = $_POST['usoMedContinuo'];
   $array['descUsoMedContinuo'] = isset($_POST['descUsoMedContinuo']) ? $_POST['descUsoMedContinuo'] : NULL;
   $array['doencaPreExist'] = $_POST['doencaPreExist'];
   
   
   $array['descDoencaPreExist'] = isset($_POST['descDoencaPreExist']) ? TRUE : NULL;
   
   
   $array['dst'] = isset($_POST['dst']) ? TRUE : FALSE;
   
   
   $array['descDstPreExist'] = isset($_POST['descDstPreExist']) ? TRUE : NULL;
   
   
   
   
   
   $AntecedentesDao = new AntecedentesDao();
   if(isAntecedentes($_POST['prontuario'])){
      $result = $AntecedentesDao->updateAntecedentes($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $AntecedentesDao->inserirAntecedentes($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isAntecedentes($prontuario){
   $exameDao = new AntecedentesDao();
   $result = $exameDao->getAntecedentesByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirAntecedentes();