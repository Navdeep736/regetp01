<?php
    //debug($this);
    $this->pageTitle = 'Familias Profesionales';
?>

<?php echo $this->element('menu_docs')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Familias profesionales</h2>
        <p style="color: red">Presentaci&oacute;n [Pablo]</p>
        
        <h3>Listado de familias  </h3>
        <p class="warning">Haciendo click en el nombre de la familia se podr� descargar un cuadro con informaci�n ampliada.</p>
        <ul>
            <li><?php echo $html->link('Energ�a El�ctrica', '/files/pdfs/info_sectorial/ee.doc'); ?></li>
            <li><?php echo $html->link('Est�tica Profesional', '/files/pdfs/info_sectorial/estetica_prof.doc'); ?></li>
            <li><?php echo $html->link('Inform�tica', '/files/pdfs/Marcos de Referencia/Secundario T�cnico/15-07-anexo16 Inform�tica.pdf'); ?></li>
            <li><?php echo $html->link('Madera y Mueble', '/files/pdfs/info_sectorial/madera_y_mueble.doc'); ?></li>
            <li><?php echo $html->link('Mec�nica Automotriz', '/files/pdfs/info_sectorial/mecanica_aut.doc'); ?></li>
            <li><?php echo $html->link('Metalmec�nica', '/files/pdfs/info_sectorial/metalmecanica.doc'); ?></li>
            <li><?php echo $html->link('Textil', '/files/pdfs/info_sectorial/textil.doc'); ?></li>
        </ul>
        
        <h3>M&aacute;s informaci&oacute;n</h3>
        <p style="color:red">Normativa que aprueba familias profesionales [Pablo, a aprobar en breve]</p>
        <p>&nbsp;</p>
    </div>
</div>

