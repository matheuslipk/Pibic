<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class RecemNascidoDao {
   public function inserirRecemNascido($array){
      $idProntuario = $array['idProntuario'];
      $dataParto = $array['dataParto'];
      $sexo = $array['sexo'];
      $idadeGestSem = $array['idadeGestacionalSem'];
      $idadeGestDia = $array['idadeGestacionalDia'];
      $classIdadeGest = $array['classIdadeGest'];
      $gemelar = $array['gemelar'];
      if(isset($array['tipoGemelar'])){
         $tipoGemelar = $array['tipoGemelar'];
      }else{
         $tipoGemelar = NULL;
      }
      $tipoParto = $array['tipoParto'];
      $danoPerinatal = $array['danoPerinatal'];
      if(isset($array['tipoDanoPerinatal'])){
         $tipoDanoPerinatal = $array['tipoDanoPerinatal'];
      }else{
         $tipoDanoPerinatal = NULL;
      }
      $outroDano = $array['outroDano'];
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO recemnascido VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiisississ", $idProntuario, $dataParto, $sexo, 
              $idadeGestSem, $idadeGestDia, $classIdadeGest, $gemelar, 
              $tipoGemelar, $tipoParto, $danoPerinatal, $tipoDanoPerinatal, $outroDano);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function getRecemNascidoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM recemnascido WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function updateRecemNascido($array){
      $idProntuario = $array['idProntuario'];
      $dataParto = $array['dataParto'];
      $sexo = $array['sexo'];
      $idadeGestSem = $array['idadeGestacionalSem'];
      $idadeGestDia = $array['idadeGestacionalDia'];
      $classIdadeGest = $array['classIdadeGest'];
      $gemelar = $array['gemelar'];
      if(isset($array['tipoGemelar'])){
         $tipoGemelar = $array['tipoGemelar'];
      }else{
         $tipoGemelar = NULL;
      }
      $tipoParto = $array['tipoParto'];
      $danoPerinatal = $array['danoPerinatal'];
      if(isset($array['tipoDanoPerinatal'])){
         $tipoDanoPerinatal = $array['tipoDanoPerinatal'];
      }else{
         $tipoDanoPerinatal = NULL;
      }
      $outroDano = $array['outroDano'];
      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE recemnascido SET dataParto=?, sexo=?, idadeGestacionalSem=?, "
              . "idadeGestacionalDia=?, classIdadeGest=?, gemelar=?, tipoGemelar=?, "
              . "tipoParto=?, danoPerinatal=?, tipoDanoPerinatal=?, outroDano=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssiisississi", $dataParto, $sexo, 
              $idadeGestSem, $idadeGestDia, $classIdadeGest, $gemelar, 
              $tipoGemelar, $tipoParto, $danoPerinatal, $tipoDanoPerinatal, $outroDano, $idProntuario);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
}
