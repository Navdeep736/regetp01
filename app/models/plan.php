<?php
class Plan extends AppModel {

	var $name = 'Plan';
	var $asociarAnio = false; // Se utiliza en el paginador
	var $maxCiclo = "";

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array( 
			'Instit' => array('className' => 'Instit',
								'foreignKey' => 'instit_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Oferta' => array('className' => 'Oferta',
								'foreignKey' => 'oferta_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Sector' => array('className' => 'Sector',
								'foreignKey' => 'sector_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Subsector' => array('className' => 'Subsector',
								'foreignKey' => 'subsector_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
	);

	var $hasMany = array(
			'Anio' => array('className' => 'Anio',
								'foreignKey' => 'plan_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => array('ciclo_id DESC','etapa_id ASC, anio ASC'),
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);
	
	var $validate = array(
		'nombre' => array(
			'notEmpty'=> array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Debe ingresar el nombre.'	
			)
		),
		'ciclo_alta' => array(
			'notEmpty'=> array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Debe ingresar el ciclo de alta.'	
			),
			'year'=> array(
				'rule' => VALID_YEAR,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Debe ingresar formato de a�o, con 4 d�gitos.'	
			)
		),
		'sector_id' => array(
			'notEmpty'=> array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Debe ingresar un sector.'	
			)
		),
		'subsector_id' => array(
			'correcto_subsector' => array(
				'rule' => array('controlar_coincidencia_sector_subsector'),
				'message'=> 'El subsector no corresponde al sector.'	
			)
		),
		'duracion_hs' => array(
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un valor num�rico para las horas.'
			),
			'between' => array(
				'rule' => array('between','0','9'),
				'required' => true,
				'allowEmpty' => true,
				'message' => 'La duraci�n no puede ser un valor tan alto'
			
			)
		),
		'duracion_semanas' => array(
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un valor num�rico para las semanas.'
			
			),
			'between' => array(
				'rule' => array('between','0','9'),
				'required' => true,
				'allowEmpty' => true,
				'message' => 'La duraci�n no puede ser un valor tan alto'
			
			)
		),
		'duracion_anios' => array(
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un valor num�rico para los a�os.'
			
			),
			'between' => array(
				'rule' => array('between','0','9'),
				'required' => true,
				'allowEmpty' => true,
				'message' => 'La duraci�n no puede ser un valor tan alto'
			
			)
		)
	);
	
	function beforeSave(){  		  		
  		if (isset($this->data['Plan']['sector_id'])):
  			if ($this->data['Plan']['sector_id'] != '' || $this->data['Plan']['sector_id'] != 0): 
  				$this->Sector->recursive = -1;
  				$this->Sector->id = $this->data['Plan']['sector_id'];
  				$sec_aux = $this->Sector->read();
  				$this->data['Plan']['sector'] = $sec_aux['Sector']['name'];
  			endif;
  		endif;
  		  		
  		
  		if (isset($this->data['Plan']['duracion_hs'])):
  			if ($this->data['Plan']['duracion_hs'] == ''): 
  				$this->data['Plan']['duracion_hs'] = 0;
  			endif;
  		else:
  			$this->data['Plan']['duracion_hs'] = 0;
  		endif;
  		
  		
  		if (isset($this->data['Plan']['duracion_semanas'])):
  			if ($this->data['Plan']['duracion_semanas'] == ''): 
  				$this->data['Plan']['duracion_semanas'] = 0;
  			endif;
  		else:
  			$this->data['Plan']['duracion_semanas'] = 0;
  		endif;
  		
  		
  		if (isset($this->data['Plan']['duracion_anios'])):
  			if ($this->data['Plan']['duracion_anios'] == ''): 
  				$this->data['Plan']['duracion_anios'] = 0;
  			endif;
  		else:
  			$this->data['Plan']['duracion_anios'] = 0;
  		endif;
  		
  		
  		return true;
  	}

  	function paginateCount($conditions = null, $recursive = 0)
  	{
		if ($this->asociarAnio)
		{
			$this->bindModel(array('hasOne' => array('Anio' => array('className'  => 'Anio','foreignKey' => 'plan_id',),),));
	        $field        = $this->getPagFields();
	        
	       	$selectFields = array("max(\"Anio\".\"ciclo_id\") AS Calculado__max_ciclo");
	       	$selectFields = array_merge($field, $selectFields); 

	        //debug($selectFields);
	        
	        $groupFields  = $field;
	        
	        if ($this->maxCiclo != "" )
	        {
	        	// le concateno al ultimo detalle del group el HAVING
	        	$groupFields = array_merge($groupFields ,array('1" HAVING max("Anio"."ciclo_id") = ' . $this->maxCiclo));
	        	//$groupFields[count($groupFields)-1] = $groupFields[count($groupFields)-1].'HAVING max("Anio"."ciclo_id") = "' . $this->maxCiclo;
	        	//$groupFields = array_merge($groupFields, array(" HAVING max(\"Anio\".\"ciclo_id\") = " . $this->maxCiclo));
	        }	
	        
	        $extra           = array('group' => $groupFields,'fields' => $selectFields);  	                    
        	$parameters      = compact('conditions');
        	$this->recursive = 0;

        	return count($this->find('all', array_merge($parameters, $extra)));
  		}
  		else
  		{
			$parameters = compact('conditions');

			if ($recursive != $this->recursive)
			{
				$parameters['recursive'] = $recursive;
			}

			$extra = array();

			return $this->find('count', array_merge($parameters, $extra));
  		}        	
    }

	function paginate($conditions = null, $fields = null, $order = null, $limit = null, $page = 1, $recursive = null, $tieneHasMany = false)
	{
		if ($this->asociarAnio)
		{
			$this->bindModel(array('hasOne' => array('Anio' => array('className'  => 'Anio','foreignKey' => 'plan_id',),),));
	        $field = $this->getPagFields();

	        $selectFields = array_merge($field , array("max(\"Anio\".\"ciclo_id\") AS Calculado__max_ciclo"));
	     //    debug($selectFields);
	        $groupFields  = $field;
	        
	        if ($this->maxCiclo != "" )
	        {
	        	//$groupFields[count($groupFields)-1] = $groupFields[count($groupFields)-1].'HAVING max("Anio"."ciclo_id") = "' . $this->maxCiclo;
	        	$groupFields = array_merge($groupFields ,array('1" HAVING max("Anio"."ciclo_id") = ' . $this->maxCiclo));
	        }	
	        
	        $extra      = array('group' => $groupFields,'fields' => $selectFields);
			$parameters = compact('conditions', 'fields', 'order', 'limit', 'page');

			if ($recursive != $this->recursive)
			{
				$parameters['recursive'] = $recursive;
    	    }

			return $this->find('all', array_merge($parameters, $extra));
		}
		else
		{
			$parameters = compact('conditions', 'fields', 'order', 'limit', 'page');

			if ($recursive != $this->recursive)
			{
				$parameters['recursive'] = $recursive;
			}

			$extra = array();

			return $this->find('all', array_merge($parameters, $extra));
		}
	}    	
   
	function setAsociarAnio($asociar)
	{
		$this->asociarAnio = $asociar;	
	}   

	function setMaxCiclo($ciclo)
	{
		$this->maxCiclo = $ciclo;	
	}   
	
	function dameMatriculaDeCiclo($plan_id,$ciclo){
		$tot = $this->Anio->find('all',array(
			'fields'=>'sum(matricula) AS "Anio__matricula"',
			'conditions'=> array('plan_id'=>$plan_id,'ciclo_id'=>$ciclo),
			'limit'=> 1
		));
		return $tot[0]['Anio']['matricula'];
	}
	
	function controlar_coincidencia_sector_subsector(){
  		if (isset($this->data[$this->name]['subsector_id'])){
  			if ($this->data[$this->name]['subsector_id'] == ''){
  				$this->data[$this->name]['subsector_id'] = 0;
  				return true;
  			}
  			
  			if ($this->data[$this->name]['subsector_id'] == 0) return true;
  			
  			if ($this->data[$this->name]['subsector_id'] != ''){
		  		$sector_id = $this->data[$this->name]['sector_id'];
		  		$subsector_id = $this->data[$this->name]['subsector_id'];
		  		$this->Subsector->recursive = -1;
		  		$tot = $this->Subsector->find('count',array('conditions'=> array('Subsector.id'=>$subsector_id, 'Subsector.sector_id'=>$sector_id)));
		  		return ($tot > 0);
  			}
  		}
  		return false;
  	}
  	
  	
  	
  	//TODO validar la oferta con la clase de institucion
  	function validar_oferta_id_con_claseinstit()
  	{
		return true;
  		
  	}
	
}
?>