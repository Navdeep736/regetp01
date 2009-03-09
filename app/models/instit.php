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
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El CUE no puede quedar vacio.'
			),
			'number' => array(
				'rule' => VALID_NUMBER,
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Debe ingresar un valor num�ricos para el CUE.'
			
			),
			'between' => array(
				'rule' => array('between','6','7'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El cue esta compuesto por 6 o 7 d�gitos. La cantidad ingresada es incorrecta. Es de la forma: JJCCCCC (J= Jurisdicci�n; C= Cue).'
			
			), 
			
			/*
			 * Esta validacion controla que el cue sea ingersado correctamente. 
			 * En este caso, corrobora que los 2 primeros digitos correspondan a los
			 * codigos de cada provincia, establecidos tal como se utilizan en la 
			 * oficina de informacion 309
			 * 
			 * Expresion regular para codigos desde 10 (Catamarca) hasta el 94(Tierra del Fuego)
			 * (^[(10)(14)(18)(22)(26)(30)(34)(38)(42)(46)(50)(54)(58)(62)(66)(70)(74)(78)(82)(86)(90)(94)][0-9]{6}$)
			 * 
			 * Expresion regular para cogidos de 1 digito, 02(GCBA) y 06 (Bs As)
			 * (^[26][0-9]{5}$)
			 * 
			 */
			/* TODAVIA NO IMPLEMENTADO, NO FUNCIONA CORRECTAMENTE
			'jurisdiccion' => array(
				'rule' => '/^[(10)(14)(18)(22)(26)(30)(34)(38)(42)(46)(50)(54)(58)(62)(66)(70)(74)(78)(82)(86)(90)(94)][0-9]{6}$/',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El cue esta compuesto por 6 o 7 d�gitos. La cantidad ingresada es incorrecta. Es de la forma: JJCCCCC (J= Jurisdicci�n; C= Cue).'
			
			),
			*/
   		),
   		'anexo' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El N�mero de Anexo no puede quedar vacio.'
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
				'message' => 'El n�mero de anexo est� compuesto por 1 o 2 d�gitos.'
			
			)
   		),
   		'anio_creacion' => array(
   			'year' => array(
				'rule' => VALID_YEAR,
				'required' => false,
				'allowEmpty' => true,
				'message' => 'Debe ingresar un a�o de 4 d�gitos.'
			),
		),
		'direccion' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'La direcci�n no puede quedar vacia.'
			),
		),
		'depto' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Depto no puede quedar vacio.'
			),
		),
		'localidad' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'La Localidad no puede quedar vacia.'
			),
		),
		'cp' => array(
			'notEmpty' => array( // or: array('ruleName', 'param1', 'param2' ...)
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'El C�digo Postal no puede quedar vacio.'
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
				'message' => 'Debe ingresar formato de a�o, con 4 d�gitos.'	
			)
		),
		'ciclo_mod' => array(
			'notEmpty'=> array(
				'rule' => VALID_NOT_EMPTY,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Debe ingresar la fecha de modificaci�n.'	
			),
			'year'=> array(
				'rule' => VALID_YEAR,
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create', // or: 'update'
				'message' => 'Debe ingresar formato de a�o, con 4 d�gitos.'	
			)
		)
	);
	
}
?>