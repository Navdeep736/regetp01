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

<h2>Novedades de la versi�n 1.3</h2>

<p>
Desde su puesta en funcionamiento en junio del presente a�o el nuevo sistema RFIETP se encuentra en permanente actualizaci�n y mejora, tanto del
contenido de informaci�n de la base de datos como de la aplicaci�n que permite su gesti�n. En esa l�nea de trabajo a partir del 4 de Diciembre
se ha instalado la versi�n 1.3 del sistema.
</p>

<p>
A continuaci�n se ofrece un resumen de algunos de los cambios realizados desde su puesta en funcionamiento. 
El listado no es exhaustivo y se orienta principalmente a destacar las mejoras que pueden facilitar el uso 
del sistema desde la perspectiva de un usuario de consulta habitual.
</p>

<p>
Un listado completo de las modificaciones realizadas en esta �ltima versi�n, puede encontrarlas haciendo click <?php echo $html->link('aqu�','/pages/detalle_v1_2');?>.
</p>

<p>
<ul>


<li>
	<li>
		<b>Buscador</b> 
		<ul>
			<li>Se agreg� una opci�n de b�squeda por "nombre completo" que eval�a tipo y n�mero de establecimiento adem�s del nombre propio de la instituci�n. (Ahora se puede buscar, por ejemplo: "Escuela 3 San Mart�n".)</li>
		   	<li>Se agregaron opciones de b�squeda por oferta y por normativa.</li>
	    	<li>Se mejoraron las b�squedas por localidad y departamento.</li>
	    	<li>Se ordenaron las opciones de b�squeda en diferentes categor�as: "por su ubicaci�n", "por su nombre", "por su oferta" y "por otras caracter�sticas".</li>
	    	<li>Se modific� la b�squeda por CUE para que detecte CUEs por coincidencia parcial (Ej: Si se ingresa "118" el programa encuentra todos los CUEs que contengan "118" en cualquier posici�n).</li>
    		<li>Se agreg� la posibilidad de buscar CUE con Anexo. (Ej: "60011800")</li>
		</ul>
	</li>

	<br>

	<li>
		<b>Cuadros</b>
 		<ul>
 			<li>Se presenta a partir de esta versi�n una serie de cuadros estad�sticos relevantes. El primer cuadro publicado ofrece informaci�n sobre "Total de Instituciones de Educaci�n T�cnica Profesional por �mbito de gesti�n seg�n divisi�n pol�tico-territorial". El cuadro se construye din�micamente con la informaci�n m�s actual de la base de datos y est� preparado para su impresi�n.</li>
 		</ul>
	</li>
	
	<br>
	
	<li>
		<b>Datos de Instituci�n</b>
 		<ul>
 			<li>Se mejoraron y depuraron los siguientes datos de las instituciones: Tipo de Establecimiento, N�mero, Nombre, Departamento y Localidad.</li>
 			<li>Se agregaron dos categor�as nuevas para clasificar instituciones. Por el tipo de instituci�n un establecimiento puede ser clasificado como: "Superior", "Secundario", "Formaci�n Profesional" � "Con Itinerario Formativo". Por otro lado una instituci�n puede ser categorizada como "Instituci�n de ETP" � "Instituci�n con programa de ETP". Estas categorizaciones facilitan el procesamiento estad�stico que realiza la Unidad de Informaci�n. En breve se agregar� al aplicativo un glosario con las definiciones correspondientes.</li>
 		</ul>
	</li>
	
	<br>
	
	<li>
		<b>Oferta Educativa</b> 
		<ul>
			<li>Se incorpor� una nueva forma de visualizar el listado de ofertas. Se muestran inicialmente los datos correspondientes al a�o en curso, pero se puede luego navegar por datos hist�ricos y visualizar todos los a�os.</li>
			<li>Se mejor� la presentaci�n de informaci�n de oferta educativa: se incorpor� paginaci�n de resultados, y se agregaron opciones de filtro y ordenamiento del listado seg�n distintos criterios.</li>
			<li>Se agreg� un sistema de marcas para identificar como pendiente de actualizaci�n una instituci�n cuando la documentaci�n de la oferta educativa recibida est� incompleta. El sistema informa el motivo del pendiente, el estado del reclamo, etc. Esto permite al usuario conocer el estado de la informaci�n e identificar faltantes sin tener que recurrir necesariamente a la Unidad de Informaci�n.</li>
		</ul>
	</li>
	
	<br>

  	<li>
  		<b>Dise�o</b>
  		<ul type="circle">
    		<li>Se mejor� el dise�o de la barra de navegaci�n lateral y la distribuci�n de informaci�n en pantalla.</li>
  		</ul>
  	</li>
  	
  	<br>
  	
	<li>
		<b>Optimizaci�n</b>
		<ul>
			<li>Se mejor� la velocidad de respuesta del sistema en b�squedas y presentaci�n de informaci�n.</li>
		</ul>
	</li>
	   
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
Unidad de Informaci�n: Of. 311.
</p>