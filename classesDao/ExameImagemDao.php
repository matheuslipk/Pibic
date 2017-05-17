<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ExameImagemDao {
   public function inserirExameImagem($array){
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameimagem VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisisisisisiisiis", $array['idProntuario'], $array['tomografiaCran'], 
              $array['resultTomografiaCran'], $array['ressonanciaMagCran'], $array['resultRessonanciaMagCran'], 
              $array['ultrassomTrans'], $array['resultUltrassomTrans'], $array['ultrassomAbd'], 
              $array['resultUltrassomAbd'], $array['ecocardiograma'], $array['resultEcocardiograma'],
              $array['fundoOlho'], $array['alterFundoOlho'], $array['descAlterFundoOlho'],
              $array['testeOrelhinha'], $array['alterTesteOrelhinha'], $array['descAlterTesteOrelhinha']);
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
   
   public function getExameImagemByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM exameimagem WHERE idProntuario=?";
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
   
   public function updateExameImagem($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE exameimagem SET tomografiaCran=?, resultTomografiaCran=?, "
              . "ressonanciaMagCran=?, resultRessonanciaMagCran=?, ultrassomTrans=?, resultUltrassomTrans=?, "
              . "ultrassomAbd=?, resultUltrassomAbd=?, ecocardiograma=?, resultEcocardiograma=?,"
              . "fundoOlho=?, alterFundoOlho=?, descAlterFundoOlho=?, "
              . "testeOrelhinha=?, alterTesteOrelhinha=?, descAlterTesteOrelhinha=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("isisisisisiisiisi", $array['tomografiaCran'], 
              $array['resultTomografiaCran'], $array['ressonanciaMagCran'], $array['resultRessonanciaMagCran'], 
              $array['ultrassomTrans'], $array['resultUltrassomTrans'], $array['ultrassomAbd'], 
              $array['resultUltrassomAbd'], $array['ecocardiograma'], $array['resultEcocardiograma'], 
              $array['fundoOlho'], $array['alterFundoOlho'], $array['descAlterFundoOlho'],
              $array['testeOrelhinha'], $array['alterTesteOrelhinha'], $array['descAlterTesteOrelhinha'],
              $array['idProntuario']);
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
//$eDao = new ExamePuncaoLiquosaDao();
//var_dump($eDao->getImagemByProntuario(1));