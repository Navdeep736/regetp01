<?php
class Instit extends AppModel {

	var $name = 'Instit';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Gestion' => array('className' => 'Gestion',
								'foreignKey' => 'gestion_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Dependencia' => array('className' => 'Dependencia',
								'foreignKey' => 'dependencia_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Tipoinstit' => array('className' => 'Tipoinstit',
								'foreignKey' => 'tipoinstit_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Jurisdiccion' => array('className' => 'Jurisdiccion',
								'foreignKey' => 'jurisdiccion_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Plan' => array('className' => 'Plan',
								'foreignKey' => 'instit_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

	var $validate = array(
      	'cue' => array(		

			/**
			 * Aca se verifica que los numeros iniciales del  CUE sean
			 * macheados con la jurisdiccion para comprobar la validez del CUE.
			 * 
			 */
			'jurisdiccion_y_cue_match' => array(
				'rule' => array('controlar_coincidencia_cue_jurisdiccion'),
				'message'=> 'El CUE no corresponde a la Jurisdicci�n.'
			),
			
			/*
			 * Esta validacion controla que el cue sea ingersado correctamente. 
			 * En este caso, corrobora que los 2 primeros digitos correspondan a los
			 * codigos de cada provincia, establecidos tal como se utilizan en la 
			 * oficina de informacion 309
			 * 
			 * 
			 */
			'jurisdiccion_correcta' => array(
				'rule' => '/^(2|6|10|14|18|22|26|30|34|38|42|46|50|54|58|62|66|70|74|78|82|86|90|94)[0-9]{5}$/',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El CUE ingresado no es v�lido. No concuerda con el c�digo de jurisdicci�n'
			
			),
			
			
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El CUE no puede quedar vac�o.'
			),
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Debe ingresar un valor num�rico para el CUE.'
			
			),
			'between' => array(
				'rule' => array('between','6','7'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El CUE debe ser de 6 � 7 d�gitos. No es necesario el cero inicial en CUEs de 6 d�gitos. Ej: 600118, 5000216.'
			
			)		
   		),
   		'anexo' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El N�mero de Anexo no puede quedar vac�o.'
			),
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Debe ingresar un n�mero de Anexo.'
			
			),
			'between' => array(
				'rule' => array('between','1','2'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'V�lidos: 0 a 99.'
			
			)	
   		),
   		'anio_creacion' => array(
   			'year' => array(
				'rule' => VALID_YEAR,
				'required' => false,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un a�o de 4 d�gitos. Si no conoce la fecha de creaci�n, debe dejar el campo vac�o.'
			),
		),
		'direccion' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'La direcci�n no puede quedar vac�a.'
			),
		),
		'depto' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El Departamento no puede quedar vac�o.'
			),
		),
		'localidad' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'La Localidad no puede quedar vac�a.'
			),
		),
		'cp' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El C�digo Postal no puede quedar vac�o.'
			),
		),
		'mail' => array(
			'email' => array(
				'rule' => VALID_EMAIL,
				'required' => false,
				'allowEmpty' => true,
				//'on' => 'create', // or: 'update'
				'message' => 'La direcci�n de e-mail no es v�lida.'
			)
		),
   		'dir_nrodoc' => array(
   			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => false,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un valor num�rico.'
			),
		),
		'dir_mail' => array(
			'email' => array(
				'rule' => VALID_EMAIL,
				'required' => false,
				'allowEmpty' => true,
				//'on' => 'create', // or: 'update'
				'message' => 'La direcci�n de e-mail no es v�lida.'
			)
		),
		'vice_nrodoc' => array(
   			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => false,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un valor num�rico.'
			),
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
				'message' => 'Debe ingresar formato de a�o, con 4 d�gitos. Ej: 2008.'	
			)
		),
		'observacion' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => array('maxLength',100),
				'required' => false,
				'allowEmpty' => true,
				//'on' => 'create', // or: 'update'
				'message' => 'La observaci�n no puede tener m�s de 100 caracteres.'
			)
		),
		'jurisdiccion_id' => array(
			'notEmpty' => array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Seleccione una Jurisdicci�n.'
			),
			'jurisdiccion' => array(
				'rule' => '/^(2|6|10|14|18|22|26|30|34|38|42|46|50|54|58|62|66|70|74|78|82|86|90|94)$/',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Seleccione una Jurisdicci�n.'
			
			)
		),
		'tipoinstit_id' => array(
			'notEmpty' => array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Seleccione un Tipo de Instituci�n.'
			),
		),
		'nombre' => array(
			'notEmpty' => array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El Nombre no puede quedar vac�o.'
			),
		)
	);
	
	
	
	function unbindModelAll() {
	    $unbind = array();
	    foreach ($this->belongsTo as $model=>$info)
	    {
	      $unbind['belongsTo'][] = $model;
	    }
	    foreach ($this->hasOne as $model=>$info)
	    {
	      $unbind['hasOne'][] = $model;
	    }
	    foreach ($this->hasMany as $model=>$info)
	    {
	      $unbind['hasMany'][] = $model;
	    }
	    foreach ($this->hasAndBelongsToMany as $model=>$info)
	    {
	      $unbind['hasAndBelongsToMany'][] = $model;
	    }
	    parent::unbindModel($unbind);
  	} 
  	
  	
  	function unbindModelosInnecesarios() {
	    $unbind = array();
	    foreach ($this->belongsTo as $model=>$info)
	    {
	      $unbind['belongsTo'][] = $model;
	    }
	    parent::unbindModel($unbind);
  	} 
  	
  	
  	/**
  	 * Validacion de CUE por jurisdiccion
  	 *
  	 * @return unknown
  	 */
  	function controlar_coincidencia_cue_jurisdiccion(){
  		$tam = strlen($this->data[$this->name]['cue']);
  		if($tam == 7){
  			$jur = substr($this->data[$this->name]['cue'],0,2);
  		} elseif($tam == 6){
  			$jur = substr($this->data[$this->name]['cue'],0,1);
  		}
  		else return false;
  		
  		return ($this->data[$this->name]['jurisdiccion_id'] == $jur)?true:false;
  	}
  	
	
}
?>