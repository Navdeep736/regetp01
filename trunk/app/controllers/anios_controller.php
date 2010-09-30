<?php
class AniosController extends AppController {

	var $name = 'Anios';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Anio->recursive = 0;
		$this->set('anios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Anio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('anio', $this->Anio->read(null, $id));
	}


        /**
         * Guarda anios. Funciona tanto para el add como para el edit
         * 
         * @param integer $plan_id
         * @param <type> $duracion_hs Guarda los anios
         */
        function saveAll($plan_id = null,$duracion_hs = null){
            if(!empty($this->data['Info']['plan_id'])){
                    $plan_id = $this->data['Info']['plan_id'];
            }
            if(!empty($this->data['Info']['estructura_plan_id'])){
                $this->Anio->Plan->guardarEstructuraSiNoLaTiene($this->data['Info']['estructura_plan_id'], $this->data['Info']['plan_id']);
            }
            if(!empty($this->data['Info']['ciclo_id'])){
                    $ciclo_id = $this->data['Info']['ciclo_id'];
            }

            if (!empty($this->data)) {
                    $this->Anio->create();
                    $aniosGuardar = array();
                    foreach ($this->data['Anio'] as &$anios){
                        $anios['ciclo_id'] = $ciclo_id;
                        $anios['plan_id'] = $plan_id;
                        $estruct = $this->Anio->EstructuraPlanesAnio->find('first', array(
                            'contain'=> array('EstructuraPlan.(etapa_id)'),
                            'conditions'=> array('EstructuraPlanesAnio.id'=> $anios['estructura_planes_anio_id']),
                            ));
                        $anios['anio'] = $estruct['EstructuraPlanesAnio']['nro_anio'];
                        $anios['etapa_id'] = $estruct['EstructuraPlan']['etapa_id'];
                        /*if (    !empty($anios['matricula']) ||
                                !empty($anios['secciones']) ||
                                !empty($anios['hs_taller'])) {*/
                            $aniosGuardar[] = $anios;
                       /* }*/

                    }
                    if ($this->Anio->saveAll($aniosGuardar)) {
                        $this->Session->setFlash(__('Se ha guardado un nuevo a�o', true));
                        $this->redirect('/planes/view/'.$plan_id);

                    } else {
                        debug($this->Anio->validationErrors);
                        $this->Session->setFlash(__('Intente de nuevo. No se pudo guardar el dato.', true));
                        $this->redirect('/planes/view/'.$plan_id);
                    }
            }
        }


        /**
         * Guarda anios. Funciona tanto para el add como para el edit
         *
         * @param integer $plan_id
         * @param <type> $duracion_hs Guarda los anios
         */
        function save($plan_id = null,$duracion_hs = null){
            if (!empty($this->data)) {
                    $this->Anio->create();
                    if ($this->Anio->save($this->data)) {
                        $this->Session->setFlash(__('Se ha guardado un nuevo a�o', true));
                        $this->redirect('/planes/view/'.$this->data['Anio']['plan_id']);

                    } else {
                        debug($this->Anio->validationErrors);
                        $this->Session->setFlash(__('Intente de nuevo. No se pudo guardar el dato.', true));
                        $this->redirect('/planes/view/'.$this->data['Anio']['plan_id']);
                    }
            }
        }


