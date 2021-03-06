<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/TipoHospitalDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ServicoSaudeDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/MunicipioDao.php';

class Index extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
   <script>
   $(document).ready(function(){
      $("#btnSubmit").on("click", function(){
         verificarCampos();
      });
      
      function verificarCampos(){
         var campo = [];
         campo.push($.trim($("#identServico").val()).length);
         campo.push($.trim($("#resp").val()).length);
         var contador=0;
         for(i=0; i<campo.length; i++){
            if(campo[i]===0){
               contador++;
            }
         }
         
         var ok;
         
         if(contador!==0){
            ok = confirm("Você está deixando "+contador+" campos em branco!");
         }else{
            $("#formServicoSaude").submit();
            return;
         }
         
         if(ok===true){
            $("#formServicoSaude").submit();
            return;
         }else{
            console.log("Você resolveu ficar");
         }
         
      }
   });
   </script>

      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      if(isset($_GET['prontuario'])){
         $prontuario = $_GET['prontuario'];
         $servDao = new ServicoSaudeDao();
         $servico = $servDao->getServicoSaudeById($prontuario);
      }
      ?>
      <div class="container">
         
         <div class="row">
            <div class="titulo">
               <h1>
                  <strong>
                  QUESTIONÁRIO DE INVESTIGAÇÃO DE CASOS SUSPEITOS DE MICROCEFALIA
                  </strong>
               </h1>
            </div>
         </div>
         <form id="formServicoSaude" method="post" action="/controll/1.0-servicoSaude/inserirServicoSaude.php">
            <div class="row">
               <h2>1 - Dados do serviço de saúde</h2>
            </div>

            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Tipo</label>
                  <select class="form-control" name="tipoHospital">
                     <?php
                     $tipoHospDao = new TipoHospitalDao();
                     $tipoHospital = $tipoHospDao->getAllTipoHospital();
                     
                     foreach ($tipoHospital as $tipo){
                        if($servico['idTipoHospital'] == $tipo['idTipoHospital']){
                           echo "<option value='{$tipo['idTipoHospital']}' selected>";
                        }else{
                           echo "<option value='{$tipo['idTipoHospital']}'>";
                        }
                        echo $tipo['tipo'];
                        echo '</option>';
                     }
                     ?>
                  </select>
               </div>

               <div class="form-group col-sm-6">
                  <label>Identificação do serviço</label>
                  <input id="identServico" name="identServico" type="text" class="form-control" <?php echo "value={$servico['identServico']}"; ?>>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-sm-4">
                  <label>Município de ocorrência</label>
                  <select class="form-control" name="municipioOcorrencia">
                     <?php
                     $municDao = new MunicipioDao();
                     $municipios = $municDao->getMunicipiosByUf('PI');
                     foreach ($municipios as $municipio){
                        if($servico['municipioOcorrencia']==$municipio['codigo']){
                           echo "<option selected value='{$municipio['codigo']}'>{$municipio['nome']}</option>";
                        }else{
                           echo "<option value='{$municipio['codigo']}'>{$municipio['nome']}</option>";
                        }
                        
                     }
                     ?>
                  </select>
               </div>

               <div class="form-group col-sm-4">
                  <label>Prontuário</label>
                  <input readonly name="prontuario" type="number" class="form-control" <?php echo "value='{$_GET['prontuario']}'"; ?>>
               </div>

               <div class="form-group col-sm-4">
                  <label>RESP</label>
                  <input id="resp" name="resp" type="text" class="form-control"  <?php echo "value={$servico['resp']}"; ?>>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-4">
                  <button id="btnSubmit" type="button" class="btn btn-success">Salvar e ir para a próxima seção >></button>
               </div>

            </div>
         </form>
      </div>
      <?php
      parent::exibirPaginacaoQuest(1, $_GET['prontuario']);
      ?>
   </body>
      <?php
   }
}

$i = new Index();
$i->display();
