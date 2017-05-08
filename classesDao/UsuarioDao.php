<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class UsuarioDao {
   public function inserirUsuario($array){
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
      $query = "INSERT INTO recemNascido VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiisissis", $idProntuario, $dataParto, $sexo, 
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
   
   public function getUsuarioByNick($nick){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM usuario WHERE nick=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $nick);
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
   
   public function updateUsuario($array){
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
      $query = "UPDATE recemNascido SET dataParto=?, sexo=?, idadeGestacionalSem=?, "
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
