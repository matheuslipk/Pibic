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
   <p>Atenção!!! Preencher os resultados conforme a legenda: <br>
   [1] Reagente/Positivo [2] Não reagente/Negativo [3] Inconclusivo [4] Não realizado
   </p>
   <form method="post" action="/controll/exameEtiologico/inserirExamesEtiologicos.php">
      
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="1" style="display: none">
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
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="2" style="display: none">
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
               <td rowspan="3">Citomegalovírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="3" style="display: none">
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
               <td rowspan="3">Herpes vírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="4" style="display: none">
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
               <td rowspan="3">Parvovírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="5" style="display: none">
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
               <td rowspan="3">Toxoplasmose</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="6" style="display: none">
         <tbody>          
            <tr>
               <td>Agente</td>
               <td>Amostra</td>
               <td>Data coleta</td>
               <td>Resultado</td>
               <td>Titulação</td>
               <td>Treponêmico</td>
            </tr>
            <tr>
               <td rowspan="3">Sífilis</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="7" style="display: none">
         <tbody> 
            <tr>
               <td>Agente</td>
               <td>Amostra</td>
               <td>Data coleta</td>
               <td>Teste rápido</td>
               <td>Sorologia</td>
               <td>WB</td>
            </tr>
            <tr>
               <td>HIV</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="8" style="display: none">
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
               <td rowspan="3">Zika vírus</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
   
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="9" style="display: none">
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
               <td rowspan="3">Chikungunya</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
            
   <form>
      <table class="table table-condensed">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <input name="idAgente" value="10" style="display: none">
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
               <td rowspan="3">Dengue</td>
               <td>Soro do RN</td>
               <td><input class="form-control" type="date" name="data00"></td>
               <td><input class="form-control" name="igm00" type="number"></td>
               <td><input class="form-control" name="igg00" type="number"></td>
               <td><input class="form-control" name="pcr00" type="number"></td>
            </tr>
            <tr>
               <td>Líquor</td>
               <td><input class="form-control" type="date" name="data01"></td>
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
            <tr><td colspan="6"><input class="btn btn-success" type="submit" value="Salvar"></td></tr>
         </tbody>
      </table>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(4, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();