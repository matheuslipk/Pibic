<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Ultilitarios.php';
require_once $root.'/controll/Controller.php';
Ultilitarios::sec_session_start();
Controller::destruirSessaoAdmin();
Controller::destruirSessaoAgente();
header("Location: ".Ultilitarios::getLinkLogin().'?logout=true');