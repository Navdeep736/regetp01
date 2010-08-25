
<?php

/* variable que viene del controlador
                 * @var $trayectosDisponibles array */
$trayectosDisponibles;



if (empty($trayectosDisponibles)) {
    ?>
    <p class="msg-atencion" style="padding: 30px 20px;">
        La estructura de la oferta no es v�lida.<br>
        Debe indicarla antes de agregar nuevos datos haciendo <?php echo $html->link('click aqu�','/planes/edit/'.$plan_id);?>.
    </p>
    <?php
    return 1;
}


//		$anios = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9);
//		echo $form->input('anio',array( 'options'=>$anios ,'label'=>'A�o'));
//		echo $form->input('etapa_id');

$anios = array();
$edades = array();
$datosMatriculas = array();
// debug($trayectosDisponibles);
if (!empty($trayectosDisponibles['EstructuraPlanesAnio'])):
    foreach ($trayectosDisponibles['EstructuraPlanesAnio'] as $a) {
        $anios[$a['nro_anio']] = array('matricula'=>null,'secciones'=>null,'hs_taller'=>null, 'estructura_planes_anio_id'=>$a['id']);
        $edades[] = $a['anio_escolaridad'];
        $datosMatriculas[] =  array('matricula'=>null,'secciones'=>null,'hs_taller'=>null, 'estructura_planes_anio_id'=>$a['id']);
    }
endif;


// me armo el array de opciones para el elemento que renderiza el recuadro de estructura
$trayectosData = array(
        'editable' => true,
        'anios' => $edades,
        'form_action' => 'saveAll',
        'etapa_header' => array(
                array(
                        'title' => $trayectosDisponibles['EstructuraPlan']['name'],
                        'estructura_plan_id' => $trayectosDisponibles['EstructuraPlan']['id'],
                        'anios' => $anios,
                )
        ),
        'ciclo_lectivo' => array(
                0 => array($anios),
        )
);	

echo $this->element('planes_view_tabla_sectec_trayectos', array('trayectosData'=>$trayectosData));

?>