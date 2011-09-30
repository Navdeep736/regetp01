<?php
    echo $html->css('documentacion', false);
?>
<h1 class="grid_12 no-print">Informaci&oacute;n Sectorial</h1>

<div id="menu1" class="grid_3 no-print">
    <div class="boxblanca">    
	    <ul>    
	        <li>
	            Sectores
	            <ul>
                        <li><?php echo $html->link('Aeron�utica', array('controller' => 'pages', 'action' => 'display', 'sectores/aeronautica'));?>                        </li>
                        <li>
                            <?php echo $html->link('Agropecuaria', array('controller' => 'pages', 'action' => 'display', 'sectores/agropecuaria'));?>
                            <ul>
                                <li><?php echo $html->link('Hort�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/horticola'));?></li>
                                <li><?php echo $html->link('Producci�n Lechera', array('controller' => 'pages', 'action' => 'display', 'sectores/produccion_lechera'));?></li>
                            </ul>
                        </li>
	                <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'sectores/automotriz'));?></li>
                        <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'sectores/construcciones'));?></li>
	                <li><?php echo $html->link('Energ�a El�ctrica', array('controller' => 'pages', 'action' => 'display', 'sectores/energia_electrica'));?></li>
	                <li><?php echo $html->link('Est�tica Profesional', array('controller' => 'pages', 'action' => 'display', 'sectores/estetica_profesional'));?></li>
                        <li><?php echo $html->link('Hoteler�a y Gastronom�a', array('controller' => 'pages', 'action' => 'display', 'sectores/hoteleria_y_gastronomia'));?></li>
	                <li><?php echo $html->link('Inform�tica', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?></li>
	                <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
	                <li><?php echo $html->link('Metalmec�nica', array('controller' => 'pages', 'action' => 'display', 'sectores/metalmecanica'));?></li>
	                <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'sectores/telecomunicaciones'));?></li>
                        <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'sectores/textil_indumentaria'));?></li>
	            </ul>
	        </li>
	    </ul>
    </div>
</div>

