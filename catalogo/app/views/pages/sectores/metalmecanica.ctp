<?php 
$this->pageTitle= 'Metalmec�nica';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Metalmec�nica',
            'participantes' => array(
                'Ministerio de la Producci�n.',
                'CAME',
                'UOM',
                'UDA',
                'ASIMRA',
                'FNPT',
                'AMET' ,
                'ADIMRA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf',
            'fliaProfesional' => array('nombre'=>'Metalmec�nica',
                                       'link'=>'/pages/flias/metalmecanica')
        );
        echo $this->element('foro', $vops);
		?>
    </div>
</div>
