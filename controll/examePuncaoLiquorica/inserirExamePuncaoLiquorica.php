<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ExamePuncaoLiquoricaDao.php';

function inserirExamePuncaoLiquorica(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['puncaoLiquorica'] = $_POST['puncaoLiquorica'];
   $array['dataPuncaoLiquorica'] = $_POST['dataPuncaoLiquorica'];
   $array['aspecto'] = $_POST['aspecto'];
   $array['hemacias'] = $_POST['hemacias'];
   $array['leococitos'] = $_POST['leococitos'];
   $array['bastonetes'] = $_POST['bastonetes'];
   $array['segmentados'] = $_POST['segmentados'];
   $array['monocitos'] = $_POST['monocitos'];
   $array['linfocitos'] = $_POST['linfocitos'];
   $array['proteinas'] = $_POST['proteinas'];
   $array['cloreto'] = $_POST['cloreto'];
   $array['glicose'] = $_POST['glicose'];
   
   $examePuncaoLiquoricaDao = new ExamePuncaoLiquoricaDao();
   if(isPuncaoLiquoricaExiste($_POST['prontuario'])){
      $result = $examePuncaoLiquoricaDao->updatePuncaoLiquorica($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.5-examesImagem.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $examePuncaoLiquoricaDao->inserirPuncaoLiquorica($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/2.5-examesImagem.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isPuncaoLiquoricaExiste($prontuario){
   $exameDao = new ExamePuncaoLiquoricaDao();
   $result = $exameDao->getPuncaoLiquoricaByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

inserirExamePuncaoLiquorica();