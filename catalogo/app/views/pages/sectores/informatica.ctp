<?php 
$this->pageTitle= 'Inform�tica';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Inform�tica',
            'participantes' => array(
                'COORDIEP',
                'CPCI',
                'CESSI',
                'UDA',
                'Polo IT Buenos Aires',
                'SADIO',
                'USUARIA',
                'C�rdoba Technology, Cluster de Tecnolog�a de la Informaci�n',
                'Ministerio de la Producci�n',
                'COPITEC',
                'CICOMRA',
                'CEIL',
                'FNPT' ,
            ),
            'docInfoSectorial' => '',
            'fliaProfesional' => array('nombre'=>'Inform�tica',
                                       'link'=>'/pages/doc_residual/flias/informatica')
        );
        echo $this->element('foro', $vops);
		?>
    </div>
</div>
