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

<h2>Versi�n 1.4</h2>

<ul>
    <li><b>Orientaci�n de la Instituci�n</b></li>
    <ul type="circle">
        <li>Se agreg� una "Orientaci�n" a cada Instituci�n ingresada.</li>
        <li>Se migr� informaci�n de los excel de la Unidad de Informaci�n</li>
    </ul>

    <li><b>T�tulos de Referencia</b></li>
    <ul type="circle">
        <li>Se agrego la posibilidad de agregar T�tulos de Referencia a los planes.</li>
        <li>Se migr� informaci�n de los excel de la Unidad de Informaci�n</li>
    </ul>

    <li><b>Cambios generales</b></li>
    <ul type="circle">
        <li>Se proporcion� una interfaz web de depuraci�n, para que el personal especializado defina los nuevos valores y asi poder visualizar esta nueva informaci�n lo antes posible.</li>
        <li>Se realizaron informes estad�sticos.</li>
    </ul>
</ul>

<br>

<p>
Un listado completo de las modificaciones realizadas en esta �ltima versi�n, puede encontrarlas haciendo click <?php echo $html->link('aqu�','/pages/detalle_v1_2');?>.
</p>

	 
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
Unidad de Informaci�n: Of. 311.
</p>