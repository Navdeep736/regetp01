<h1>Nueva Oferta Educativa</h1>
<h2 class="primero"><?= $instit['cue'].' - '.$instit['nombre'] ?></h2>

<div class="planes form">
<?php echo $form->create('Plan');?>
	<fieldset>
	
	<?php
	//debug($this);
		echo $form->input('instit_id',array('type'=>'hidden','value'=>$instit_id));
		echo $form->input('oferta_id');
		echo $form->input('norma');
		echo $form->input('nombre');
		echo $form->input('perfil');
		echo $form->input('sector');
		echo $form->input('duracion_hs',array('label'=>'Duraci�n Hs'));
		echo $form->input('duracion_semanas',array('label'=>'Duraci�n Semanas'));
		echo $form->input('duracion_anios',array('label'=>'Duraci�n A�os'));
		//echo $form->input('matricula',array('label'=>'Matr�cula'));
		
		/**
		 *    OBSERVACION
		 */	
		echo $form->input('observacion',array(	'type'=>'textarea',
												'rows'=>3,
												'label'=>'Observaciones',
												'after'=>'<cite>Puede ingresar hasta 100 caracteres</cite>'));
			//agrego esto para que no se puedan imprimir mas de 100 caracteres en el textarea
			?>
			<script type="text/javascript">
				$('PlanObservacion').observe('keyup', function(){					
					var maxlength = 100;
					if ($F('PlanObservacion') && $F('PlanObservacion').length > maxlength){
						var paso_flag = false;
						if(!paso_flag)alert('Solo puede escribir hasta 100 caracteres');
						$('PlanObservacion').setValue($F('PlanObservacion').substring(0, maxlength));
						paso_flag = true;
					}
				});
			</script>
		
		
		<?
		
		
		/**
		 *    CICLOS ALTA Y MODIFICACION
		 */	
		$ciclos = $this->requestAction('/Ciclos/dame_ciclos');
		echo $form->input('ciclo_alta', array("type" => "select", 
											  "options" => $ciclos,'label'=>'Alta',
											  "selected" => date('Y')			
		));
		echo $form->input('ciclo_mod', array("type" => "select", 
											  "options" => $ciclos,
											  "label" => 'Modificaci�n',
											  "selected" => date('Y')
		));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
	
