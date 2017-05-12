<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ExameImagemDao.php';

function inserirExameImagem(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['tomografiaCran'] = $_POST['tomografiaCran'];
   $array['resultTomografiaCran'] = $_POST['resultTomografiaCran'];
   $array['ressonanciaMagCran'] = $_POST['ressonanciaMagCran'];
   $array['resultRessonanciaMagCran'] = $_POST['resultRessonanciaMagCran'];
   $array['ultrassomTrans'] = $_POST['ultrassomTrans'];
   $array['resultUltrassomTrans'] = $_POST['resultUltrassomTrans'];
   $array['ultrassomAbd'] = $_POST['ultrassomAbd'];
   $array['resultUltrassomAbd'] = $_POST['resultUltrassomAbd'];
   $array['ecocardiograma'] = $_POST['ecocardiograma'];
   $array['resultEcocardiograma'] = $_POST['resultEcocardiograma'];
   $array['fundoOlho'] = $_POST['fundoOlho'];
   $array['alterFundoOlho'] = $_POST['alterFundoOlho'];
   $array['descAlterFundoOlho'] = $_POST['descAlterFundoOlho'];
   $array['testeOrelhinha'] = $_POST['testeOrelhinha'];
   $array['alterTesteOrelhinha'] = $_POST['alterTesteOrelhinha'];
   $array['descAlterTesteOrelhinha'] = $_POST['descAlterTesteOrelhinha'];
   
   $exameImagemDao = new ExameImagemDao();
   if(isImagemExiste($_POST['prontuario'])){
      $result = $exameImagemDao->updateExameImagem($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/entrevistaMae.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $exameImagemDao->inserirExameImagem($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/entrevistaMae.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isImagemExiste($prontuario){
   $exameDao = new ExameImagemDao();
   $result = $exameDao->getExameImagemByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirExameImagem();