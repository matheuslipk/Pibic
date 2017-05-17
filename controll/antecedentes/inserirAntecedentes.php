<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/AntecedentesDao.php';



function inserirAntecedentes(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['grauParentesco'] = $_POST['grauParentesco'];
   $array['descGrauParentesco'] = isset($_POST['descGrauParentesco']) ? $_POST['descGrauParentesco'] : NULL;
   $array['malFormacao'] = $_POST['malFormacao'];
   $array['descMalFormacao'] = isset($_POST['descMalFormacao']) ? $_POST['descMalFormacao'] : NULL;
   $array['parenteMicrocefalia'] = $_POST['parenteMicrocefalia'];
   $array['usoMedContinuo'] = $_POST['usoMedContinuo'];
   $array['descUsoMedContinuo'] = isset($_POST['descUsoMedContinuo']) ? $_POST['descUsoMedContinuo'] : NULL;
   $array['doencaPreExist'] = $_POST['doencaPreExist'];
   
   
   $array['descDoencaPreExist'] = $_POST['prontuario'];
   require_once $_SERVER['DOCUMENT_ROOT'].'/controll/doencaPreExist/inserirDoencaPreExist.php';
   
   $array['dst'] = $_POST['dst']; 
   $array['descDstPreExist'] = $_POST['prontuario'];
   require_once $_SERVER['DOCUMENT_ROOT'].'/controll/dstPreExist/inserirDstPreExist.php';
   
   
   
   
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