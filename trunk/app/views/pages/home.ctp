<!--[if IE 5]>

<h2 style="color: red">�� ATENCI�N !! La versi�n del Internet Explorer no es compatible con �sta web</h2>

<p style="border: red solid 1px; padding: 5px">
Estas usando una versi�n vieja del Internet Explorer y no te permitir� visualizar y utilizar normalmente �sta p�gina.
El Departamento de Sistemas recomienda usar Firefox para lograr una navegaci�n m�s r�pida y segura.<br />
<a href="http://download.mozilla.org/?product=firefox-3.0.8&os=win&lang=es-ES">Descargar Firefox</a><br /><br />

Requerimientos m�nimos para utilizar el <b>Sistema Gesti�n de Registro</b>:<br />
-: Internet Explorer 6 o superior<br />
-: Mozilla Firefox 2.0 o superior

</p>
<![endif]--> 



<h1>Bienvenido a la versi�n 1.2 del Registro Federal de Instituciones de ETP</h1>

<?php
if (Configure::read() > 0):
	Debugger::checkSessionKey();
endif;
?>
<br />

<?php echo $html->image('nuevo.gif',array('width'=> '39px','style'=>'float:left'));?>
<h2 style="color: #FE2E2E; padding-left: 55px;">Novedades de la nueva versi�n</h2>

<p>
<ul>
<li><b>Buscador</b> 
	<ul>
		<li>Se incorporaron criterios de b�squeda y se ordenaron las opciones en diferentes categor�as: "por su Ubicaci�n", "por su Nombre", "por su Oferta" y "por Otras Caracter�sticas".</li>
		<li>Se modific� la b�squeda por CUE para que encuentre CUEs parciales (Ej: que contengan "118"), y CUEs con Anexo (Ej: "600118<b>00</b>").</li>
	</ul>
</li>
<br>
<li><b>Datos de Intituci�n</b>
 	<ul><li> Se corrigieron, depuraron y normalizaron los datos de todas las instituciones.</li></ul>
</li>
<br>
<li><b>Oferta</b> 
	<ul><li>Se agreg� funcionalidad a la p�gina de oferta permitiendo b�squedas y ordenamientos sobre el listado
			de las mismas, y se implement� la posibilidad de marcar como pendiente de actualizaci�n a una instituci�n cuando la documentaci�n de la oferta educativa recibida est� incompleta. </li>
	</ul>
</li>
<br>	
<li><b>Buscador Hist�rico de CUE</b>
	<ul><li>Se agreg� la posibilidad de buscar CUEs que hayan pertenecido a una instituci�n.
	</li></ul>
</li> 
<br>
<li><b>Optimizaci�n</b>
	<ul><li> Se mejor� la velocidad de respuesta del sistema en las b�squedas y navegaci�n del sitio.</li></ul>
</li>
<br>
</ul>

<div><?php echo $html->link('ver listado completo de mejoras','/pages/detalle_v1_2');?></div>

<br>
<hr>
<br>

<p>
Para realizar consultas sobre el funcionamiento del programa � para 
notificar problemas t�cnicos: Int. 2010
</p>
<p>
Para realizar consultas sobre los contenidos de informaci�n del Registro 
de Instituciones: Int. 4032/4033.
</p>
<p>
Unidad de Informaci�n, Of. 309.
</p>