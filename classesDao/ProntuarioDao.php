<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ProntuarioDao {
   public function inserirProntuario($prontuario, $usuario){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO prontuario idProntuario, usuario VALUES (?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii", $prontuario, $usuario);
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
   
   public function getProntuarioById($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM prontuario WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function getAllProntuarios(){
      $con = ConexaoDao::getConecao();
      $query = "SELECT p.idProntuario, u.nome, p.dataCriacao FROM prontuario p, "
              . "usuario u WHERE p.usuario=u.idUsuario";
      $stmt = $con->prepare($query);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
}
