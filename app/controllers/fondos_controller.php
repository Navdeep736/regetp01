<?php
class FondosController extends AppController {

	var $name = 'Fondos';
	var $helpers = array('Html', 'Form');
        var $components = array('Filter');

        function beforeFilter() {
            parent::beforeFilter();
            $this->rutaUrl_for_layout[] =array('name'=> 'Buscador','link'=>'/Instits/search_form' );
        }
        
	function index_x_instit($id=null) {

            if ($id) {
                $this->paginate = array('conditions'=>array('Fondo.instit_id'=>$id),'order' => array('Fondo.anio DESC','Fondo.trimestre DESC','Fondo.jurisdiccion_id DESC'));
            }
            else {
                $this->Session->setFlash(__('No especifica instituci�n', true));
                $this->redirect(array('action'=>'index'));
                //$this->paginate = array('conditions'=>array('Fondo.instit_id !='=>0),'order' => array('Fondo.anio DESC','Fondo.trimestre DESC','Fondo.jurisdiccion_id DESC'));
            }

            $this->Fondo->recursive = 1;

            
            $this->set('instit', $this->Fondo->Instit->read(null, $id));
            $this->set('fondos', $this->paginate());
	}

        function index_x_jurisdiccion($id=null) {

            if ($id) {
                $this->paginate = array('conditions'=>array('Fondo.instit_id'=> 0,'Fondo.jurisdiccion_id'=>$id),'order' => array('Fondo.anio DESC','Fondo.trimestre DESC','Fondo.jurisdiccion_id DESC'));
            }
            else {
                $this->Session->setFlash(__('No especifica jurisdicci�n', true));
                $this->redirect(array('action'=>'index'));
                //$this->paginate = array('conditions'=>array('Fondo.instit_id'=> 0), 'order' => array('Fondo.anio DESC','Fondo.trimestre DESC','Fondo.jurisdiccion_id DESC'));
            }

            $this->Fondo->recursive = 1;


            $this->set('jurisdiccion', $this->Fondo->Jurisdiccion->read(null, $id));
            $this->set('fondos', $this->paginate());
	}

        function index() {

            $this->Fondo->recursive = 0;
            
            $filter = $this->Filter->process($this);

            $jurisdicciones = $this->Fondo->Jurisdiccion->find('list', array('order'=>'name'));
            $anios = $this->Fondo->Instit->Plan->Anio->Ciclo->find('list');

            $this->set(compact('jurisdicciones','anios'));
            $this->set('url',$this->Filter->url);
            $this->set('fondos', $this->paginate(null,$filter));
            
	}

	/*function search($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Fondo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fondo', $this->Fondo->read(null, $id));
	}*/

	function add() {
                $this->redirect(array('action' => 'index'));
		if (!empty($this->data)) {
			$this->Fondo->create();
			if ($this->Fondo->save($this->data)) {
				$this->Session->setFlash(__('The Fondo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fondo could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
                $this->redirect(array('action' => 'index'));
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Fondo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fondo->save($this->data)) {
				$this->Session->setFlash(__('The Fondo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fondo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fondo->read(null, $id);
		}
	}

	function delete($id = null) {
                $this->redirect(array('action' => 'index'));
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Fondo', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Fondo->del($id)) {
			$this->Session->setFlash(__('Fondo deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Fondo could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>