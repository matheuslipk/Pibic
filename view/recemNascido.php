<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class recemNascido extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function (){
            $("#gemelarSim").on('change', function(){
               $("#gemelarTipo").attr("disabled", false);
               $("#gemelarTipo").show();
            });
            $("#gemelarNao").on('change', function(){
               $("#gemelarTipo").attr("disabled", true);
               $("#gemelarTipo").hide();
            });
            
            $("#danoPerinatalSim").on('change', function(){
               $("#tipoDanoPerinatal").attr("disabled", false);
               $("#tipoDanoPerinatal").show();
            });
            $("#danoPerinatalNao").on('change', function(){
               $("#tipoDanoPerinatal").attr("disabled", true);
               $("#tipoDanoPerinatal").hide();
            });
         });
      </script>
      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      ?>
<div class="container">
   <h2>2 - Dados do recém-nascido</h2>
   <h3>2.1 - Informações gerais</h3>
   <form method="get">
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Data do parto</label>
            <input name="dataParto" class="form-control" type="date">
         </div>
         <div class="col-xs-6 form-group">
            <label>Sexo</label>
            <select name="sexo" class="form-control">
               <option>Masculino</option>
               <option>Feminino</option>
               <option>Indeterminado</option>
            </select>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Gemelar</label>
            <input type="radio" name="gemelar" value="Não" id="gemelarNao">Não
            <input type="radio" name="gemelar" value="Sim" id="gemelarSim">Sim
            <select class="form-control" id="gemelarTipo" disabled name="gemelarTipo">
               <option>1º Gemelar</option>
               <option>2º Gemelar</option>
               <option>3º Gemelar</option>
            </select>
         </div>
         <div class="col-xs-6 form-group">
            <label>Tipo de parto</label>
            <select class="form-control" name="tipoParto">
               <option>Cesário</option>
               <option>Fórceps</option>
               <option>Normal (Vaginal)</option>
            </select>
         </div>              
      </div>
      
      <div class="row">
         <div class="form-group col-xs-12">
            <label>Ocorreu dano perinatal?</label><br>
            <input class="radio-inline" type="radio" name="danoPerinatal" value="Não" id="danoPerinatalNao">Não
            <input class="radio-inline" type="radio" name="danoPerinatal" value="Sim" id="danoPerinatalSim">Sim, especifique
            <select disabled class="form-control" id="tipoDanoPerinatal" name="tipoDanoPerinatal">
               <option>Anóxico</option>
               <option>Hemorrágico</option>
               <option>Isquêmico</option>
               <option>Traumático</option>
               <option>Outros</option>
            </select>
         </div>         
      </div>  
      
      <div class="row">
         <div class="form-group col-xs-12">
            <label>Outro</label>
            <input name="outroDano" class="form-control" type="text" placeholder="Se outro especifique aqui">
         </div>         
      </div>
         
      <h3>2.2 - Exame físico ao nascer</h3>
      <div class="row">
         <div class="col-xs-12 form-group">
            <label>Presença de malformações</label>
            <input type="radio" name="malformacao" value="Não">Não
            <input type="radio" name="malformacao" value="Sim">Sim
            <select disabled class="form-control" id="tipoMalformacao" name="tipoDanoPerinatal">
               <option>Anóxico</option>
               <option>Hemorrágico</option>
               <option>Isquêmico</option>
               <option>Traumático</option>
               <option>Outros</option>
            </select>
         </div>
      </div>
            
      <input type="submit" class="btn btn-success">
   </form>   
   
</div>
      <?php
      parent::exibirPaginacaoQuest(2);
   }
}
$e = new recemNascido();
$e->display();