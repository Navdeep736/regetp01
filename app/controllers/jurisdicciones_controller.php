<?php
class JurisdiccionesController extends AppController {

	var $name = 'Jurisdicciones';
	var $helpers = array('Html', 'Form');
	var $paginate = array('limit' => 25, 'order'=>array('name'=>'asc'));

        function beforeFilter() {
            parent::beforeFilter();
            $this->rutaUrl_for_layout[] =array('name'=> 'Listado de Jurisdicciones','link'=>'/Jurisdicciones/listado' );
        }

	function index() {
		$this->Jurisdiccion->recursive = 0;
		$this->set('jurisdicciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Jurisdiccion.', true));
			$this->redirect(array('action'=>'listado'));
		}
		$this->set('jurisdiccion', $this->Jurisdiccion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jurisdiccion->create();
			if ($this->Jurisdiccion->save($this->data)) {
				$this->Session->setFlash(__('The Jurisdiccion has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Jurisdiccion could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Jurisdiccion', true));
			$this->redirect(array('action'=>'listado'));
		}
		if (!empty($this->data)) {
			if ($this->Jurisdiccion->save($this->data)) {
				$this->Session->setFlash(__('The Jurisdiccion has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Jurisdiccion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Jurisdiccion->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Jurisdiccion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Jurisdiccion->del($id)) {
			$this->Session->setFlash(__('Jurisdiccion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

        function listado() {
		$this->Jurisdiccion->recursive = 0;
		$this->set('jurisdicciones', $this->paginate());
	}
	
	
	
	/********************************************************************
	 * 
	 * 
	 *  RequestAction
	 * 
	 * 
	 */
	
	function get_name($id){
		$this->Jurisdiccion->recursive = -1;
		$varaux = $this->Jurisdiccion->read(null,$id);
		return $varaux['Jurisdiccion']['name'];
	}
}
?>