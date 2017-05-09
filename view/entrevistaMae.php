<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/MunicipioDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/EstadoDao.php';

class entrevistaMae extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function(){
            $("#uf").on('change', function (){
               atualizaMunicipios();
            });
            
            function atualizaMunicipios(){
               $.ajax({
                  url: '/controll/municipio/getMunicipioByUf.php',
                  type: 'post',
                  data:{
                     uf: $("#uf").val()
                  },
                  success: function (resposta){
                     alert(getTabela(resposta));
                  }
               });
            }
            
            function getTabela(json){
               var result = [];
               var keys = Object.keys(json);
               keys.forEach(function(key){
                  result.push(json[key]);
               });
               return result;
            }
            
         });
      </script>


      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      ?>
<div class="container">   
   <h2 style="text-align: center">3 - Entrevista com a mãe</h2>
   <h3>3.1 - Identificação e dados sociodemográficos</h3>
   <div class="row">
      <div class="col-sm-6 form-group">
         <label>Nome</label>
         <input class="form-control" name="nome">
      </div>
      <div class="col-sm-6 form-group">
         <label>Data de nascimento</label>
         <input type="date" class="form-control" name="dataNascimento">
      </div>
   </div>
   
   <div class="row">
      <div class="col-sm-6 form-group">
         <label>Raça/Cor</label>
         <input class="form-control" name="racaCor">
      </div>
      <div class="col-sm-6 form-group">
         <label>Escolaridade (considerar maior nível completo)</label>
         <select class="form-control" name="escolaridade">
            <option>Sem escolaridade</option>
            <option>Fundamental I</option>
            <option>Fundamental II</option>
            <option>Médio</option>
            <option>Superior</option>
            <option>Iguinorado</option>
         </select>
      </div>
   </div>
   
   <div class="row">
      <div class="col-sm-6 form-group">
         <label>Estado civil</label>
         <select class="form-control" name="estadoCivil">
            <option>Solteira</option>
            <option>Casada</option>
            <option>Viúva</option>
            <option>Separada/Divorciada</option>
            <option>União estável</option>
            <option>Iguinorado</option>
         </select>
      </div>
      <div class="col-sm-6 form-group">
         <label>Ocupação</label>
         <input class="form-control" name="ocupacao">
      </div>
   </div>
   
   <div class="row">
      <div class="col-sm-6 form-group">
         <label>Quantas pessoas moram na sua casa?</label>
         <input class="form-control" type="number" name="pessoasNaCasa">
      </div>
      <div class="col-sm-6 form-group">
         <label>Renda familiar mensal (reais)</label>
         <input type="number" class="form-control" name="rendaFamiliar">
      </div>
   </div>
   
   <h4>Endereço atual</h4>
   
   <div class="row">
      
      <div class="col-sm-6 form-group">
         <label>Estado</label>
         <select class="form-control" type="number" name="uf" id="uf">
            <?php
            $estadoDao = new EstadoDao();
            $estados = $estadoDao->getAllEstados();
            foreach ($estados as $estado){
               echo "<option value='{$estado['uf']}'>".$estado['nome']."</option>";
            }
            ?>
         </select>
      </div>
      <div class="col-sm-6 form-group">
         <label>Município</label>
         <select  class="form-control" name="municipio" id="municipio">
            
         </select>
      </div>
   </div>
   
</div>


      <?php
      parent::exibirPaginacaoQuest(6, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();