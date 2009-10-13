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
<h2>�Que novedades hay en la versi�n 1.2?</h2>

<p>
<ul>
	<li><b>Hist�rico de CUE:</b> B�squeda por CUE avanzada. Almacenamiento hist�rico de CUE para aquellas instituciones que lo hayan cambiado.</li>	
	<li><b>Buscador:</b> Se incorporaron m�s criterios de b�squeda y se reorden� el buscador.</li>
	<li><b>Ofertas: </b>Instituciones con planes pendientes de actualizaci�n.</li>
	<li><b>Optimizaci�n: </b>Mejoras en la velocidad de b�squeda y navegaci�n.</li>
	<li><b>Reestructuraci�n de la base de datos:</b> Mejores y m�s est�disticas.</li>
	<li><b>Datos de la Instituci�n:</b>Las institucioones ahora tienen normalizado: Tipo, n�mero y nombre de instituci�n, localidad y departamento.</li>
	<br>
	<ul><li><?php echo $html->link('ver listado completo de mejoras','/pages/detalle_v1_2');?></li></ul>
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
Unidad de Informaci�n, Of. 309.
</p>