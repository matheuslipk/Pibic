<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DuranteGestacaoDao.php';

function inserirDuranteGestacao(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['contatoPesticida'] = $_POST['contatoPesticida'];
   $array['contatoAgrotoxico'] = $_POST['contatoAgrotoxico'];
   $array['descAgrotoxicos'] = $_POST['descAgrotoxicos'];
   $array['exameRX'] = $_POST['exameRX'];
   $array['periodoExameRX'] = isset($_POST['periodoExameRX']) ? $_POST['periodoExameRX']:NULL;
   $array['usoAcidoFolico'] = $_POST['usoAcidoFolico'];
   $array['dataUsoAcidoFolico'] = ($_POST['dataUsoAcidoFolico']) ? $_POST['dataUsoAcidoFolico'] : NULL;
   $array['usoFerro'] = $_POST['usoFerro'];
   $array['dataUsoFerro'] = $_POST['dataUsoFerro'] ? $_POST['dataUsoFerro'] : NULL;
   $array['usoOutrosMed'] = $_POST['usoOutrosMed'];
   $array['descUsoOutrosMed'] = $_POST['descUsoOutrosMed'];
   $array['dataIniTratamento'] = $_POST['dataIniTratamento'] ? $_POST['dataIniTratamento'] : NULL;
   $array['manchaVermelha'] = $_POST['manchaVermelha'];
   
   $DuranteGestacaoDao = new DuranteGestacaoDao();
   if(isDuranteGestacao($_POST['prontuario'])){
      $result = $DuranteGestacaoDao->updateDuranteGestacao($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $DuranteGestacaoDao->inserirDuranteGestacao($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/histObstetrico.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isDuranteGestacao($prontuario){
   $exameDao = new DuranteGestacaoDao();
   $result = $exameDao->getDuranteGestacaoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirDuranteGestacao();