<?php
//require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DadosSociodemograFicosDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/EnderecoDao.php';

function inserirDadosSociodemogradicos(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['uf'] = $_POST['uf'];
   $array['municipio'] = $_POST['municipio'];
   $array['logradouro'] = $_POST['logradouro'];
   $array['numero'] = $_POST['numero'];
   $array['bairro'] = $_POST['bairro'];
   $array['telefone'] = $_POST['telefone'];
   
   $enderecoDao = new EnderecoDao();
   if(isEnderecoExiste($_POST['prontuario'])){
      $result = $enderecoDao->updateEndereco($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/entrevistaMae.php?prontuario={$array['idProntuario']}");
      }
   }else{
      $result = $enderecoDao->inserirEndereco($array);
      echo $result;
      if($result === TRUE){
         header("Location: /view/entrevistaMae.php?prontuario={$array['idProntuario']}");
      }
   }
   
}

function isEnderecoExiste($prontuario){
   $ederecoDao = new EnderecoDao();
   $result = $ederecoDao->getEnderecoByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

function inserirEndereco($array){
}

inserirDadosSociodemogradicos();