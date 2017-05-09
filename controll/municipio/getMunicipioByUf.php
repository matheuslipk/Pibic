<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/MunicipioDao.php';

function returnMunicipios(){
   $munDao = new MunicipioDao();
   $municipios = $munDao->getMunicipiosByUf($_POST['uf']);
   echo json_encode($municipios);
}

returnMunicipios();