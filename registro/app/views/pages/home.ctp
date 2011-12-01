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

<div style="color: #DF6300; font-weight: bolder; text-align: center">
    <p class="msg-fiesta">
    <?php echo $html->image('globos.png', array('style' => 'position: relative;  top: 15px')); ?>
        � Hemos alcanzado las <strong style="font-size: x-large ">4000</strong> intituciones ingresadas !
    <?php echo $html->image('globos.png', array('style' => 'position: relative;  top: 15px')); ?>
    </p>
</div>

<h1>Bienvenido al RFIETP</h1>

<br />

<h2>Versi�n <?php echo Configure::read('regetpVersion');?></h2>

<p>
Desde su puesta en funcionamiento en junio de 2009 el sistema RFIETP se encuentra
en permanente actualizaci�n y mejoramiento, tanto del contenido de informaci�n de
la base de datos como de la aplicaci�n que permite su gesti�n. En esa l�nea de
trabajo a partir del 2 de diciembre de 2011 se ha instalado la versi�n <?php echo Configure::read('regetpVersion');?> del
sistema. Sus principales novedades son:
</p>
    <ul>
        <li>Se publicaron los Planes de Mejora correspondientes al 3er trimestre del 2011.</li>
        <li>Se agreg� nueva l�gica en el registro de nuevos usuarios al sistema, con env�o autom�tico de email solicitando crear una contrase�a, brindando mayor seguridad al sistema y confiabilidad al usuario.</li>
        <li>Se modific� el alerta de "Oferta educativa desactualizada" para las instituciones, especificando el �ltimo ciclo en el cual su oferta fue actualizada.</li>
        <li>Se corrigi� el orden en que se muestra la Oferta educativa para Formaci�n Profesional y Superior.</li>
        <li>Se agreg� l�gica de validaci�n en la carga de Instituciones.</li>
    </ul>
<br />
<p>
Un listado completo de las modificaciones realizadas en esta �ltima versi�n, puede encontrarlas haciendo click
<? echo $html->link('aqu�','/pages/detalle_versiones')?>.
</p>

<br/>
<hr/>
<br/>

<?php echo $this->element('contacto'); ?>