<h1>RFIETP - Novedades de la versi�n 1.4</h1>

<br>
<ul>
    <li><b>Orientaci�n de la Instituci�n</b></li>
    <ul type="circle">
        <li>Se agreg� una "Orientaci�n" a cada Instituci�n ingresada.</li>
        <li>Las Orientaciones posibles son: Agropecuaria, Industrial u Otra.</li>
        <li>Se migr� informaci�n de los excel de la Unidad de Informaci�n</li>
    </ul>
    <br>
    <li><b>T�tulos de Referencia</b></li>
    <ul type="circle">
        <li>Se agreg� la posibilidad de agregar T�tulos de Referencia a los planes.</li>
        <li>Se migr� informaci�n de los excel de la Unidad de Informaci�n</li>
    </ul>
    <br>
    <li><b>Cambios Generales</b></li>
    <ul type="circle">
        <li>Se proporcion� una interfaz web de depuraci�n, para que el personal especializado defina los nuevos valores y asi poder visualizar esta nueva informaci�n lo antes posible.</li>
        <li>Se realizaron informes estad�sticos.</li>
        <li>Se modificaron las vistas de Instituciones y Planes.</li>
        <li>Se incorporaron �stos nuevos campos como criterios de b�squeda en el buscador. (esto solo es v�lido para los usuarios de la Unidad de Informaci�n hasta tanto no se haya cargado toda la informaci�n correspondiente a las orientaciones y a los t�tulos de referencia)</li>
    </ul>
</ul>

<h1>RFIETP - Novedades de la versi�n 1.3</h1>

<br>

<ul>

	<li>
    <b>Dise�o</b>
  </li>
  <ul type="circle">
    <li>Se modific� el encabezado.</li>
    <li>Se modific� el men� de navegaci�n.</li>
    <li>Se agregaron solapas para la navegaci�n de los datos hist�ricos de la matr�cula en el listado de ofertas de la instituci�n.</li>
  </ul>
  
   <br>


  <li>
    <b>Buscador</b>
  </li>
  <ul type="circle">
    <li>Se agreg� una opci�n de b�squeda por "nombre completo" que eval�a tipo y n�mero de establecimiento adem�s del nombre propio de la instituci�n. (Ahora se puede buscar, por ejemplo: "Escuela 3 San Mart�n".)
	</li>
  </ul>
  
  
   <li>
    <b>Cuadros</b>
  </li>
  <ul type="circle">
    <li>Se presenta a partir de esta versi�n una serie de cuadros estad�sticos relevantes. El primer cuadro publicado ofrece informaci�n sobre "Total de Instituciones de Educaci�n T�cnica Profesional por �mbito de gesti�n seg�n divisi�n pol�tico-territorial". El cuadro se construye din�micamente con la informaci�n m�s actual de la base de datos y est� preparado para su impresi�n.
	</li>
  </ul>
  
  
   <br>
  
  <li>
    <b>Instituciones</b>
  </li>
 	<ul type="circle">
    	<li>Se agregaron dos categor�as nuevas para clasificar instituciones. Por el tipo de instituci�n un establecimiento puede ser clasificado como: "Superior", "Secundario", "Formaci�n Profesional" � "Con Itinerario Formativo". Por otro lado una instituci�n puede ser categorizada como "Instituci�n de ETP" � "Instituci�n con programa de ETP". Estas categorizaciones facilitan el procesamiento estad�stico que realiza la Unidad de Informaci�n. En breve se agregar� al aplicativo un glosario con las definiciones correspondientes.
		</li>
  	</ul>
  	
  
  <br>
  
  <li>
    <b>Oferta Educativa</b>
  </li>
 	<ul type="circle">
    <li>Se incorpor� una nueva forma de visualizar el listado de ofertas. Se muestran inicialmente los datos correspondientes al a�o en curso, pero se puede luego navegar por datos hist�ricos y visualizar todos los a�os.</li>
  	</ul>
  	
  	<br />  
  
  
	<li>
    <b>Optimizaci�n</b>
  </li>
  <ul type="circle">
    <li>Se implement� Cach�  en las p�ginas clave del sistema para obtener un mejor rendimiento y velocidad de respuesta del servidor.</li>
  </ul>
  
   <br>
   
   
   <li>
    <b>Varios</b>
  </li>
  <ul type="circle">
    <li>Se desarroll� un nuevo m�dulo para realizar una revisi�n y reclasificaci�n del trabajo ya realizado en la primera etapa de depuraci�n de la informaci�n de "sectores" de t�tulos y certificados.</li>
    <li>Se elaboraron scripts para imputar autom�ticamente valores en los nuevos campos creados para las categor�as "Relaci�n con ETP" y "Tipo de instituci�n".</li>
    <li>Se desarroll� un depurador para verificaci�n de Relaci�n con ETP y Clase de instituci�n.</li>
    <li>Se realizaron pruebas de acceso al sistema a trav�s de Internet.</li>
  </ul>
   
   
  
  <br><br>
  
  
  

