<?php 
$this->pageTitle= 'Hoteler�a y Gastronom�a';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Hoteler�a y Gastronom�a',
        );
        echo $this->element('foro', $vops);
		?>
    </div>
</div>
