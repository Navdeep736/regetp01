<ul>
            
        <li><?php echo $html->link('Introducci�n', array('controller' => 'pages', 'action' => 'display', 'introduccion'));?></li>
        
        <li>
            Informaci&oacute;n sectorial
            <ul>
                <li><?php echo $html->link('Familias profesionales', array('controller' => 'pages', 'action' => 'display', 'familias'));?></li>
                <li>
                    <?php echo $html->link('Foros sectoriales', array('controller' => 'pages', 'action' => 'display', 'foros'));?>

                </li>
                <li><?php echo $html->link('Entidades participantes', array('controller' => 'pages', 'action' => 'display', 'entidades'));?></li>
            </ul>
        </li>

        <li>
            <?php echo $html->link('Procesos de homologaci�n', array('controller' => 'pages', 'action' => 'display', 'homologacion'));?>
        <li>
            <?php echo $html->link('Marcos de referencia', array('controller' => 'pages', 'action' => 'display', 'marcos'));?>
        
        <li>
            Niveles y Modalidades
            <ul>
                <li>
                   <?php echo $html->link('Educaci�n T�cnica de Nivel Medio y Superior', array('controller' => 'pages', 'action' => 'display', 'mediaysuperior'));?>
                </li>
                <li>
                   <?php echo $html->link('Formaci�n Profesional', array('controller' => 'pages', 'action' => 'display', 'fp'));?>
                </li>
            </ul>
        </li>
        
        <li>
            <?php echo $html->link('Normativa de referencia', array('controller' => 'pages', 'action' => 'display', 'normativa'));?>
        </li>
        
    </ul>