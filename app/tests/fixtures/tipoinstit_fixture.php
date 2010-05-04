<?php
/* Tipoinstit Fixture generated on: 2010-04-29 09:04:13 : 1272544033 */
class TipoinstitFixture extends CakeTestFixture {
	var $name = 'Tipoinstit';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
		'jurisdiccion_id' => array('type' => 'integer', 'null' => false),
		'name' => array('type' => 'string', 'null' => false, 'length' => 100),
	);

	var $records = array(
		array(
			'id' => 33,
                        'jurisdiccion_id' => 2,
                        'name' => 'ESCUELA DE EDUCACI�N T�CNICA (E.E.T.)'
		),
                array(
                        'id' => 9,
                        'jurisdiccion_id' => 2,
                        'name' => 'CENTRO EDUCATIVO DE NIVEL TERCIARIO (C.E.N.T.)'
		),
                array(
			'id' => 3,
                        'jurisdiccion_id' => 2,
                        'name' => 'ESCUELA POLIT�CNICA'
		),
                array(
			'id' => 8,
                        'jurisdiccion_id' => 2,
                        'name' => 'ESCUELA'
		),
                array(
			'id' => 18,
                        'jurisdiccion_id' => 2,
                        'name' => 'CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)'
		)
	);
}
?>