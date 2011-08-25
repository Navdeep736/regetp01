<div class="clear separador"></div>
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
        <h1>Estructura del Instituto Nacional de Educaci�n Tecnol�gica</h1>
        <div>
        <!--[if !IE]>-->
          <object data="../img/entidades.svg" type="image/svg+xml"
                  width="700" height="391" id="mySVGObject"> <!--<![endif]-->
        <!--[if lt IE 9]>
          <object src="../img/entidades.svg" classid="image/svg+xml"
                  width="700" height="391" id="mySVGObject"> <![endif]-->
        <!--[if gte IE 9]>
          <object data="../img/entidades.svg" type="image/svg+xml"
                  width="700" height="391" id="mySVGObject"> <![endif]-->
          </object>
        </div>
        <div id="descripcion"></div>
        <h1>Prop�sitos</h1>

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
        <h1>Ideas eje</h1>
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

  /* esto es un hack para que jquery me deje animar propiedades que no son de CSS */
  var $_fx_step_default = $.fx.step._default;
  $.fx.step._default = function (fx) {
    if (!fx.elem.customAnimate) return $_fx_step_default(fx);
    fx.elem[fx.prop] = fx.now;
    fx.elem.updated = true;
  };

  window.onsvgload = function(){
    /*ids de cada grupo del svg con su texto corresponidente*/
    var nodos = [
      {id:"g_ministerio", texto:""},
      {id:"g_consejo_educ", texto:"�mbito de concertaci�n, acuerdo y coordinaci�n de la pol�tica educativa nacional, presidido por el Ministro de Educaci�n e integrado por las autoridades educativas de las 24 jurisdicciones."},
      {id:"g_secretaria_educ", texto:""},
      {id:"g_secretaria_politicas", texto:""},
      {id:"g_inet", texto:""},
      {id:"g_consejo_etp", texto:"Consejo asesor del Ministerio de Educaci�n integrado por representantes de los Ministerios de Trabajo, Ciencia y Tecnolog�a, Econom�a, Producci�n, c�maras y asociaciones empresarias, sindicatos y gremios sectoriales y docentes, colegios profesionales de t�cnicos."},
      {id:"g_comision_etp", texto:"Espacio de trabajo conjunto con los equipos pol�tico-t�cnicos de las 24 jurisdicciones del pa�s."}
    ];


    var doc = document.getElementById('mySVGObject').contentDocument;
    var len = nodos.length;
    for(var i = 0; i<len ; i++){
      var nodo = doc.getElementById(nodos[i]["id"]);
      $(nodo).mouseenter(get_resizer(nodo, 1,1.2, nodos[i]["texto"]))
             .mouseleave(get_resizer(nodo, 1.2,1));
    }
    
    function get_resizer(nodo, scaleFrom, scaleTo, text){
      return function(){
        if(text){
          $("#descripcion").hide().text(text).fadeIn("fast");  
        }else{
          $("#descripcion").fadeOut();
        }
        
        var object = nodo
        /*este DIV se crea pero no se agrega al DOM, es solamente para tener algun
          lugar donde meter la propiedad a animar (scale)*/
        var tmpObj = $.extend($('<div>')[0], {
          scale: scaleFrom,
          customAnimate: true,
          updated: true
        });
        $(tmpObj).animate({"scale": scaleTo},{duration:500, 
          step:function (scale, fx) {
            var c = $(object).find("rect");
            var tx = parseFloat(c.attr("x")) + parseFloat(c.attr("width"))/2;
            tx = tx - tx*scale;
            var ty = parseFloat(c.attr("y")) + parseFloat(c.attr("height"))/2;
            ty = ty - ty*scale;
            /*el translate se hace porque el scale me mueve el centro del objeto*/
            var transform = "translate("+(tx).toString()+","+(ty).toString()+"), scale("+(scale).toString()+")";
            object.setAttribute("transform",transform);
          }
        });
      }
    }
  };
</script>