<h1>RFIETP - Novedades de la versi�n 1.2</h1>

<br>
<ul >
  <li>
    <b>Buscador</b>
  </li>
  <ul type="circle">
    <li> Se modific� la b�squeda por CUE para que encuentre CUEs parciales. Ej: 2000, 64255, 118.</li>
	<li> Se agreg� la posibilidad de buscar CUE con Anexo. Ej: 600118<b>00</b></li>
	<li> Se ordenaron las opciones de b�squeda en diferentes categor�as: "por su Ubicaci�n", "por su Nombre", "por su Oferta" y "por Otras Caracter�sticas".</li>
    <li> Se agreg� opci�n de b�squeda por Oferta.</li>
    <li> Se agreg� opci�n de b�squeda por Normativa.</li>
    <li> Se normalizaron las b�squedas por localidad y departamento.</li>
	<li> Se agreg� selector de p�ginas.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Instituciones</b>
  </li>
  <ul type="circle">
	<li> Se agreg� la posibilidad de asignar un CUE hist�rico a la instituci�n.</li>
	<li> Se agreg� la funcionalidad para que cuando el CUE es modificado el sistema conserve como hist�rico el CUE anterior.</li>
	<li> Al momento de dar de alta una instituci�n se modific� para que la opci�n "estatal" no se encuentre seleccionada por defecto.</li>
	<li> Al momento de dar de alta o de modificar una instituci�n se agreg� una b�squeda de datos "similares" con el objetivo de poder visualizar antes de la carga si la instituci�n 
	       no fue ingresada anteriormente. </li>
  </ul>
  
  <br>
  
  <li>
    <b>Datos de Instituciones</b>
  </li>
  <ul type="circle">
    <li> Se dividi� el atributo "Nombre" en 3 partes: "Tipo de Establecimiento", "N�mero de Instituci�n" y "Nombre", permitiendo una mejor 
           clasificaci�n al momento de las estad�sticas.</li>
	<li> Se modific� el atributo "Tipo de Instituci�n" por "Tipo de Establecimiento".</li>
	<li> Se normalizaron y depuraron los datos de Jurisdicci�n, departamento y Localidad.</li>
	<li> Se agregaron los atributos "tel�fono alternativo" y "mail alternativo" para la instituci�n.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Oferta Educativa</b>
  </li>
  <ul type="circle">
    <li> Se agreg� la posibilidad de Ordenar el listado de Ofertas que posee la instituci�n.</li>
	<li> Se agreg� la paginaci�n al listado de ofertas.</li>
	<li> Se agregaron opciones de b�squeda al listado de ofertas.</li>	
	<li> Se agreg� la posibilidad de marcar como pendiente de actualizaci�n a una instituci�n cuando la documentaci�n de la oferta educativa recibida est� incompleta.</li>
  </ul>  
  <br>
  
  <li>
    <b>Buscador Hist�rico de CUE</b>
  </li>
  <ul type="circle">
    <li> Se agreg� la posibilidad de buscar CUEs que hayan pertenecido a una instituci�n.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Pendiente de Actualizaci�n</b>
  </li>
  <ul type="circle">
    <li> Se agreg� un listado de Instituciones que presentan una oferta educativa pendiente de actualizaci�n, dividido por provincia.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Informes</b>
  </li>  
  <ul type="circle">
    <li> Nuevo Informe sobre cantidad de Instituciones ingresadas, no ingresadas por �mbito de gesti�n y tipo de Establecimiento seg�n jurisdicci�n.</li>
	<li> Listado de instituciones discriminadas por su oferta.</li>
	<li> Nuevo Informe sobre Certificados y T�tulos separados por su oferta (FP, Itinerarios, Secundario T�cnico y Superior T�cnico).</li>
	<li> Informe sobre Planes y T�tulos por jurisdicci�n.</li>
    <li> Nuevo Informe sobre planes/t�tulos con la �ltima informaci�n registrada para cada establecimiento.</li>
    <li> Promedio de duraci�n en horas del plan con oferta Formaci�n Profesional, por tipo de establecimiento.</li>
  </ul>
  
  <br>
  
  <li>
    <b>Optimizaci�n</b>
  </li>
  <ul type="circle">
    <li> Se mejor� la velocidad de respuesta del sistema en las b�squedas y navegaci�n del sitio.</li>
  </ul>
</ul>