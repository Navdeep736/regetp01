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

<br />

<h2>Versi�n <?php echo Configure::read('regetpVersion');?></h2>

<p>Desde su puesta en funcionamiento en junio de 2009 el sistema RFIETP se encuentra en permanente actualizaci�n y mejoramiento, tanto del contenido de informaci�n de la base de datos como de la aplicaci�n que permite su gesti�n. En esa l�nea de trabajo a partir del 1 de Agosto de 2012 se ha instalado la versi�n  <?php echo Configure::read('regetpVersion');?> del sistema. Sus principales novedades son:</p>
<ul>
	<li>Se han publicado los Planes de Mejora del 4� Trimestre de 2011</li>
        <li>Se agregaron y optimizaron validaciones para la carga de Instituciones por parte de la Unidad de Informaci�n</li>
        <li>Se mejor� la lista de "Res�men de Planes de Estudio" asociados a cada T�tulo y se agreg� mayor detalle y accesibilidad para facilitar el trabajo de la Unidad de Informaci�n</li>
</ul>



Un listado completo de las modificaciones realizadas en esta �ltima versi�n, puede encontrarlas haciendo click
<? echo $html->link('aqu�','/pages/detalle_versiones')?>.
</p>

<br/>
<hr/>
<br/>

<?php echo $this->element('contacto'); ?>
