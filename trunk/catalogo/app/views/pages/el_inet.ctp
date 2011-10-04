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
    <h1>El Instituto Nacional de Educaci�n Tecnol�gica</h1>
    <div class="boxblanca boxdocs">
            
        <h3>Estructura</h3>
        <div class="centrado">
                        
             <object data="<?php echo $html->url('/img/entidades.svg') ?>" type="image/svg+xml" width="700" height="400"
                  id="mySVGObject"> 
            </object>

          
        </div>
        <div id="descripcion"></div>
                
        <!--<h3>Prop�sitos</h3>

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
        </ol>-->
    </div>
</div>

<script type="text/javascript">
  window.onsvgload = function(){
    /*texto temporal*/
    var lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas erat lacus, facilisis sed scelerisque dictum, accumsan eu nunc. Maecenas sed ligula sed quam luctus consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.";
    var nodos = [
      {id:"g_ministerio", titulo: "Ministerio de Educaci�n", texto:lorem},
      {id:"g_consejo_educ", titulo: "Consejo Federal de Educaci�n", texto:"�mbito de concertaci�n, acuerdo y coordinaci�n de la pol�tica educativa nacional, presidido por el Ministro de Educaci�n Nacional e integrado por las autoridades educativas de las 23 provincias argentinas y de la Ciudad Aut�noma de Buenos Aires."},
      {id:"g_secretaria_educ", texto:lorem},
      {id:"g_secretaria_politicas", texto:lorem},
      //{id:"g_inet", texto:lorem},
      {id:"g_consejo_etp", titulo: "Consejo Nacional", texto:"Consejo asesor del Ministerio de Educaci�n Nacional integrado por representantes de los Ministerios de Trabajo, Ciencia y Tecnolog�a, Econom�a, Producci�n, c�maras y asociaciones empresarias, sindicatos y gremios sectoriales y docentes, colegios profesionales de t�cnicos."},
      {id:"g_comision_etp", titulo: "Comisi�n Federal", texto:"Espacio de trabajo conjunto con los equipos pol�tico-t�cnicos de las 23 provincias argentinas y de la Ciudad Aut�noma de Buenos Aires."}
    ];

    animar_cuadros('mySVGObject', nodos, 'descripcion');
  };
</script>
<script src="<?= $this->webroot ?>js/svg/svg.js" data-path="<?=$this->webroot.'js/svg/'?>" ></script>