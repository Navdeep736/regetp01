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

	function add($plan_id = null) {
		$this->layout='popup';
		if (!empty($this->data)) {
			$this->Anio->create();
			if ($this->Anio->save($this->data)) {
				$this->Session->setFlash(__('Se ha guardado un nuevo a�o', true));
				$this->set('script','<script type="text/javascript">window.opener.location.reload();window.close();</script>">');
			} else {
				$this->Session->setFlash(__('EL a�o no ha podido ser guardado. Por favor, intente de nuevo.', true));
			}
		}
		
		$planes = $this->Anio->Plan->find('list');
		$ciclos = $this->Anio->Ciclo->find('list');
		$etapas = $this->Anio->Etapa->find('list');
		$this->set('plan_id',$plan_id);
		$this->set(compact('planes', 'ciclos', 'etapas'));
	}

	function edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Anio', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->layout='popup';
		if (!empty($this->data)) {
			if ($this->Anio->save($this->data)) {
				$this->Session->setFlash(__('El a�o ha sido guardado', true));
				$this->set('script','<script type="text/javascript">window.opener.location.reload();window.close();</script>">');
			} else {
				$this->Session->setFlash(__('El a�o no pudo ser guardado. Por favor, intente denuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Anio->read(null, $id);
		}
		$planes = $this->Anio->Plan->find('list');
		$ciclos = $this->Anio->Ciclo->find('list');
		$etapas = $this->Anio->Etapa->find('list');
		$this->set(compact('planes','ciclos','etapas'));
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

}
?>