	function add($plan_id = null,$duracion_hs = null) {
            if (!empty($this->data['Info']['plan_id'])) {
                    $plan_id = $this->data['Info']['plan_id'];
            }
            
            $estructuraPlanId = $this->Anio->Plan->getEstructuraSugerida($plan_id);
            
            $trayectosDisponibles = $this->Anio->EstructuraPlanesAnio->EstructuraPlan->find('first', array(
                'contain'=> array('EstructuraPlanesAnio'=>array('order'=>array('EstructuraPlanesAnio.edad_teorica'))),
                'conditions'=> array(
                    'EstructuraPlan.id'=>$estructuraPlanId),
            ));            
		
            /**
             * esto es para generar una vista distinta
             * para los a�os que son de una oferta FP
             */
            $this->Anio->Plan->recursive = -1;
            $plan   = $this->Anio->Plan->find('all',array('conditions'=>array('Plan.id'=>$plan_id)));
            switch ($plan[0]['Plan']['oferta_id']):
                case 1://es un FP, asique mostrar la vista de a�os para FP
                case 7://es CL, asique mostrar la vista de a�os para FP
                    $viewToRender = '/anios/add_fp';
                    break;
                case 2: // IT
                case 5: //SEC NO TECNICO
                    $viewToRender = '/anios/add_it';
                    break;
                case 3: //MT
                    $viewToRender = '/anios/add';
                    break;
                case 6: //SUP NO TECNICO
                case 4: //SNU
                    $viewToRender = '/anios/add_snu';
                    break;
                default: // si no va con ninguno mostrar el de MT
                    $viewToRender = '/anios/add';
                    break;
            endswitch;

            $this->set('trayectosDisponibles',$trayectosDisponibles);
            $this->set('plan_id',$plan_id);
            $this->set('duracion_hs',$duracion_hs);

            $ciclosTodos = $this->Anio->Ciclo->find('list');
            // solo los que aun no haya agregado informacion
            $ciclosUsados = $this->Anio->find('all',array(
                    'fields'=>array('Anio.ciclo_id'),
                    'conditions'=>array(
                        //'Anio.ciclo_id NOT'=>$ciclosTodos,
                        'Anio.plan_id'=>$plan_id),
                    'group'=>array('Anio.ciclo_id', 'Anio.plan_id'),
                    'order'=>array('Anio.ciclo_id'),
                        ));
            $ciclosTmp = array();
            foreach ($ciclosUsados as $c) {
                $ciclosTmp[] = $c['Anio']['ciclo_id'];
            }

            if(!empty($ciclosTmp)){
                $ciclos = $this->Anio->Ciclo->find('list', array(
                    'conditions'=>array(array('NOT'=>array('Ciclo.id'=>$ciclosTmp)))));
            }
            else{
                $ciclos = $this->Anio->Ciclo->find('list');
            }
            
            $etapas = $this->Anio->Etapa->find('list');
            $this->set(compact('planes', 'ciclos', 'etapas'));
            $this->render($viewToRender);
	}

	function edit($id = null) {
            $aPlan = $this->Anio->find('first', array(
                'conditions'=>array('Anio.id'=>$id),
                //'fields'=>array('Anio.plan_id','Anio.ciclo_id')
                ));
            
            $plan_id = $aPlan['Anio']['plan_id'];
                       
            
            $this->data = $aPlan;
            
            if(!empty($this->data['Info']['plan_id'])){
                    $plan_id = $this->data['Info']['plan_id'];
            }

            $estructuraPlanId = $this->Anio->Plan->getEstructuraSugerida($plan_id);
            $trayectosDisponibles = $this->Anio->EstructuraPlanesAnio->EstructuraPlan->find('first', array(
                'contain'=> array('EstructuraPlanesAnio'=>array('order'=>array('EstructuraPlanesAnio.edad_teorica'))),
                'conditions'=> array(
                    'EstructuraPlan.id'=>$estructuraPlanId),
            ));

            /**
             * esto es para generar una vista distinta
             * para los a�os que son de una oferta FP
             */
            $this->Anio->Plan->recursive = -1;
            $plan   = $this->Anio->Plan->find('all',array('conditions'=>array('Plan.id'=>$plan_id)));
            switch ($plan[0]['Plan']['oferta_id']):
                case 1://es un FP, asique mostrar la vista de a�os para FP
                case 7://es CL, asique mostrar la vista de a�os para FP
                    $viewToRender = '/anios/edit_fp';
                    break;
                case 2: // IT
                case 3: //MT
                case 5: //SEC NO TECNICO
                    $viewToRender = '/anios/edit';
                    break;
                case 6: //SUP NO TECNICO
                case 4: //SNU
                    $viewToRender = '/anios/edit_snu';
                    break;
                default: // si no va con ninguno mostrar el de MT
                    $viewToRender = '/anios/edit';
                    break;
            endswitch;

            $this->set('ciclo_seleccionado', $aPlan['Anio']['ciclo_id']);
            $this->set('trayectosDisponibles',$trayectosDisponibles);
            $this->set('plan_id',$plan_id);
            //$this->set('duracion_hs',$duracion_hs);
            $anios = $this->Anio->find('all', array(
                'recursive'=>-1,
                'conditions'=>array(
                    'Anio.plan_id'=>$plan_id,
                    'Anio.ciclo_id'=>$aPlan['Anio']['ciclo_id']
                    )
                ));


            $ciclos = $this->Anio->Ciclo->find('list');
            $etapas = $this->Anio->Etapa->find('list');
            
            $this->set(compact('anios', 'ciclos', 'etapas'));
            $this->render($viewToRender);
	}


