<?php
class HistorialCuesController extends AppController {

	var $name = 'HistorialCues';
	var $helpers = array('Html', 'Form','Ajax');
	var $paginate = array('order'=>array('Instit.cue' => 'asc'),'limit'=>'10'); 

	function beforeFilter(){
		parent::beforeFilter();
		$this->rutaUrl_for_layout[] =array('name'=> 'Buscador Hist�rico','link'=>'/HistorialCues/search_form' );
	}
	
	function index() {		
		$this->Instit->recursive = 0;
		$this->set('instits', $this->paginate());
	}

	function view($id = null) {
	}

	function add() {		
	}

	function edit($id = null) {
	}

	function delete($id = null) {
	}
	
	/**
	 * Esta accion maneja el formulario de busqueda 
	 * que sera impreso por pantalla
	 *
	 */
	function search_form(){		
		if (!empty($this->data)) {
			$this->redirect('search');
		}
	}
	
	/**
	 * Esta accion es el procesamiento del formulario de busqueda
	 * maneja las condiciones de la busqueda y el paginador
	 *
	 */
	function search(){

		$array_condiciones = array();
		$url_conditions    = array();
		
		/* **************************************************** */
		/* * Seteo la relaci�n con Instits en Full other join * */
		/* **************************************************** */

		$this->HistorialCue->setBelongsToInstitTypeFull();

		if(isset($this->data['HistorialCues']['cue'])){
			if($this->data['HistorialCues']['cue'] != '' || $this->data['HistorialCues']['cue'] != 0 ){
				$is_cue_valido = $this->HistorialCue->Instit->isCUEValid($this->data['HistorialCues']['cue']);
           	 	if($is_cue_valido < 1){
           	 		switch ($is_cue_valido){
           	 			case -1:
           	 				$mensaje = "<H1>El CUE: '".$this->data['HistorialCues']['cue']."' no es v�lido.</H1> Ingrese un valor num�rico de al menos 3 d�gitos.";
           	 				$this->Session->setFlash($mensaje,'default',array('class' => 'flash-warning'));
           	 				$this->redirect('search_form');
           	 				break;
           	 		}           	 		
           	 	}
               
				$arr_cond1 = array('OR' => array(
					              'CAST(((Instit.cue*100)+Instit.anexo) as character(60)) SIMILAR TO ?' => '%'.$this->data['HistorialCues']['cue'].'%',
                                  'CAST(((HistorialCue.cue*100)+HistorialCue.anexo) as character(60)) SIMILAR TO ?' => '%'.$this->data['HistorialCues']['cue'].'%'
				             ));
				
           	 	
				$this->paginate['conditions'] = $arr_cond1;
				$array_condiciones['CUE']     = $this->data['HistorialCues']['cue'];
				$url_conditions['cue']        = $this->data['HistorialCues']['cue'];
			}
		}

		if(isset($this->passedArgs['cue'])){	
			if($this->passedArgs['cue'] != '' || $this->passedArgs['cue'] != 0 ){
				$long = strlen($this->passedArgs['cue']);
				
				$arr_cond1 = array('OR' => array(
					               'CAST(((Instit.cue)) as character(60)) SIMILAR TO ?' => '%'.$this->passedArgs['cue'].'%',
								   'CAST(((HistorialCue.cue)) as character(60)) SIMILAR TO ?' => '%'.$this->passedArgs['cue'].'%'
					                ));
				
				            	 		
				$this->paginate['conditions'] = $arr_cond1;
				$array_condiciones['CUE']     = $this->passedArgs['cue'];
				$url_conditions['cue']        = $this->passedArgs['cue'];
			}
		}
            
	    $this->HistorialCue->recursive = 1;         
	    $data = $this->paginate();

	    /* ************************************************************ */
		/* * Llamo el find de instit para que arme el nombre completo * */
		/* ************************************************************ */
	
	    $totInstit = count($data);
		for ($i=0;$i<$totInstit;$i++){
			$nombre_completo = $this->HistorialCue->Instit->find(array('Instit.id'=>$data[$i]['Instit']['id']));
			$data[$i]['Instit']['nombre_completo'] = $nombre_completo['Instit']['nombre_completo'];
		}
		//debug($data);
        $this->set('instits', $data);
        $this->set('url_conditions', $url_conditions);
        $this->set('conditions', $array_condiciones);
	}
}
?>