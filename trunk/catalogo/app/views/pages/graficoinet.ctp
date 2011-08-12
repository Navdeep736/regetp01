<?
echo $javascript->link('jquery.tooltip.min');
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("map > area").tooltip({ positionRight: true });
   
        jQuery('#ministerio').mouseover(function() {
            //jQuery('#descripcion').html('');  caso de usar div
        });
    });
</script>
<div class="clear separador"></div>

<div class="grid_12">
    <div class="boxblanca boxdocs">
        <h1>Estructura del Instituto Nacional de Educaci�n Tecnol�gica</h1>
        <div>
            <?php echo $html->image('graficoinet.gif', array('usemap' => '#mapgrafico')) ?>
            <map name="mapgrafico">
                <area shape="rect" id="ministerio" alt="" title="" coords="2,53,250,114" />
                <area shape="rect" id="seced" alt="a" title="" coords="47,172,265,242" />
                <area shape="rect" id="secpol" alt="a" title="" coords="280,173,476,243" />
                <area shape="rect" id="consejo" alt="" title="�mbito de concertaci�n, acuerdo y coordinaci�n de la pol�tica educativa
                      nacional, presidido por el Ministro de Educaci�n e integrado por las autoridades
                      educativas de las 24 jurisdicciones." coords="347,54,698,118" />
                <area shape="rect" id="inet" alt="a" title="" coords="501,175,697,247" />
                <area shape="rect" id="consejonacedtrab" alt="" title="Consejo asesor del Ministerio de Educaci�n integrado por representantes de los
                      Ministerios de Trabajo, Ciencia y Tecnolog�a, Econom�a, Producci�n, c�maras y
                      asociaciones empresarias, sindicatos y gremios sectoriales y docentes, colegios
                      profesionales de t�cnicos." coords="74,304,271,378" />
                <area shape="rect" id="consejofedetp" alt="" title="Espacio de trabajo conjunto con los equipos pol�tico-t�cnicos de las
                      24 jurisdicciones del pa�s." coords="480,306,679,377" />
            </map>
        </div>
        <div id="descripcion"></div>
        <div class="clear"></div>
    </div>
</div>
