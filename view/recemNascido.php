<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/RecemNascidoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class recemNascido extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function (){
            $("#gemelarSim").on('change', function(){
               $("#tipoGemelar").attr("disabled", false);
            });
            $("#gemelarNao").on('change', function(){
               $("#tipoGemelar").attr("disabled", true);
            });
            
            $("#danoPerinatalSim").on('change', function(){
               $("#tipoDanoPerinatal").attr("disabled", false);
            });
            $("#danoPerinatalNao").on('change', function(){
               $("#tipoDanoPerinatal").attr("disabled", true);
            });
         });
      </script>
      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      if(isset($_GET['prontuario'])){
         $recemDao = new RecemNascidoDao();
         $recemNascido = $recemDao->getRecemNascidoByProntuario($_GET['prontuario']);
//         var_dump($recemNascido);
      }else{
         die("Nenhum prontuário selecionado");
      }
      ?>
<div class="container">
   <h2>2 - Dados do recém-nascido</h2>
   <h3>2.1 - Informações gerais</h3>
   <form method="post" action="/controll/recemNascido/inserirRecemNascido.php">
      <div class="row">
         <input type="text" style="display: none;" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-xs-6 form-group">
            <label>Data do parto</label>
            <input name="dataParto" class="form-control" type="date" required value="<?php if(isset($recemNascido['dataParto'])){echo $recemNascido['dataParto'];}?>">
         </div>
         <div class="col-xs-6 form-group">
            <label>Sexo</label>
            <select name="sexo" class="form-control">
               <?php
               if(isset($recemNascido['sexo'])){
                  $sexo = $recemNascido['sexo'];
                  if($sexo==="Masculino"){
                     echo "<option selected>Masculino</option>";
                  }else{
                     echo "<option>Masculino</option>";
                  }
                  if($sexo==="Feminino"){
                     echo "<option selected>Feminino</option>";
                  }else{
                     echo "<option>Feminino</option>";
                  }
                  if($sexo==="Indeterminado"){
                     echo "<option selected>Indeterminado</option>";
                  }else{
                     echo "<option>Indeterminado</option>";
                  }
               }else{
                  echo "<option>Masculino</option>";
                  echo "<option>Feminino</option>";
                  echo "<option>Indeterminado</option>";
               }               
               ?>               
            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Gemelar</label>
            <input <?php if($recemNascido['gemelar']===0) {echo "checked";}?> required type="radio" name="gemelar" value="0" id="gemelarNao">Não
            <input <?php if($recemNascido['gemelar']===1) {echo "checked";}?> required type="radio" name="gemelar" value="1" id="gemelarSim">Sim
            <select class="form-control" id="tipoGemelar" name="tipoGemelar" required>    
               <?php
               if(isset($recemNascido['tipoGemelar'])){
                  $tipoGemela = $recemNascido['tipoGemelar'];
                  if($tipoGemela==="1º Gemelar"){
                     echo '<option selected>1º Gemelar</option>';
                  }else{
                     echo "<option>1º Gemelar</option>";
                  }
                  if($tipoGemela==="2º Gemelar"){
                     echo '<option selected>2º Gemelar</option>';
                  }else{
                     echo "<option>2º Gemelar</option>";
                  }
                  if($tipoGemela==="3º Gemelar"){
                     echo '<option selected>3º Gemelar</option>';
                  }else{
                     echo "<option>3º Gemelar</option>";
                  }
               }else{
                  echo "<option>1º Gemelar</option>";
                  echo "<option>2º Gemelar</option>";
                  echo "<option>3º Gemelar</option>";
               }
               
               
               
               ?>
            </select>
         </div>
         <div class="col-xs-6 form-group">
            <label>Tipo de parto</label>
            <select class="form-control" name="tipoParto">
               <?php
               if(isset($recemNascido['tipoParto'])){
                  $tipoPArto = $recemNascido['tipoParto'];
                  if($tipoPArto==="Cesário"){
                     echo "<option selected>Cesário</option>";
                  }else{
                     echo "<option>Cesário</option>";
                  }
                  
                  if($tipoPArto==="Fórceps"){
                     echo "<option selected>Fórceps</option>";
                  }else{
                     echo "<option>Fórceps</option>";
                  }
                  
                  if($tipoPArto==="Normal (Vaginal)"){
                     echo "<option selected>Normal (Vaginal)</option>";
                  }else{
                     echo "<option>Normal (Vaginal)</option>";
                  }
               }else{
                  echo "<option>Cesário</option>";
                  echo "<option>Fórceps</option>";
                  echo "<option>Normal (Vaginal)</option>";
               }
               
               ?>
            </select>
         </div>              
      </div>
      
      <div class="row">
         <div class="form-group col-xs-6">
            <label>Ocorreu dano perinatal?</label><br>
            <input <?php if($recemNascido['danoPerinatal']===0) {echo "checked";}?> required class="radio-inline" type="radio" name="danoPerinatal" value="0" id="danoPerinatalNao">Não
            <input <?php if($recemNascido['danoPerinatal']===1) {echo "checked";}?> required class="radio-inline" type="radio" name="danoPerinatal" value="1" id="danoPerinatalSim">Sim, especifique
            <select class="form-control" id="tipoDanoPerinatal" name="tipoDanoPerinatal">
               <?php
               if(isset($recemNascido['tipoDanoPerinatal'])){
                  $tipoDanoPerinatal = $recemNascido['tipoDanoPerinatal'];
                  if($tipoDanoPerinatal==="Anóxico"){
                     echo "<option selected>Anóxico</option>";
                  }else{
                     echo "<option>Anóxico</option>";
                  }
                  
                  if($tipoDanoPerinatal==="Hemorrágico"){
                     echo "<option selected>Hemorrágico</option>";
                  }else{
                     echo "<option>Hemorrágico</option>";
                  }
                  
                  if($tipoDanoPerinatal==="Isquêmico"){
                     echo "<option selected>Isquêmico</option>";
                  }else{
                     echo "<option>Isquêmico</option>";
                  }
                  
                  if($tipoDanoPerinatal==="Traumático"){
                     echo "<option selected>Traumático</option>";
                  }else{
                     echo "<option>Traumático</option>";
                  }
                  
                  if($tipoDanoPerinatal==="Outros"){
                     echo "<option selected>Outros</option>";
                  }else{
                     echo "<option>Outros</option>";
                  }
                  
               }else{
                  echo "<option>Anóxico</option>";
                  echo "<option>Hemorrágico</option>";
                  echo "<option>Isquêmico</option>";
                  echo "<option>Traumático</option>";
                  echo "<option>Outros</option>";
               }
               
               ?>
            </select>
         </div>        
         
         <div class="form-group col-xs-6">
            <label>Outro dano</label><br><br>
            <input name="outroDano" class="form-control" type="text" placeholder="Se outro especifique aqui">     
         </div>
      </div>  
      
      <div class="row">         
         <div class="col-xs-6">
            <label>Idade Gestacional (Semanas / Dias)</label>
            <div class="row">
               <div class="col-xs-6">
                  <input name="idadeGestacionalSem" class="form-control" placeholder="Semanas" value="<?php if(isset($recemNascido['idadeGestacionalSem'])){echo $recemNascido['idadeGestacionalSem'];} ?>">
               </div>
               <div class="col-xs-6">
                  <input name="idadeGestacionalDia" class="form-control" placeholder="Dias" value="<?php if(isset($recemNascido['idadeGestacionalDia'])){echo $recemNascido['idadeGestacionalDia'];}?>">                  
               </div>
            </div>                        
         </div>
         <div class="col-xs-6">
            <label>Classificação idade gestacional</label>
            <select name="classIdadeGest" class="form-control">
               <option>Pré-termo</option>
               <option>Termo</option>
               <option>Pós-termo</option>
            </select>
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