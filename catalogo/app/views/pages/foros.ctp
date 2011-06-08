<br />

<?php echo $this->element('menu_docs')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Foros sectoriales</h2>
        <p>Descripci&oacute;n, Mecanismos de funcionamiento [Pablo]</p>
        
        <p><?echo $html->link('Ver metodolog�a','/pages/foros_metodologia');?></p>
        
        <h3>Foros</h3>
        
        <?php 
                
        $vops = array(
            'foroName' => 'Hort�cola',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/horticultura_informe_final.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Est�tica Profesional',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Informe_sectorial_estetica_profesional.pdf'
        );
        echo $this->element('foro', $vops);
        
        $vops = array(
            'foroName' => 'Textil / Indumentaria',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Producci�n Lechera',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Automotriz',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Sector automotriz - Informe Final.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Energ�a El�ctrica',
            'participantes' => array(
                'ACYEDE', 'CADIME','APSE','EDENOR','EDESUR',
                'Ministerio de la Producci�n', 'ATEERA', 'TRANSENER', 
                'Sindicato de Luz y Fuerza', 'FATLyF', 'APSEE', 
                'FACT�c', 'FNPT'
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/INFORME SECTORIAL SECTOR ENERGIA ELECTRICA.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Inform�tica',
            'participantes' => array(),
            //'docInfoSectorial' => '/files/pdfs/info_sectorial/INFORME SECTORIAL SECTOR ENERGIA ELECTRICA.pdf'
        );
        echo $this->element('foro', $vops);
       
        
        $vops = array(
            'foroName' => 'Madera y Mueble',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Metalmec�nica',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf'
        );
        echo $this->element('foro', $vops);
        
        ?>
        
        
        <p>Informes [Asignar al foro correspondiente]</p>
        <ul type="disc">
            <li>Hort&iacute;cola (Link a PDF)</li>
            <li>Est&eacute;tica Profesional (Link a PDF)</li>
            <li>Textil / Indumentaria (Link a PDF)</li>
            <li>Producci&oacute;n Lechera (Link a PDF)</li>
            <li>Automotriz (Link a PDF)</li>
            <li>Construcciones (Link a PDF)</li>
            <li>Energ&iacute;a El&eacute;ctrica (Link a PDF)</li>
            <li>Hoteler�a y Gastronom�a (Link a PDF)</li>
            <li>Inform�tica (Link a PDF)</li>
            <li>Madera y Mueble (Link a PDF)</li>
            <li>Metalmec�nica (Link a PDF)</li>
        </ul>
        <p>&nbsp;</p>
    </div>
</div>