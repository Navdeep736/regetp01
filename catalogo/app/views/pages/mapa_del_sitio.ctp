<div class="clear separador"></div>

<div class="grid_12">
    <div class="boxblanca boxdocs">
        <h1>Mapa del sitio</h1>

        <ol>
            <li><?php echo $html->link('Home', array('controller' => 'pages', 'action' => 'home')); ?></li>
            <li>El Instituto Nacional de Educaci�n T�cnica
                <ol>
                    <li><?php echo $html->link('Prop�sitos', array('controller' => 'pages', 'action' => 'propositos')); ?></li>
                    <li><?php echo $html->link('Ideas eje', array('controller' => 'pages', 'action' => 'ideaseje')); ?></li>
                    <li><?php echo $html->link('Entidades relacionadas', array('controller' => 'pages', 'action' => 'graficoinet')); ?></li>
                </ol>
            </li>
            
            <li>Las pol�ticas en Argentina para la educaci�n t�cnico profesional
                <ol>
                    <li><?php echo $html->link('Grafo de la ley', array('controller' => 'pages', 'action' => 'grafo_ley')); ?></li>
                </ol>
            </li>
            
            <li><?php echo $html->link('La educaci�n t�cnico profesional en cifras', array('controller' => 'pages', 'action' => 'mapas_y_graficos')); ?></li>
            
            <li><?php echo $html->link('Buscadores', array('controller' => 'pages', 'action' => 'buscadores')); ?>
                <ol>
                    <li><?php echo $html->link('Gu�a del Estudiante',array('controller'=>'titulos', 'action'=>'guiaDelEstudiante')); ?></li>
                    <li><?php echo $html->link('B�squeda de t�tulos y certificaciones',array('controller'=>'titulos', 'action'=>'search')); ?>
                        <ol>
                            <li><?php echo $html->link('Nivel Secundario T�cnico',array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Nivel Superior T�cnico', array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Formaci�n Profesional', array('controller'=>'titulos', 'action'=>'search', FP_ID)); ?></li>
                        </ol>
                    </li>
                    <li><?php echo $html->link('B�squeda por instituciones',array('controller'=>'instits', 'action'=>'search')); ?></li>
                </ol>
            </li>
            
            <li><?php echo $html->link('Documentaci�n', array('controller' => 'pages', 'action' => 'doc_index')); ?></li>
            <li><?php echo $html->link('Contacto', array('controller' => 'correos', 'action' => 'contacto')); ?></li>
        </ol>
    </div>
</div>