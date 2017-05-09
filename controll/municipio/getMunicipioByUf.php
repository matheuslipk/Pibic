<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/MunicipioDao.php';

function returnMunicipios(){
   $munDao = new MunicipioDao();
   $municipios = $munDao->getMunicipiosByUf($_POST['uf']);
   foreach ($municipios as $municipio){
       echo "<option value='{$municipio['codigo']}'>".$municipio['nome'].'</option>';
   }
}

returnMunicipios();