<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/DadosSociodemograFicosDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/EnderecoDao.php';

function inserirDadosSociodemogradicos(){
   
   $array['idProntuario'] = $_POST['prontuario'];
   $array['nome'] = $_POST['nome'];
   $array['dataNascimento'] = $_POST['dataNascimento'];
   $array['racaCor'] = $_POST['racaCor'];
   $array['escolaridade'] = $_POST['escolaridade'];
   $array['estadoCivil'] = $_POST['estadoCivil'];
   $array['ocupacao'] = $_POST['ocupacao'];
   $array['pessoasNaCasa'] = $_POST['pessoasNaCasa'];
   $array['rendaFamiliar'] = $_POST['rendaFamiliar'];
   $array['enderecoAtual'] = $_POST['prontuario'];
   
   $array['uf'] = $_POST['uf'];
   $array['municipio'] = $_POST['municipio'];
   $array['logradouro'] = $_POST['logradouro'];
   $array['numero'] = $_POST['numero'];
   $array['bairro'] = $_POST['bairro'];
   $array['telefone'] = $_POST['telefone'];
   
   $enderecoDao = new EnderecoDao();
   $dadosDao = new DadosSociodemogradicosDao();
   
   if(isEnderecoExiste($_POST['prontuario'])){
      $result1 = $enderecoDao->updateEndereco($array);
      echo $result1;
      if($result1 === TRUE){
         header("Location: /view/antecedentes.php?prontuario={$array['idProntuario']}");
      }
      if(isDadosSocioExiste($_POST['prontuario'])){
         $result = $dadosDao->updateDadosSociodemogradicos($array);
         echo $result;
         if($result === TRUE){
            header("Location: /view/antecedentes.php?prontuario={$array['idProntuario']}");
         }
      }else{
         $result = $dadosDao->inserirDadosSociodemogradicos($array);
         echo $result;
         if($result === TRUE){
            header("Location: /view/antecedentes.php?prontuario={$array['idProntuario']}");
         }
      }  
   }else{
      $result1 = $enderecoDao->inserirEndereco($array);
      echo $result1;
      if($result1 === TRUE){
         header("Location: /view/antecedentes.php?prontuario={$array['idProntuario']}");
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

function isDadosSocioExiste($prontuario){
   $dadosDao = new DadosSociodemogradicosDao();
   $result = $dadosDao->getDadosSociodemogradicosByProntuario($prontuario);
   if($result===FALSE){
      return FALSE;
   }elseif (count($result)>=1) {
      return TRUE;
   }
}

function inserirEndereco($array){
}

inserirDadosSociodemogradicos();