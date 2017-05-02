<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/controll/Controller.php";

class Pagina {
   private $tituloPagina;
   private $usuarioLogado=false;


   public final function display() {
           
      echo "<!DOCTYPE html>\n";
      echo "<html lang='pt-br'>\n";
      echo "<head>\n";
      $this->exibirHead();
      echo "</head>\n";
      echo "<body>\n";
      $this->exibirBody();
      $this->exibirRodape();
      echo "</body>\n";      
      echo '</html>';
   }

   public function setTituloPagina($titulo){
      $this->tituloPagina = $titulo;
   }

   public function exibirHead(){
      ?>
      <?php $this->exibirTituloPagina();  ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/meucss.css">
      <script src="/bootstrap/js/jquery-3.1.1.min.js"></script>
      <script src="/bootstrap/js/bootstrap.min.js"></script>
      <?php
   }
    
   public function exibirBody(){
      $this->exibirBarraNavUsuario();
   }
   
   public function getResponsavelLogado(){
      return $this->usuarioLogado;
   }
   
    
    private function exibirBarraNavUsuario(){
        ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="/">Hospital</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
             
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pagina 2<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Pagina 2-1</a></li>
                <li><a href="#">Pagina 2-2</a></li>
              </ul>
            </li>
            
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo 'Nome do usuário'; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a href="#">Minha conta</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
                
            </li>
          </ul>
        </div>
      </div>
    </nav>
        
    <?php
    }
    
   public function exibirRodape(){
      ?>
      <footer class="footer navbar-text">
         <div class="container">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
               <p class="text-muted text-center">
               m47esportes Copyright © 2017 <br>
               Seu ip é <?php echo $_SERVER['REMOTE_ADDR'].' em '; ?>
               <?php 
               if($this->usuarioLogado){
                  $data = $_SESSION['tempoAgente'];
                  echo Ultilitarios::dataHoraFormatada($data);
               }
               ?>
               </p>
            </div>
         </div>            
      </footer>        
        <?php
    }

        //métodos privados
   private function exibirTituloPagina(){
      echo "<title>{$this->tituloPagina}</title>\n";
   }

   public function exibirPaginacaoQuest(int $num){
      echo "<div class='row'>";
      echo "<div class='col-xs-3'></div>";
      echo "<div class='col-xs-6'>";
      echo "<ul class='pagination  center-block'>";
      
      if($num === 1){
         echo "<li class='active'><a href='/view/servicoSaude.php'>1</a></li>";
      }else{
         echo "<li><a href='/view/servicoSaude.php'>1</a></li>";
      }
      if($num ===2){
         echo "<li class='active'><a href='/view/recemNascido.php'>2</a></li>";
      }else{
         echo "<li><a href='/view/recemNascido.php'>2</a></li>";
      }
      if($num ===3){
         echo "<li class='active'><a href='/view/entrevistaMae.php'>3</a></li>";
      }else{
         echo "<li><a href='/view/entrevistaMae.php'>3</a></li>";
      }
      if($num ===4){
         echo "<li class='active'><a href='#'>4</a></li>";
      }else{
         echo "<li><a href='#'>4</a></li>";
      }
      if($num ===5){
         echo "<li class='active'><a href='#'>5</a></li>";
      }else{
         echo "<li><a href='#'>5</a></li>";
      }
      
      echo "</ul>";
      echo "</div> ";           
      echo "</div>";
      
   }
}
