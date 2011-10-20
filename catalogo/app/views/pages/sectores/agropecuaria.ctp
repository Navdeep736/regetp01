<?php 
$this->pageTitle= 'Agropecuaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Agropecuario',
            'fliaProfesional' => array('nombre'=>'Agropecuario',
                           'link'=>'/pages/flias/agropecuaria')
        );
        echo $this->element('foro', $vops);
		?>
		<h3>Subsectores</h3>
		<ul>
			<li>Ap��cola</li>
			<li>Av�cola</li>
			<li>Flor��cola</li>
			<li>Forestal</li>
			<li>Frut��cola - Olivicultura</li>
			<li>Hort�cola
                            
                            <?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/horticultura_informe_final.pdf', array('target'=>'_blank')) ?>

                        </li>
			<li>Producci�n Lechera
                        <?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/informe_lechero.pdf', array('target'=>'_blank')) ?>
                        </li>
			<li>Vitivinicultura</li>
		</ul>
    </div>
</div>
