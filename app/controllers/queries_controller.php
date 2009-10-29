<?php
class QueriesController extends AppController {

	var $name = 'Queries';
	var $helpers = array('Html', 'Form','Ajax');
	var $components = array('RequestHandler');

	function index() {
		$this->Query->recursive = 0;
		$this->set('queries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Query.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('query', $this->Query->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Query->create();
			if ($this->Query->save($this->data)) {
				$this->Session->setFlash(__('The Query has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Query could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Query', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Query->save($this->data)) {
				$this->Session->setFlash(__('The Query has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Query could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Query->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Query', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Query->del($id)) {
			$this->Session->setFlash(__('Query deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function descargar_queries() {
		$categoria=(isset($this->data['Query']['categoria']))? $this->data['Query']['categoria'] : "";
		$this->set('categoria',$categoria);

		$categorias = array();
		$categorias[''] = 'Todos';
		$categorias_aux = $this->Query->listarCategorias();
		foreach($categorias_aux as $c){
			$categorias[$c['Query']['categoria']] = $c['Query']['categoria'];
		}			
		$this->set('categorias',$categorias);
		
		$conditions=array();
		if($categoria!=""){
			$conditions['categoria']=$categoria;
		}
		if(isset($this->data['Query']['description']) && $this->data['Query']['description']!="") {
			$conditions['OR']['lower(to_ascii(Query.description)) SIMILAR TO ?'] = array($this->Query->convertir_para_busqueda_avanzada(utf8_decode($this->data['Query']['description'])));
			$conditions['OR']['lower(to_ascii(Query.name)) SIMILAR TO ?'] = array($this->Query->convertir_para_busqueda_avanzada(utf8_decode($this->data['Query']['description'])));
		}
		
		$queries=$this->Query->find('all',array('order'=>'modified DESC', 'conditions'=>$conditions));
		$this->set('queries',$queries);
	}
	
	/**
	 * esto me construye un excel en la vista con el id de la query
	 * @param $id
	 */
	function contruye_excel($id){
		$this->layout = 'excel';
		Configure::write('debug',0); 
		$this->RequestHandler->setContent('xls', 'application/vnd.ms-excel'); 
		$res = $this->Query->findById($id);
		$sql = $res['Query']['query'];
		$this->Query->recursive = -1;
		$consulta_ejecutada = $this->Query->query($sql);
		
		$quitar_columnas = $consulta_ejecutada[0][0];
		while(list($key,$value) = each($quitar_columnas)):
			$columnas[] = $key;
		endwhile;
		
		$this->set('nombre',$res['Query']['name']);
		$this->set('columnas',$columnas);
		$this->set('filas',$consulta_ejecutada);

	}
	
	
	function listado_categorias()
	{	
		Configure::write('debug', 0);
		$this->Query->recursive = -1;
		
		$categorias = array();
		if(!empty($this->data['Query']['categoria'])){
			$categorias = $this->Query->listarCategorias($this->data['Query']['categoria']);
		}
		else{
			$categorias = $this->Query->listarCategorias('*'); // me trae todas
		}
		
		$this->set('categorias',$categorias);
		$this->set('string_categoria',$this->data['Query']['categoria']);
		$this->layout = 'ajax';
	}

}
?>