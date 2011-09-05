<div class="clear separador"></div>
<?php 
echo $javascript->link('animar_cuadros');
?>
<style type="text/css">
  #descripcion{
    background-color: lightgray;
    border: 2px solid gray;
    border-radius: 10px 10px 10px 10px;
    left: 600px;
    padding: 10px;
    position: absolute;
    top: 50px;
    width: 250px;
    display:none;
  }
</style>
<div class="grid_12">
    <div class="boxblanca boxdocs">
        <h1>El Instituto Nacional de Educaci�n Tecnol�gica</h1>
        
        <h3>Estructura</h3>
        <div>
        <!--[if !IE]>-->
          <object data="../img/entidades.svg" type="image/svg+xml"
                  width="100%" height="400" id="mySVGObject"> <!--<![endif]-->
        <!--[if lt IE 9]>
          <object src="../img/entidades.svg" classid="image/svg+xml"
                  width="700" height="391" id="mySVGObject"> <![endif]-->
        <!--[if gte IE 9]>
          <object data="../img/entidades.svg" type="image/svg+xml"
                  width="700" height="391" id="mySVGObject"> <![endif]-->
          </object>
        </div>
        <div id="descripcion"></div>
        
        El Registro Federal de Instituciones de Educaci�n T�cnico Profesional (RFIETP) es la instancia de inscripci�n de las instituciones que emiten t�tulos y certificados de Educaci�n T�cnica Profesional que presentan cada una de las jurisdicciones provinciales y universidades nacionales. El  RFIETP   contiene los  datos b�sicos de establecimiento (nombre de la instituci�n, direcci�n, localidad, departamento, tel�fono, director, entre otros), e informaci�n referida sus los planes de estudio (t�tulos, cantidad de horas taller en la semana, cantidad de matriculados, de secciones, entre otras);
Esta informaci�n resulta de insumo para:
        <ol>
            <li>Diagnosticar, planificar y llevar a cabo planes de mejora que se apliquen con prioridad a aquellas escuelas que demanden un mayor esfuerzo de reconstrucci�n y desarrollo</li>
            <li>Fortalecer a aquellas instituciones que se puedan preparar como centros de referencia en su especialidad t�cnica y </li>
            <li>Alcanzar en todas las instituciones incorporadas los criterios y par�metros de calidad de la educaci�n profesional acordados por el Consejo Federal de Cultura y Educaci�n (Ley  N� 26.058/2005, Capitulo IV, Art�culo N� 34). El Registro funciona entonces como insumo para la evaluaci�n de los programas de fortalecimiento institucional que presentan las instituciones educativas al INET en el marco de los planes de mejora continua de la calidad de la educaci�n t�cnico profesional del Fondo Nacional para la Educaci�n T�cnico Profesional</li>
        </ol>   
        
        <h3>Prop�sitos</h3>

        Los lineamientos, las estrategias y los programas llevados a cabo, a partir del trabajo 
        conjunto entre las veinticuatro jurisdicciones educativas del pa�s y el INET est�n 
        orientados a:
        <ol>
            <li>Fortalecer, en t�rminos de calidad y pertinencia, la educaci�n t�cnico profesional 
                para favorecer procesos de inclusi�n social y facilitar la incorporaci�n de la juventud al 
                mundo del trabajo y la formaci�n continua de los adultos a lo largo de su vida activa, y 
                responder a las nuevas exigencias y requerimientos derivados de la innovaci�n 
                tecnol�gica, el crecimiento econ�mico y la reactivaci�n de los sistemas productivos.</li>
            <li>Desarrollar un sistema integrado de educaci�n t�cnico-profesional que articule entre 
                s� los niveles de educaci�n secundaria y superior y �stos con las diversas instituciones y 
                programas de formaci�n y capacitaci�n para y en el trabajo, en el marco de los 
                requerimientos del desarrollo cient�fico, t�cnico y tecnol�gico, de calificaci�n, de 
                productividad y de empleo.</li>
            <li>
                Dar respuesta a la necesidad de otorgar a la educaci�n t�cnico profesional una 
                identidad como modalidad del sistema educativo, significar su car�cter estrat�gico en 
                t�rminos de desarrollo social y econ�mico, valorar su estatus social y educativo, 
                actualizar sus modelos institucionales y estrategias de intervenci�n aproxim�ndola a 
                est�ndares internacionales de calidad.
            </li>
        </ol>
        <h3>Ideas eje</h3>
        <ol>
            <li>Car�cter estrat�gico de la educaci�n t�cnico profesional para el desarrollo social
    y el crecimiento econ�mico.
            </li>
            <li>Vinculaci�n con los sectores de la ciencia y la tecnolog�a, el trabajo y la
    producci�n.
            </li>
            <li>Relevancia y pertinencia con necesidades sociales y productivas ? sectorial y
    territorial ?.
            </li>
            <li>Efectividad pol�tico-t�cnica de la acci�n conjunta con las jurisdicciones
    educativas, en el marco de los acuerdos federales.
            </li>
            <li>Integraci�n sist�mica y calidad de las instituciones y las trayectorias formativas.
            </li>
            <li>Inversi�n sostenida para la mejora continua de la educaci�n t�cnico profesional.
            </li>
        </ol>
    </div>
</div>

<script type="text/javascript">
  window.onsvgload = function(){
    /*texto temporal*/
    var lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas erat lacus, facilisis sed scelerisque dictum, accumsan eu nunc. Maecenas sed ligula sed quam luctus consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.";
    var nodos = [
      {id:"g_ministerio", texto:lorem},
      {id:"g_consejo_educ", texto:"�mbito de concertaci�n, acuerdo y coordinaci�n de la pol�tica educativa nacional, presidido por el Ministro de Educaci�n e integrado por las autoridades educativas de las 24 jurisdicciones."},
      {id:"g_secretaria_educ", texto:lorem},
      {id:"g_secretaria_politicas", texto:lorem},
      //{id:"g_inet", texto:lorem},
      {id:"g_consejo_etp", texto:"Consejo asesor del Ministerio de Educaci�n integrado por representantes de los Ministerios de Trabajo, Ciencia y Tecnolog�a, Econom�a, Producci�n, c�maras y asociaciones empresarias, sindicatos y gremios sectoriales y docentes, colegios profesionales de t�cnicos."},
      {id:"g_comision_etp", texto:"Espacio de trabajo conjunto con los equipos pol�tico-t�cnicos de las 24 jurisdicciones del pa�s."}
    ];

    animar_cuadros('mySVGObject', nodos, 'descripcion');
  };
</script>