        /**
         *
         * @param integer $plan_id
         * @param integer $ciclo_id
         */
        function editCiclo($plan_id = null, $ciclo_id = null) {
            $conditions = array();
            
            // datos que pueden venir del formulario
            if(!empty($this->data['Info']['plan_id'])){
                    $plan_id = $this->data['Info']['plan_id'];
            }
            if(!empty($this->data['Info']['ciclo_id'])){
                    $ciclo_id = $this->data['Info']['ciclo_id'];
            }

                // agarro la Info del Plan para plan_id y su ciclo
                $aPlan = $this->Anio->find('first', array(
                    'conditions'=>array('Anio.plan_id'=>$plan_id,
                                        'Anio.ciclo_id'=>$ciclo_id
                                       ),
                    'contain' => array('EstructuraPlanesAnio.EstructuraPlan'),
                    'order' => 'Anio.anio',
                    ));
                $this->data = $aPlan;


            // agarro la estructura y su trayecto con los a�os
            $estructuraPlanId = $this->Anio->Plan->getEstructuraSugerida($plan_id);
            $trayectosDisponibles = $this->Anio->EstructuraPlanesAnio->EstructuraPlan->find('first', array(
                'contain'=> array(
                    'EstructuraPlanesAnio'=>array(
                        'order'=>array('EstructuraPlanesAnio.edad_teorica')
                        )),
                'conditions'=> array(
                    'EstructuraPlan.id'=>$estructuraPlanId),
            ));

            /**
             * esto es para generar una vista distinta
             * para los a�os que son de una oferta FP
             */
            $this->Anio->Plan->recursive = -1;
            $plan   = $this->Anio->Plan->find('all',array(
                'conditions'=>array('Plan.id'=>$plan_id)));
            switch ($plan[0]['Plan']['oferta_id']):
                case 1://es un FP, asique mostrar la vista de a�os para FP
                case 7://es CL, asique mostrar la vista de a�os para FP
                    $viewToRender = '/anios/edit_fp';
                    break;
                case 2: // IT
                    $viewToRender = '/anios/edit';
                    break;
                case 3: //MT
                case 5: //SEC NO TECNICO
                    $viewToRender = '/anios/edit_estructurados';
                    break;
                case 6: //SUP NO TECNICO
                case 4: //SNU
                    $viewToRender = '/anios/edit_snu';
                    break;
                default: // si no va con ninguno mostrar el de MT
                    $viewToRender = '/anios/edit';
                    break;
            endswitch;

            
            $this->set('ciclo_seleccionado', $aPlan['Anio']['ciclo_id']);
            $this->set('trayectosDisponibles',$trayectosDisponibles);
            $this->set('plan_id',$plan_id);
            //$this->set('duracion_hs',$duracion_hs);
            $anios = $this->Anio->find('all', array(
                'contain'=> array('EstructuraPlanesAnio'),
                'conditions'=>array(
                    'Anio.plan_id'=>$plan_id,
                    'Anio.ciclo_id'=>$aPlan['Anio']['ciclo_id']
                    ),
                'order' => array('Anio.anio'),
                ));


            $ciclos = $this->Anio->Ciclo->find('list');
            $etapas = $this->Anio->Etapa->find('list');

            $this->set(compact('anios', 'ciclos', 'etapas'));
            $this->render($viewToRender);
	}
        
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id de A�o inv�lido', true));
			$this->redirect(array('controller'=>'Pages','action'=>'default'));
		}
		
		$this->Anio->recursive = -1;
		$plan = $this->Anio->read('plan_id',$id);
		if ($this->Anio->del($id)) {
	
			$this->Session->setFlash(__('A�o eliminado', true));
			$this->redirect(array('controller'=>'Planes' ,'action'=>'view/'.$plan['Anio']['plan_id']));
		}
	}

        function deleteCiclo($plan_id = null, $ciclo_id = null) {
		if ($this->Anio->deleteAll(array('Anio.plan_id ='. $plan_id, 'Anio.ciclo_id ='. $ciclo_id))) {

			$this->Session->setFlash(__('A�o eliminado', true));
			$this->redirect(array('controller'=>'Planes' ,'action'=>'view/'.$plan_id));
		}
	}

}
?>