<?php 
$this->pageTitle= 'Textil / Indumentaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Construcciones',
            'participantes' => array(
                'Asociaci�n Confeccionistas de Pergamino',
                'FAIIA',
                'Uni�n Cortadores de la Indumentaria',
                'AAQCT',
                'INTI',
                'AOT',
                'Fundaci�n Pro-Tejer',
                'UIA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf',
            'fliaProfesional' => array('nombre'=>'Textil',
                                       'link'=>'/pages/doc_residual/flias/textil')
        );
        echo $this->element('foro', $vops);
		?>
    </div>
</div>
