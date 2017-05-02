<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Ultilitarios.php';
require_once $root.'/controll/Controller.php';

require_once Ultilitarios::getCaminhoPastaPrincipal().'/modell/classesDao/AdminDao.php';
require_once Ultilitarios::getCaminhoPastaPrincipal().'/modell/classesDao/ResponsavelDao.php';
require_once Ultilitarios::getCaminhoPastaPrincipal().'/especial/ConexaoBD.php';
require_once Ultilitarios::getCaminhoPastaPrincipal().'/especial/ReCaptcha.php';

$secret = "6LeN0xwUAAAAAMOpZsNUlEb0mcA44vVKekmzsvFC";
$response = null;
$captcha = new ReCaptcha($secret);

//if ($_POST["g-recaptcha-response"]) {
//   $response = $captcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
//}

//if($response!= NULL && $response->success){
   if(filter_has_var(INPUT_POST, 'tipoUsuario')){
      if(filter_input(INPUT_POST, 'tipoUsuario')=='admin'){
         fazerLoginAdmin();
      }
      if(filter_input(INPUT_POST, 'tipoUsuario')=='agente'){
         fazerLoginAgente();
      }
   }else{
      redirecionaParaLogin('faltandoTipoUsuario');
   }
//}else{
//   redirecionaParaLogin('captchaIncorreto');
//}

function fazerLoginAgente(){
   if(filter_has_var(INPUT_POST, 'usuario')){
      $userPOST = filter_input(INPUT_POST, 'usuario');
      if(!Controller::isNickValido($userPOST)){
         redirecionaParaLogin('nickInvalido');
      }    
   }else {
      redirecionaParaLogin('faltandoNick');    
   }

   if(filter_has_var(INPUT_POST, 'senha')){
      $senhaPOST = md5(filter_input(INPUT_POST, 'senha'));
   }else {
      redirecionaParaLogin('faltandoSenha');
   }

   $responsavelDao = new AgenteDao();
   $responsavelBanco = $responsavelDao->getAgenteByNick($userPOST);

   if($responsavelBanco==NULL || $senhaPOST!=$responsavelBanco['senha']){
      redirecionaParaLogin('usuarioSenhaNaoCorrespondem');
   }else{
      
      Ultilitarios::sec_session_start();
      $_SESSION['idAgente'] = $responsavelBanco['idAgente'];
      $_SESSION['nickAgente'] = $responsavelBanco['nick'];  
      $_SESSION['tempoAgente'] = time();
      header("Location: /apostas/fazerApostas.php");
   }
}

function fazerLoginAdmin(){
   if(filter_has_var(INPUT_POST, 'usuario')){
      $userPOST = filter_input(INPUT_POST, 'usuario');
      if(!Controller::isNickValido($userPOST)){
         redirecionaParaLogin('nickInvalido');
      }    
   }else {
      redirecionaParaLogin('faltandoNick');    
   }

   if(filter_has_var(INPUT_POST, 'senha')){
      $senhaPOST = md5(filter_input(INPUT_POST, 'senha'));
   }else {
      redirecionaParaLogin('faltandoSenha');
   }

   $adminDao = new AdminDao();
   $usuarioBanco = $adminDao->getAdminByNick($userPOST);

   if($usuarioBanco==NULL || $senhaPOST!=$usuarioBanco['senha']){
      redirecionaParaLogin('usuarioSenhaNaoCorrespondem');
   }else{
      Ultilitarios::sec_session_start();
      $_SESSION['idAdmin'] = $usuarioBanco['idAdmin'];
      $_SESSION['nickAdmin'] = $usuarioBanco['nick'];   
      $_SESSION['tempoAdmin'] = time();
      header("Location: /apostas/ultimasApostas.php");
   }
}

function redirecionaParaLogin($erro){
    header("Location: /login.php?erro=$erro");
}