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



<h1>Bienvenido al RFIETP</h1>

<?php
if (Configure::read() > 0):
	Debugger::checkSessionKey();
endif;
?>
<br />

<h2>Novedades de la versi�n 1.2</h2>

<p>
Desde su puesta en funcionamiento en junio del presente a�o el nuevo sistema RFIETP se 
encuentra en permanente actualizaci�n y mejoramiento, tanto respecto del 
contenido de informaci�n de la base de datos como de la aplicaci�n que permite 
su gesti�n. En esa l�nea de trabajo a partir del 20 de octubre se ha instalado 
la versi�n 1.2 del sistema.
<br>
<br>
A continuaci�n se ofrece un resumen de algunas de los cambios realizados desde su puesta en 
funcionamiento. El listado no es exhaustivo y se orienta principalmente a destacar las mejoras 
que pueden facilitar el uso del sistema desde la perspectiva de un usuario de consulta habitual.
<br>
<br>
Un listado completo de las modificaciones, m�s avanzado, se puede consultar siguiendo el link 
del final: <?php echo $html->link('Ver listado completo de mejoras','/pages/detalle_v1_2');?>
<ul>
<li><b>Buscador</b> 
	<ul>
		<li>Se incorporaron criterios de b�squeda y se ordenaron las opciones en diferentes categor�as: "por su Ubicaci�n", "por su Nombre", "por su Oferta" y "por Otras Caracter�sticas".</li>
		<li>Se modific� la b�squeda por CUE para que encuentre CUEs parciales (Ej: que contengan "118"), y CUEs con Anexo (Ej: "600118<b>00</b>").</li>
	</ul>
</li>
<br>
<li><b>Datos de Instituci�n</b>
 	<ul><li> Se corrigieron, depuraron y normalizaron los datos de todas las instituciones.</li></ul>
</li>
<br>
<li><b>Oferta</b> 
	<ul><li>Se agreg� funcionalidad a la p�gina de oferta permitiendo b�squedas y ordenamientos sobre el listado
			de las mismas.</li>
		<li>Se implement� la posibilidad de marcar como pendiente de actualizaci�n a una instituci�n cuando la documentaci�n de la oferta educativa recibida est� incompleta.</li>
	</ul>
</li>
<br>	
<li><b>Buscador Hist�rico de CUE</b>
	<ul>
	  <li>
	  Se agreg� la posibilidad de buscar CUEs que hayan pertenecido a una instituci�n.
	  </li>
	</ul>
</li> 
<br>
<li><b>Optimizaci�n</b>
	<ul><li> Se mejor� la velocidad de respuesta del sistema en las b�squedas y navegaci�n del sitio.</li></ul>
</li>
<br>
</ul>

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
Unidad de Informaci�n: Of. 309.
</p>