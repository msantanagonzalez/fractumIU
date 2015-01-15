<?php
    $userType="externo";
    require_once("../structure/header.php");
?>

<h1 id="headerExterno"><a>- INCIDENCIAS -</a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
    <tr>
        <th width="10%">ID</th>
        <th width="25%">T&iacute;tulo</th>
        <th width="25%">Operario</th>
        <th width="25%">Estado</th>
        <th width="15%"> </th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <table class="default"><!--TABLA-->
      <tr>
          <td width="10%">ID001</td>
          <td width="25%">Centrifugadora Verduras</td>
          <td width="25%">Juan Perez</td>
          <td width="25%">Abierta</td>
          <td width="15%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
      </tr>
      <tr>
          <td width="10%">ID002</td>
          <td width="25%">Cortadora Tomates</td>
          <td width="25%">Alfonso Martinez</td>
          <td width="25%">Abierta</td>
          <td width="15%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
      </tr>
    </table>
</div> 
<br>
<h1 id="headerExterno"><a>- MAQUINAS -</a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
    <tr>
        <th width="10%">ID</th>
        <th width="25%">Nombre</th>
        <th width="25%">Mantenimiento</th>
        <th width="25%">Ult. Incidencia</th>
        <th width="15%"> </th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <table class="default"><!--TABLA-->
        <tr>
            <td width="10%">MA001</th>
            <td width="25%">Centrifugadora Verduras</td>
            <td width="25%">No</td>
            <td width="25%">10/11/2013</td>
            <td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
        </tr>
        <tr>
            <td width="10%">MA002</th>
            <td width="25%">Cortadora Tomates</td>
            <td width="25%">Si</td>
            <td width="25%">14/11/2014</td>
            <td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
        </tr>
    </table>
</div>
             	  
<?php
    require_once("../structure/footer.php");
?>