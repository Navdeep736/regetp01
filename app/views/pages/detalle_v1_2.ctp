
<?php echo $html->image('nuevo.gif',array('width'=> '39px','style'=>'float:left'));?>
<h1 style='padding-left: 55px;'>�Que hay de nuevo en la versi�n 1.2?</h1>

<br>
<ul type="disk">
  <li>
    <b>Buscador</b>
  </li>
  <ul type="circle">
    <li> - Se modific� la b�squeda por CUE para que encuentre CUEs parciales. Ej: 2000, 64255, 118.</li>
	<li> - Se agreg� la posibilidad de buscar CUE con Anexo. Ej: 600118<b>00</b></li>
	<li> - Se ordenaron las opciones de b�squeda en diferentes categor�as: "por su Ubicaci�n", "por su Nombre", "por su Oferta" y "por Otras Caracter�sticas".</li>
    <li> - Se agreg� opci�n de b�squeda por Oferta.</li>
    <li> - Se agreg� opci�n de b�squeda por Normativa.</li>
    <li> - Se normalizaron las b�squedas por localidad y departamento.</li>
	<li> - Se agreg� selector de p�ginas.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Instituciones</b>
  </li>
  <ul type="circle">
	<li> - Se agreg� la posibilidad de asignar un CUE hist�rico a la instituci�n.</li>
	<li> - Se agreg� la funcionalidad para que cuando el CUE es modificado el sistema conserve como hist�rico el CUE anterior.</li>
	<li> - Al momento de dar de alta una instituci�n se modific� para que la opci�n "estatal" no se encuentre seleccionada por defecto.</li>
	<li> - Al momento de dar de alta o de modificar una instituci�n se agreg� una b�squeda de datos "similares" con el objetivo de poder visualizar antes de la carga si la instituci�n 
	       no fue ingresada anteriormente. </li>
  </ul>
  
  <br>
  
  <li>
    <b>Datos de Instituciones</b>
  </li>
  <ul type="circle">
    <li> - Se dividi� el atributo "Nombre" en 3 partes: "Tipo de Establecimiento", "N�mero de Instituci�n" y "Nombre", permitiendo una mejor 
           clasificaci�n al momento de las estad�sticas.</li>
	<li> - Se modific� el atributo "Tipo de Instituci�n" por "Tipo de Establecimiento".</li>
	<li> - Se normalizaron y depuraron los datos de Jurisdicci�n, departamento y Localidad.</li>

	<li> - Se agregaron los atributos "tel�fono alternativo" y "mail alternativo" tanto para la instituci�n como para el director.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Oferta Educativa</b>
  </li>
  <ul type="circle">
    <li> - Se agreg� la posibilidad de Ordenar el listado de Ofertas que posee la instituci�n.</li>
	<li> - Se agreg� la paginaci�n al listado de ofertas.</li>
	<li> - Se agregaron opciones de b�squeda al listado de ofertas.</li>	
	<li> - Se agreg� la posibilidad de marcar como pendiente de actualizaci�n a una instituci�n cuando la documentaci�n de la oferta educativa recibida est� incompleta.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Buscador Hist�rico de CUE</b>
  </li>
  <ul type="circle">
    <li> - Se agreg� la posibilidad de buscar CUEs que hayan pertenecido a una instituci�n.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Pendiente de Actualizaci�n</b>
  </li>
  <ul type="circle">
    <li> - Se agreg� un listado de Instituciones que presentan una oferta educativa pendiente de actualizaci�n, dividido por provincia.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Informes</b>
  </li>  
  <ul type="circle">
    <li> - Nuevo Informe sobre cantidad de Instituciones ingresadas, no ingresadas por �mbito de gesti�n y tipo de Establecimiento seg�n jurisdicci�n.</li>
	<li> - Listado de instituciones discriminadas por su oferta.</li>
	<li> - Nuevo Informe sobre Certificados y T�tulos separados por su oferta (FP, Itinerarios, Secundario T�cnico y Superior T�cnico).</li>
	<li> - Informe sobre Planes y T�tulos por jurisdicci�n.</li>
    <li> - Nuevo Informe sobre planes/t�tulos con la �ltima informaci�n registrada para cada establecimiento.</li>
    <li> - Promedio de duraci�n en horas del plan con oferta Formaci�n Profesional, por tipo de establecimiento.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Optimizaci�n</b>
  </li>
  <ul type="circle">
    <li> - Se mejor� la velocidad de respuesta del sistema en las b�squedas y navegaci�n del sitio.</li>
  </ul>
</ul>