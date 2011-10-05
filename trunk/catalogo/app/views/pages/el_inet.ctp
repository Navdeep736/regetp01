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
      {id:"g_ministerio", titulo: "Ministerio de Educaci�n", link:"http://www.me.gov.ar/"},
      {id:"g_consejo_educ", titulo: "Consejo Federal de Educaci�n", texto:"�mbito de concertaci�n, acuerdo y coordinaci�n de la pol�tica educativa nacional, presidido por el Ministro de Educaci�n Nacional e integrado por las autoridades educativas de las 23 provincias argentinas y de la Ciudad Aut�noma de Buenos Aires.<br/><p>Para obtener m�s informaci�n <a target='_blank' href='http://portal.educacion.gov.ar/consejo/2009/12/04/el-consejo/'>haga click aqu�</a></p>"},
      //{id:"g_secretaria_educ___"},
      //{id:"g_secretaria_politicas___"},
      {id:"g_inet", link:"http://www.inet.edu.ar/"},
      {id:"g_consejo_etp", titulo: "Consejo Nacional de Educaci�n Trabajo y Producci�n (CONETyP)", texto:"Este Consejo, cuya Secretar�a Permanente lleva la Direcci�n Ejecutiva del INET, tiene como funci�n asesorar al Ministro de Educaci�n en todos los aspectos que tiendan a la vinculaci�n de la educaci�n con el mundo del trabajo, de la producci�n, de la ciencia y la tecnolog�a.<BR /> En el marco de dicho Consejo se desarrollan foros sectoriales, constituidos por referentes clave de cada sector, a partir de los cuales se elaboran las propuestas espec�ficas de formaci�n y capacitaci�n.<BR />Para asegurar su representatividad, el CONETyP se conforma con representantes de los Ministerios de Educaci�n, de Trabajo y de Producci�n, de Ciencia y Tecnolog�a, del Consejo Federal de Educaci�n, de las c�maras empresarias - en particular de la peque�a y mediana empresa -, de las organizaciones de los trabajadores, incluidas las entidades gremiales docentes, las entidades profesionales de t�cnicos, y de entidades empleadoras que brindan educaci�n t�cnico profesional de gesti�n privada."},
      {id:"g_comision_etp", titulo: "Comisi�n Federal de Educaci�n T�cnico Profesional",texto: "Esta Comisi�n creada por Ley de Educaci�n T�cnico Profesional N� 26058, art. 49 y 50 tiene como prop�sito principal garantizar los circuitos de consulta t�cnica para la formulaci�n y seguimiento de los programas federales orientados a la aplicaci�n de dicha Ley en el marco de los acuerdos del Consejo Federal de Educaci�n, como organismo de concertaci�n de la pol�tica educativa nacional.<br/>La Comisi�n Federal de Educaci�n T�cnico Profesional est� integrada por los representantes de las provincias y del Gobierno de la Ciudad Aut�noma de Buenos Aires, designados por las m�ximas autoridades jurisdiccionales respectivas y su actividad est� coordinada por la Direcci�n Ejecutiva del INET."}
    ];

    animar_cuadros('mySVGObject', nodos, 'descripcion');
  };
</script>
<script src="<?= $this->webroot ?>js/svg/svg.js" data-path="<?=$this->webroot.'js/svg/'?>" ></script>