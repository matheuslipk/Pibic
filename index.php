<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/TipoHospitalDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class Index extends Pagina{
   public function exibirBody() {
      parent::exibirBody();
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
         <form action="/controll/prontuario/criarProntuario.php">
            <div class="row">
               <div class="form-group col-xs-12">
                  <label>Prontuário</label>
                  <input name="prontuario" type="number" class="form-control">
               </div>
            </div>
            <div>
               <button class="btn btn-primary" type="submit">Criar</button>
            </div>
         </form>
         
        
                  
      </div>
   </body>
      <?php
   }
}

$i = new Index();
$i->display();
