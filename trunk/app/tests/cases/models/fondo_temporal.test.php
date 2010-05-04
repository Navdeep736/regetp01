<?php 
/* SVN FILE: $Id$ */
/* Fondo Test cases generated on: 2010-04-22 10:25:00 : 1271942700*/
App::import('Model', 'FondoTemporal');

class FondotemporalTestCase extends CakeTestCase {
    var $FondoTemporal = null;
    var $tipoInstits = null;

    var $fixtures = array(
            'app.z_fondo_work', 'app.jurisdiccion', 'app.instit', 'app.claseinstit',
            'app.orientacion',  'app.sector', 'app.plan', 'app.subsector',
            'app.lineas_de_accion', 'app.fondos_lineas_de_accion',
            'app.tipoinstit', 'app.dependencia', 'app.departamento', 'app.localidad',
            'app.etp_estado', 'app.oferta', 'app.titulo', 'app.anio', 'app.ciclo',
            'app.etapa', 'app.gestion', 'app.historial_cue', 'app.ticket', 'app.user',
            'app.user_login', 'app.fondo',
    );

    function startTest() {
        /*
        * @var FondoTemporal
        */
        $this->FondoTemporal =& ClassRegistry::init('FondoTemporal');
        $this->Tipoinstit =& ClassRegistry::init('Tipoinstit');

        // trae todos los tipoInstits
        $this->Tipoinstit->recursive = 0;
        $this->tipoInstits = $this->Tipoinstit->find("all", array(
                'order'=> array('LENGTH(Tipoinstit.name)'=>'desc')
            ));
    }

    function testFondoInstance() {
        $this->assertTrue(is_a($this->FondoTemporal, 'FondoTemporal'));
    }

    function testCompara_numeroInstit() {
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N� 63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N� 63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N\' 63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N�63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N�63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('BLA N|63','63'));
        $this->assertTrue($this->FondoTemporal->compara_numeroInstit('ET- Agro - Snopek','63'));

        $this->assertFalse($this->FondoTemporal->compara_numeroInstit('BLA N� 73','63'));
    }

    function testCompara_tipoInstit() {
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('EET N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('E.E.T. N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('eet N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('e.e.t. N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('escuela N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_tipoInstit('centro fp N� 15 Maip�', $this->tipoInstits));

        $this->assertFalse($this->FondoTemporal->compara_tipoInstit('Esc Ed T N� 15 Maip�', $this->tipoInstits));
    }

    function testCompara_institNombres() {
        $this->assertTrue($this->FondoTemporal->compara_institNombres('EET N� 15 Maip�', 'EET N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_institNombres('EET N� 15 Maip�', 'eet N� 15 Meip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_institNombres('C.E.N.T. N� 2 Clotilde Mercedes G. De Fern�ndez', 'CENT N� 2 Clotilde Mercedes G. De Fern�ndez', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_institNombres('C.E.N.T. N� 2 Clotilde Mercedes G. De Fern�ndez', 'CENT N� 2 Clotilde g De Fern�ndez', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_institNombres('Esc N� 15 Maip�', 'EET N� 15 Maip�', $this->tipoInstits));
        $this->assertTrue($this->FondoTemporal->compara_institNombres('C.E.N.T. N� 2 Clotilde Mercedes G. De Fern�ndez - anexo', 'CENT N� 2 Clotilde Mercedes G. De Fern�ndez - anexo', $this->tipoInstits));

        $this->assertFalse($this->FondoTemporal->compara_institNombres('EET N� 15 Maip�', 'eet N� 15 Meeip�', $this->tipoInstits));
        $this->assertFalse($this->FondoTemporal->compara_institNombres('Esc Ed T N� 15 Maip�', 'EET N� 15 Maip�', $this->tipoInstits));
        $this->assertFalse($this->FondoTemporal->compara_institNombres('ET N� 1 - Santa Luc�a', 'ET N� 1 - Anexo Santa Luc�a', $this->tipoInstits));
        $this->assertFalse($this->FondoTemporal->compara_institNombres('C.E.N.T. N� 2 Clotilde Mercedes G. De Fern�ndez', 'CENT N� 2 Clotilde Mercedes G. De Fern�ndez anexo', $this->tipoInstits));
        $this->assertFalse($this->FondoTemporal->compara_institNombres('C.E.N.T. N� 2 Clotilde Mercedes G. De Fern�ndez - anexo', 'CENT N� 2 Clotilde Mercedes G. De Fern�ndez', $this->tipoInstits));
    }
    
}
?>