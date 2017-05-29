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
   <h3>2.4 Exames etiológicos</h3>
   <form>
      <p>Atenção!!! Preencher os resultados conforme a legenda: <br>
      [1] Reagente/Positivo [2] Não reagente/Negativo [3] Inconclusivo [4] Não realizado
      </p>
      
      <table border="1" class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none":
         <tbody>
            <tr>
               <td>Agente</td>
               <td>Amostra</td>
               <td>Data coleta</td>
               <td>IgM</td>
               <td>IgG</td>
               <td>PCR</td>
            </tr>
            <tr>
               <td rowspan="3">Rubéola</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"> </td>
               <td><input class="form-control" name="igm01" type="number"></td>
               <td><input class="form-control" name="igg01" type="number"></td>
               <td><input class="form-control" name="pcr01" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data02"></td>
               <td><input class="form-control" name="igm02" type="number"></td>
               <td><input class="form-control" name="igg02" type="number"></td>
               <td><input class="form-control" name="pcr02" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Citomegalovírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data10"></td>
               <td><input class="form-control" name="igm10" type="number"></td>
               <td><input class="form-control" name="igg10" type="number"></td>
               <td><input class="form-control" name="pcr10" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data11"> </td>
               <td><input class="form-control" name="igm11" type="number"></td>
               <td><input class="form-control" name="igg11" type="number"></td>
               <td><input class="form-control" name="pcr11" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data12"></td>
               <td><input class="form-control" name="igm12" type="number"></td>
               <td><input class="form-control" name="igg12" type="number"></td>
               <td><input class="form-control" name="pcr12" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Herpes vírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data20"></td>
               <td><input class="form-control" name="igm20" type="number"></td>
               <td><input class="form-control" name="igg20" type="number"></td>
               <td><input class="form-control" name="pcr20" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data21"> </td>
               <td><input class="form-control" name="igm21" type="number"></td>
               <td><input class="form-control" name="igg21" type="number"></td>
               <td><input class="form-control" name="pcr21" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data22"></td>
               <td><input class="form-control" name="igm22" type="number"></td>
               <td><input class="form-control" name="igg22" type="number"></td>
               <td><input class="form-control" name="pcr22" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Parvovírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data30"></td>
               <td><input class="form-control" name="igm30" type="number"></td>
               <td><input class="form-control" name="igg30" type="number"></td>
               <td><input class="form-control" name="pcr30" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data31"> </td>
               <td><input class="form-control" name="igm31" type="number"></td>
               <td><input class="form-control" name="igg31" type="number"></td>
               <td><input class="form-control" name="pcr31" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data32"></td>
               <td><input class="form-control" name="igm32" type="number"></td>
               <td><input class="form-control" name="igg32" type="number"></td>
               <td><input class="form-control" name="pcr32" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Toxoplasmose</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data40"></td>
               <td><input class="form-control" name="igm40" type="number"></td>
               <td><input class="form-control" name="igg40" type="number"></td>
               <td><input class="form-control" name="pcr40" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data41"> </td>
               <td><input class="form-control" name="igm41" type="number"></td>
               <td><input class="form-control" name="igg41" type="number"></td>
               <td><input class="form-control" name="pcr41" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data42"></td>
               <td><input class="form-control" name="igm42" type="number"></td>
               <td><input class="form-control" name="igg42" type="number"></td>
               <td><input class="form-control" name="pcr42" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Sífilis</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data50"></td>
               <td><input class="form-control" name="igm50" type="number"></td>
               <td><input class="form-control" name="igg50" type="number"></td>
               <td><input class="form-control" name="pcr50" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data51"> </td>
               <td><input class="form-control" name="igm51" type="number"></td>
               <td><input class="form-control" name="igg51" type="number"></td>
               <td><input class="form-control" name="pcr51" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data52"></td>
               <td><input class="form-control" name="igm52" type="number"></td>
               <td><input class="form-control" name="igg52" type="number"></td>
               <td><input class="form-control" name="pcr52" type="number"></td>
            </tr>
            
            <tr>
               <td>HIV</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data60"></td>
               <td><input class="form-control" name="igm60" type="number"></td>
               <td><input class="form-control" name="igg60" type="number"></td>
               <td><input class="form-control" name="pcr60" type="number"></td>
            </tr>
                        
            <tr>
               <td rowspan="3">Zika vírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data70"></td>
               <td><input class="form-control" name="igm70" type="number"></td>
               <td><input class="form-control" name="igg70" type="number"></td>
               <td><input class="form-control" name="pcr70" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data71"> </td>
               <td><input class="form-control" name="igm71" type="number"></td>
               <td><input class="form-control" name="igg71" type="number"></td>
               <td><input class="form-control" name="pcr71" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data72"></td>
               <td><input class="form-control" name="igm72" type="number"></td>
               <td><input class="form-control" name="igg72" type="number"></td>
               <td><input class="form-control" name="pcr72" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Chikungunya</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data80"></td>
               <td><input class="form-control" name="igm80" type="number"></td>
               <td><input class="form-control" name="igg80" type="number"></td>
               <td><input class="form-control" name="pcr80" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data81"> </td>
               <td><input class="form-control" name="igm81" type="number"></td>
               <td><input class="form-control" name="igg81" type="number"></td>
               <td><input class="form-control" name="pcr81" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data82"></td>
               <td><input class="form-control" name="igm82" type="number"></td>
               <td><input class="form-control" name="igg82" type="number"></td>
               <td><input class="form-control" name="pcr82" type="number"></td>
            </tr>
            
            <tr>
               <td rowspan="3">Dengue</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data90"></td>
               <td><input class="form-control" name="igm90" type="number"></td>
               <td><input class="form-control" name="igg90" type="number"></td>
               <td><input class="form-control" name="pcr90" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data91"> </td>
               <td><input class="form-control" name="igm91" type="number"></td>
               <td><input class="form-control" name="igg91" type="number"></td>
               <td><input class="form-control" name="pcr91" type="number"></td>
            </tr>
            <tr>
               <td>Urina</td>
               <td><input class="form-control" type="date" name="data92"></td>
               <td><input class="form-control" name="igm92" type="number"></td>
               <td><input class="form-control" name="igg92" type="number"></td>
               <td><input class="form-control" name="pcr92" type="number"></td>
            </tr>
            
         </tbody>
      </table>
         
      <button class="btn btn-success">Salvar</button>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(4, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();