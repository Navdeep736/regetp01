<div class="grid_12 columnas_centradas_X2">
    <div>
        <?php echo $html->link('Buscar Instituciones', array(
                                    'controller'=>'instits', 
                                    'action'=>'search'
                                    )
                                )?>
    </div>
    <div>
        <?php echo $html->link('Buscar T�tulos o Certificado', array(
                                    'controller'=>'titulos', 
                                    'action'=>'search'
                                    )
                                )?>
    </div>
</div>