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
   <h4>3.5 - Hábitos durante a gestação</h4>
   <form>
      
      
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
   
   
</div>


      <?php
      parent::exibirPaginacaoQuest(9, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();