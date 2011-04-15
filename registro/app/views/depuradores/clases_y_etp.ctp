<?php

echo $javascript->link('prototype');
echo $javascript->link('scriptaculous-js-1.8.3/src/scriptaculous');


?>
<div class="instits form">
<h1>Editar Instituci�n de <?php echo $this->data['Jurisdiccion']['name']?> <br> Nombre: <?= $html->link($this->data['Instit']['nombre_completo'],'/instits/view/'.$this->data['Instit']['id']);?> <br> CUE: <?= $this->data['Instit']['cue']*100+$this->data['Instit']['anexo'] ?> (id:<?php echo $this->data['Instit']['id']?>) <br> �� vamos que faltan solo <?php echo $falta_depurar?>!!</h1>



<script type="text/javascript">
<!--


Event.observe(window, "keypress", function(e){ 
		var cKeyCode = e.keyCode || e.which; 
		if (cKeyCode == Event.KEY_RETURN){ 
			$('InstitDepurarForm').submit();
		} 
	});
-->
</script>

<h2>Planes</h2>
<?php foreach ($planes as $p):?>
<?php $div_id = "plan-id-".$p['Plan']['id']; ?>

	<dl style="font-size: 12px;">
		<dt>Nombre:</dt>				<dd style="margin-left: 10em;"><?php echo $html->link($p['Plan']['nombre'],'/Planes/view/'.$p['Plan']['id'])?>&nbsp;</dd>
		<dt>Oferta:</dt>				<dd style="color: OrangeRed; font-size: 12px;"><?php echo $p['Oferta']['name']?>&nbsp;</dd>
	</dl>
	<a style="font-size: 10px;" href="javascript:" onclick="$('<? echo $div_id?>').toggle(); return false;">M�s info del Plan</a>
	<div style="display: none; background-color: beige;" id="<? echo $div_id?>">
		<dl>
			<dt>Sector:</dt>				<dd><?php echo $p['Plan']['sector']?>&nbsp;</dd>
			<dt>Duracion:</dt>				<dd><?php echo " - ";?>&nbsp;</dd>
			<dt>&nbsp;&nbsp;-- Horas:</dt>	<dd><?php echo $p['Plan']['duracion_hs'];?>&nbsp;</dd>
			<dt>&nbsp;&nbsp;-- Semanas:</dt><dd><?php echo $p['Plan']['duracion_semanas'];?>&nbsp;</dd>
			<dt>&nbsp;&nbsp;-- A�os:</dt>	<dd><?php echo $p['Plan']['duracion_anios'];?>&nbsp;</dd>
			<dt>matricula:</dt>				<dd><?php echo $p['Plan']['matricula']?>&nbsp;</dd>
			<dt>Observaci�n:</dt>			<dd><?php echo $p['Plan']['observacion']?>&nbsp;</dd>
			<dt>Alta:</dt>					<dd><?php echo date('d/m/Y',strtotime($p['Plan']['created']))?>&nbsp;</dd>
			<dt>Modificaci�n:</dt>			<dd><?php echo date('d/m/Y',strtotime($p['Plan']['modified']))?>&nbsp;</dd>
			
			<?php
				foreach ($p['Anio'] as $anio):
					$ciclos[$anio['ciclo_id']] = $anio['ciclo_id'];
				endforeach;
				
				$texto = '';
				foreach ($ciclos as $c):
					$texto .= " - ".$c;
				endforeach;
			?>
			<dt>Ciclos con informaci�n</dt><dd><?php echo $texto?>&nbsp;</dd>
			
		</dl> 
	</div>
	<hr>

<?php endforeach;?>

<?php echo $form->create('Instit',array('url'=>'/depuradores/clases_y_etp','id'=>'InstitDepurarForm'));?>
	<?php
		echo $form->input('id');	
				
		echo $form->input('claseinstit_id',array('label'=>'Seleccione tipo de Instituci�n'));
		
		echo $form->input('etp_estado_id',array('label'=>'Seleccione Relaci�n de ETP'));
		
		
        
		echo $form->button('Guardar',array('onclick'=>'$("InstitDepurarForm").submit()'));

		echo $form->input('tipoinstit_id',array('label'=>'Seleccione Tipo de Establecimiento',
												'after'=>'<br>Este combo lo incorporamos porque Ramiro dijo que a�n faltaban depurar alguos tipos de establecimientos',
												  'type'=>'select',
												  'options'=>$tipoinstit
		));
     	
         /********************************************************************************/
                                   
		/**
		 *    NOMBRE
		 */	
		echo $form->input('nombre', array('readonly'=>true));
		
		
		/**
		 *    Nro Instit
		 */	
		echo $form->input('nroinstit',array('label'=>array(	'text'=>'N� de Instituci�n',
															'class'=>'input_label'),
											'class'=> 'input_text_peque',
											'readonly'=>true
		));		
			
		echo $form->input('anio_creacion', array('readonly'=>true, 'label'=>'A�o Creaci�n'));
		
		
		/**
		 *    DIRECCION
		 */	
		echo $form->input('direccion',array('label'=>array(	'text'=> 'Domicilio',
															'class'=>'input_label'),
											'class' => 'input_text_peque',
											'readonly'=>true
		));
			                          
                                   
		/**
		 *    CODIGO POSTAL
		 */							
		echo $form->input('cp',array('label'=>array('text'=>'C�digo Postal', 'class'=>'input_label'),
									 'class' => 'input_text_peque',
									 'readonly'=>true
		));
		
		
		
	/****************************************************************************
	 *    
	 * 
	 * 
	 * 				DATOS ADICIONALES
	 * 
	 * 
	 */	
		?><H2>Datos Adicionales</H2><?
		/**
		 *    INGRESO/ACTUALIZACION
		 */	
		echo $form->input('actualizacion',array('label'=>array(	'text'=> 'Ingreso/Actualizaci�n',
																'class'=>'input_label'),
											    'class'=>'input_text_peque',
												'readonly'=>true
		));
		
		/**
		 *    OBSERVACION
		 */	
		echo $form->input('observacion', array('readonly'=>true, 'label'=>'Observaci�n'));
			//agrego esto para que no se puedan imprimir mas de 100 caracteres en el textarea
			?>
			

		<?
		/**
		 *    CICLOS ALTA Y MODIFICACION
		 */	
		$ciclos = $this->requestAction('/Ciclos/dame_ciclos');
		echo $form->input('ciclo_alta', array("type" => "select", 
											  "options" => $ciclos,'label'=>'Alta',
											  "selected" => $this->data['Instit']['ciclo_alta'],
											  'disabled' => true		
		));
		
	?>
	<?php echo $form->submit('Guardar', array('style'=>' display: block;
													        width: 100px;
													        vertical-align: bottom;
													        margin-top: 7px;
													        margin-left: 4px;
													        border-color: #CEE3F6;
													        background-color: #DBEBF6;
													        color: #045FB4;
													        font-weight: bold;'
												)
								);
		?>
<?php echo $form->end();?>

</div>



