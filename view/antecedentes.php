<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class entrevistaMae extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function(){
             
         });
      </script>
      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      ?>
<div class="container">   
   <h3>3.2 - Antecedentes</h3>
   <form method="post" action="/controll/antecedentes/inserirAntecedentes.php">
      <div class="row">
         <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label>Você tem algum grau de parentesco com seu parceiro?</label>
            <label><input required type="radio" value="0" name="grauParentesco">Não</label>
            <label><input required type="radio" value="1" name="grauParentesco">Sim</label>
            <input class="form-control" name="descGrauParentesco" placeholder="Se sim - Especificar aqui">
         </div>
         
         <div class="col-sm-6 form-group">
            <label>Você possui alguma malformação congênita?</label>
            <label><input required type="radio" value="0" name="malFormacao">Não</label>
            <label><input required type="radio" value="1" name="malFormacao">Sim</label>
            <input class="form-control" name="descMalFormacao" placeholder="Se sim - Especificar aqui">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Há alguém na sua família, ou na do seu parceiro, que nasceu com microcefalia?</label>
            <label><input required type="radio" value="0" name="parenteMicrocefalia">Não</label>
            <label><input required type="radio" value="1" name="parenteMicrocefalia">Sim</label>
         </div>
         
         <div class="col-sm-6 form-group">
            <label>Você fazia uso de algum medicamento de uso contínuo?</label>
            <label><input required type="radio" value="0" name="usoMedContinuo">Não</label>
            <label><input required type="radio" value="1" name="usoMedContinuo">Sim</label>
            <input class="form-control" name="descUsoMedContinuo" placeholder="Se sim - Especificar aqui">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Teve diagnóstico de alguma doença pré-existente?</label>
            <label><input required type="radio" value="0" name="doencaPreExist">Não</label>
            <label><input required type="radio" value="1" name="doencaPreExist">Sim</label>
            <label>Se sim quais?</label><br>
            <table class="table">
               <tbody>
                  <tr>
                     <td><label><input name="diabetes" type="checkbox">Diabétes</label></td>
                     <td><label><input name="outrasMetabolicas" type="checkbox">Outras doenças metabolicas</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="hiperArterial" type="checkbox">Hipertensão arterial sistêmica</label></td>
                     <td><label><input name="cardiopatia" type="checkbox">Cardiopatia crônica</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="doencaRenal" type="checkbox">Doença renal crônica</label></td>
                     <td><label><input name="pneumopatia" type="checkbox">Pneumopatias crônicas</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="hemoglobinopatia" type="checkbox">Hemoglobinopatia</label></td>
                     <td><label><input name="cancer" type="checkbox">Câncer</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="autoimune" type="checkbox">Doença auto-imune</label></td>
                     <td><label><input name="neuroleptica" type="checkbox">Doença neuroléptica</label></td>
                  </tr>
               </tbody>
            </table>
            
            <input name="outros" class="form-control" placeholder="Se houver outras, especifique aqui">
         </div>
         
         <div class="col-sm-6 form-group">
            <label>Teve diagnóstico ou recebeu tratamento para alguma doença sexualmente transmissível?</label>
            <label><input required type="radio" value="0" name="dst">Não</label>
            <label><input required type="radio" value="1" name="dst">Sim</label>
            <table class="table">
               <tbody>
                  <tr>
                     <td><label><input name="hiv" type="checkbox">HIV</label></td>
                     <td><label><input name="sifilis" type="checkbox">Sífilis</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="gonorreia" type="checkbox">Gonorréia</label></td>
                     <td><label><input name="clamidia" type="checkbox">Clamídia</label></td>
                  </tr>
                  <tr>
                     <td><label><input name="hepatite" type="checkbox">Hepatites B e/ou C</label></td>
                     <td><label><input name="herpes" type="checkbox">Herpes simples</label></td>
                  </tr>
               </tbody>
            </table>
            <input name="outrasDsts" class="form-control" placeholder="Se houver outras, especifique aqui">

         </div>
      </div>
      
      <button class="btn btn-success">Salvar</button>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(7, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();