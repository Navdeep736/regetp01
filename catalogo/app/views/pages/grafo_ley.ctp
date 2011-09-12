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
    <h1>Las pol�ticas para la Educaci�n T�cnico Profesional en Argentina</h1>
    <div class="boxblanca boxdocs">
        <h3>Ley de Educaci�n T�cnico Profesional</h3>
        <div class="centrado">
        <!--[if !IE]>-->
          <object data="../img/grafo.svg" type="image/svg+xml"
                 width="687" height="502" id="mySVGObject"> <!--<![endif]-->
        <!--[if lt IE 9]>
          <object src="../img/grafo.svg" classid="image/svg+xml"
                   id="mySVGObject"> <![endif]-->
        <!--[if gte IE 9]>
          <object data="../img/grafo.svg" type="image/svg+xml"
                   id="mySVGObject"> <![endif]-->
          </object>
        </div>
        <div id="descripcion"></div>

    </div>
</div>

<script type="text/javascript">
  window.onsvgload = function(){
  	/*texto temporal*/
  	var lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas erat lacus, facilisis sed scelerisque dictum, accumsan eu nunc. Maecenas sed ligula sed quam luctus consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.";
    /*ids de cada grupo del svg con su texto corresponidente*/
    var nodos = [
      {id:"g_bases", titulo: "Bases de Datos de Institucionales de ETP", texto:lorem},
      {id:"g_homologacion", titulo: "Proceso de Homologaci�n", texto:lorem},
      {id:"g_registro", titulo:"Registro Federal de Instituciones de Educaci�n T�cnico Profesional", texto:"El Registro Federal de Instituciones de Educaci�n T�cnico Profesional (RFIETP) es la instancia de inscripci�n de las instituciones que emiten t�tulos y certificados de Educaci�n T�cnica Profesional que presentan cada una de las jurisdicciones provinciales y universidades nacionales. El  RFIETP   contiene los  datos b�sicos de establecimiento (nombre de la instituci�n, direcci�n, localidad, departamento, tel�fono, director, entre otros), e informaci�n referida sus los planes de estudio (t�tulos, cantidad de horas taller en la semana, cantidad de matriculados, de secciones, entre otras); Esta informaci�n resulta de insumo para:        <ol>            <li>Diagnosticar, planificar y llevar a cabo planes de mejora que se apliquen con prioridad a aquellas escuelas que demanden un mayor esfuerzo de reconstrucci�n y desarrollo</li><li>Fortalecer a aquellas instituciones que se puedan preparar como centros de referencia en su especialidad t�cnica y </li><li>Alcanzar en todas las instituciones incorporadas los criterios y par�metros de calidad de la educaci�n profesional acordados por el Consejo Federal de Cultura y Educaci�n (Ley  N� 26.058/2005, Capitulo IV, Art�culo N� 34). El Registro funciona entonces como insumo para la evaluaci�n de los programas de fortalecimiento institucional que presentan las instituciones educativas al INET en el marco de los planes de mejora continua de la calidad de la educaci�n t�cnico profesional del Fondo Nacional para la Educaci�n T�cnico Profesional</li></ol>"},
      {id:"g_catalogo", titulo: "Cat�logo Nacional", texto:lorem},
      {id:"g_fortalecimiento", titulo: "Fortalecimiento de la Gesti�n", texto:lorem},
      {id:"g_plan_de_mejoras", titulo: "Plan de Mejoras", texto:lorem},
      {id:"g_evaluacion", titulo: "Evaluaci�n", titulo: "Evaluaci�n", texto:lorem},
      {id:"g_estudios", titulo: "Estudios e Investigaciones", texto:lorem},
      {id:"g_fondo", titulo: "Fondo Nacional", texto:lorem}
    ];

    animar_cuadros('mySVGObject', nodos, 'descripcion');
  };
</script>