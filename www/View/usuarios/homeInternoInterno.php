<?php
    $userType="interno";
    require_once("../structure/header.php");
?>
<h1 id="headerInterno"><a>- INCIDENCIAS -</a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
    <tr>
        <th width="20%">ID</th>
        <th width="20%">Maquina</th>
        <th width="20%">Apertura</th>
        <th width="20%">Estado</th>
        <th width="10%"> </th>
        <th width="10%"> </th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <table class="default"><!--TABLA-->
        <tr>
            <td width="20%">ID001</td>
            <td width="20%"><a href="consultarMaquina.html">Centrifugadora de lechuga</a></td>
            <td width="20%">Marco Santana</td>
            <td width="20%">Abierta</td>
            <td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
            <td width="10%"><button>Derivar</button></td>
        </tr>
        <tr>
            <td width="20%">ID002</td>
            <td width="20%"><a href="consultarMaquina.html">Impresor 3D</a></td>
            <td width="20%">Antonio Gonz&aacute;lez</td>
            <td width="20%">Pendiente de cierre</td>
            <td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
            <td width="10%"><button>Cerrar</button></td>
        </tr>
        <tr>
            <td width="20%">ID003</td>
            <td width="20%"><a href="consultarMaquina.html">Ensamblador</a></td>
            <td width="20%">Antonio Gonz&aacute;lez</td>
            <td width="20%">Derivada</td>
            <td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
            <td width="10%"><button>Cerrar</button></td>
        </tr>
    </table>
</div> 
<br>
<h1 id="headerInterno"><a><i>M&Aacute;QUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Servicio</th>
       	<th width="20%">&Uacute;lt. incidencia</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php 
			if(isset($_SESSION['listaMaquina']))
			$rows = $_SESSION['listaMaquina'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				| INFO |- No hay maquinas para listar 
				</div>
			<?php
			}
			else{
				foreach ($rows as $row) {
				?>
				<tr> 
					<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td> 
					<td width="20%">Sí</td> 
					<td width="20%">13/09/2014</td> 
					<td width="10%"><button><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">Consultar</a></button></td>
				</tr>
				<?php 
				} 
			}
		?>
	</table>
</form>
                    
<?php
    require_once("../structure/footer.php");
?>