<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class entrevistaMae extends Pagina{
   public function exibirBody() {
      parent::exibirBody();
      
      parent::exibirPaginacaoQuest(3);
   }
}
$e = new entrevistaMae();
$e->display();