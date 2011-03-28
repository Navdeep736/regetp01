<?php
/* Anio Fixture generated on: 2010-04-29 09:04:46 : 1272544006 */
class AnioFixture extends CakeTestFixture {
	var $name = 'Anio';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
		'plan_id' => array('type' => 'integer', 'null' => false),
		'ciclo_id' => array('type' => 'integer', 'null' => false),
		'anio' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'etapa_id' => array('type' => 'integer', 'null' => false),
		'matricula' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'secciones' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'hs_taller' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'estructura_planes_anio_id' => array('type' => 'integer', 'null' => false),
                'created' => array('type' => 'datetime', 'null' => true),
		'modified' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
	);

	var $records = array(
		array(
			'id' => 1,
			'plan_id' => 1,
			'ciclo_id' => 2009,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 2,
			'plan_id' => 1,
			'ciclo_id' => 2009,
			'anio' => 2,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 3,
			'plan_id' => 1,
			'ciclo_id' => 2009,
			'anio' => 3,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 4,
			'plan_id' => 1,
			'ciclo_id' => 2009,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 54,
			'plan_id' => 1,
			'ciclo_id' => 2009,
			'anio' => 2,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 45,
			'plan_id' => 1,
			'ciclo_id' => 2010,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 46,
			'plan_id' => 1,
			'ciclo_id' => 2010,
			'anio' => 2,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 6,
			'plan_id' => 2,
			'ciclo_id' => 2009,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 6456,
			'plan_id' => 2,
			'ciclo_id' => 2009,
			'anio' => 2,
			'etapa_id' => 2,
			'matricula' => 6,
			'secciones' => 7,
			'hs_taller' => 8,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 7,
			'plan_id' => 2,
			'ciclo_id' => 2006,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array (
                        'id' => 77,
			'plan_id' => 3,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 2,
			'secciones' => 2,
			'hs_taller' => 2,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 8,
			'plan_id' => 3,
			'ciclo_id' => 2006,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 9,
			'plan_id' => 3,
			'ciclo_id' => 2006,
			'anio' => 2,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 10,
			'plan_id' => 4,
			'ciclo_id' => 2006,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 11,
			'plan_id' => 4,
			'ciclo_id' => 2006,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 12,
			'plan_id' => 4,
			'ciclo_id' => 2006,
			'anio' => 1,
			'etapa_id' => 1,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 13,
			'plan_id' => 4,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 14,
			'plan_id' => 4,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 15,
			'plan_id' => 7,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 16,
			'plan_id' => 7,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 17,
			'plan_id' => 7,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 18,
			'plan_id' => 7,
			'ciclo_id' => 2007,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
                        'estructura_planes_anio_id' => 0,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
            array(
			'id' => 19,
			'plan_id' => 8,
			'ciclo_id' => 2007,
                        'estructura_planes_anio_id' => 7,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),
             array(
			'id' => 20,
			'plan_id' => 8,
			'ciclo_id' => 2008,
                        'estructura_planes_anio_id' => 8,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 1,
			'secciones' => 1,
			'hs_taller' => 1,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),

            array(
			'id' => 21,
			'plan_id' => 10,
			'ciclo_id' => 2008,
                        'estructura_planes_anio_id' => 8,
			'anio' => 1,
			'etapa_id' => 2,
			'matricula' => 55,
			'secciones' => 7,
			'hs_taller' => 3,
			'created' => '2010-04-29 09:26:46',
			'modified' => '2010-04-29 09:26:46'
		),

	);
}
?>