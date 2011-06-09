<br />

<?php echo $this->element('menu_docs')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Foros sectoriales</h2>
        <p>Descripci&oacute;n, Mecanismos de funcionamiento [Pablo]</p>
        
        <p><?echo $html->link('Ver metodolog�a','/pages/foros_metodologia');?></p>
        
        
        <h3>Foros</h3>
        
        <p style="color:red">Falta informe de: Informatica, Construcciones y Hoteleria y Gastronomia</p>

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
        
       
    </div>
</div>