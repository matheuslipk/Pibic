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
      $tipoGemelar = $array['tipoGemelar'];
      $tipoParto = $array['tipoParto'];
      $danoPerinatal = $array['danoPerinatal'];
      $tipoDanoPerinatal = $array['tipoDanoPerinatal'];
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO recemNascido VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiisissis", $idProntuario, $dataParto, $sexo, 
              $idadeGestSem, $idadeGestDia, $classIdadeGest, $gemelar, 
              $tipoGemelar, $tipoParto, $danoPerinatal, $tipoDanoPerinatal);
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
      $query = "SELECT * FROM recemNascido WHERE idProntuario=?";
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
      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE recemNascido SET dataParto=?, sexo=?, idadeGestacionalSem=?, "
              . "idadeGestacionalDia=?, classIdadeGest=?, gemelar=?, tipoGemelar=?, "
              . "tipoParto=?, danoPerinatal=?, tipoDanoPerinatal=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssiisissisi", $dataParto, $sexo, 
              $idadeGestSem, $idadeGestDia, $classIdadeGest, $gemelar, 
              $tipoGemelar, $tipoParto, $danoPerinatal, $tipoDanoPerinatal, $idProntuario);
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
