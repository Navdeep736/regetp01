<?php
require_once('cake_web_test_case_with_fixtures.php');

class CompleteWebTestCase extends CakeWebTestCaseWithFixtures {
    var $baseUrl = "regetp";
    var $fixtures = array(
        'app.z_fondo_work', 'app.jurisdiccion', 'app.instit', 'app.claseinstit',
        'app.orientacion',  'app.sector', 'app.plan', 'app.subsector',
        'app.tipoinstit', 'app.dependencia', 'app.departamento', 'app.localidad',
        'app.etp_estado', 'app.oferta', 'app.titulo', 'app.anio', 'app.ciclo',
        'app.etapa', 'app.gestion', 'app.historial_cue', 'app.user',
        'app.user_login', 'app.fondo', 'app.estructura_plan', 'app.estructura_planes_anio',
        'app.jurisdicciones_estructura_plan', 'app.user', 'app.aco', 'app.aro', 'app.aros_acos'
    );


    function enterApplication() {
        $this->get('http://' . $_SERVER['HTTP_HOST'] . '/' . $this->baseUrl);
        //$this->assertText('Registro Federal de Instituciones de Educaci�n T�cnico Profesional (RFIETP)');
    }

    function getBlankLoginForm() {
        $this->get("http://localhost/regetp/users/login");
        $this->assertField('data[User][username]', '');
        $this->assertField('data[User][password]', '');
    }

    function testIncorrectLogin() {
        /*$this->getBlankLoginForm();
        $this->setField('data[User][username]', 'FOO');
        $this->setField('data[User][password]', 'BAR');

        $this->clickSubmit('Entrar');
        $this->assertText('Usuario o Contrase�a Incorrectos');
        */
        $data = array(
              "data[User][username]" => "avilarconsulta",
              "data[User][password]" => "123"
        );

        $this->post("http://localhost/regetp/users/login", $data);

        $this->assertText('Usuario o Contrase�a Incorrectos');
    }

    function testCorrectLogin() {
        $data = array(
              "data[User][username]" => "avilar",
              "data[User][password]" => "prueba"
        );

        $this->post("http://localhost/regetp/users/login", $data);

        $this->assertNoText('Usuario o Contrase�a Incorrectos');
    }

    function testCreateInstit(){
            $this->getBlankLoginForm();
            $this->setField('data[User][username]', 'avilar');
            $this->setField('data[User][password]', 'prueba');
            $this->clickSubmit('Entrar');
            $this->assertNoText('Usuario o Contrase�a Incorrectos');

            $data = array(
                "data[Instit][activo]" => "1",
                "data[Instit][cue]" => "1436899",
                "data[Instit][anexo]" => "0",
                "data[Instit][esanexo]" => "0",
                "data[Instit][gestion_id]" => "1",
                "data[Instit][dependencia_id]" => "1",
                "data[Instit][nombre_dep]" => "Dep 3",
                "data[Instit][claseinstit_id]" => "3",
                "data[Instit][etp_estado_id]" => "2",
                "data[Instit][orientacion_id]" => "",
                "data[Instit][jurisdiccion_id]" => "14",
                "data[Instit][departamento_id]" => "173",
                "data[Instit][localidad_id]" => "457",
                "data[Instit][lugar]" => "Comuna 12",
                "data[Instit][tipoinstit_id]" => "96",
                "data[Instit][nombre]" => "Jose Saturnino Cardozo",
                "data[Instit][nroinstit]" => "23",
                "data[Instit][anio_creacion]" => "1990",
                "data[Instit][direccion]" => "Amuchin 2234",
                "data[Instit][cp]" => "234",
                "data[Instit][telefono]" => "234-234234",
                "data[Instit][telefono_alternativo]" => "234-224234",
                "data[Instit][mail]" => "astorcin@amu.com",
                "data[Instit][mail_alternativo]" => "jojo@amu.com",
                "data[Instit][web]" => "www.tacuara.com",
                "data[Instit][dir_nombre]" => "Justiniano Molina",
                "data[Instit][dir_tipodoc_id]" => "1",
                "data[Instit][dir_nrodoc]" => "23423423",
                "data[Instit][dir_telefono]" => "234233",
                "data[Instit][dir_mail]" => "justi@js.com",
                "data[Instit][vice_nombre]" => "Amor Ameal",
                "data[Instit][vice_tipodoc_id]" => "1",
                "data[Instit][vice_nrodoc]" => "12323123",
                "data[Instit][actualizacion]" => "2010",
                "data[Instit][observacion]" => "prueba testing!",
                "data[Instit][ciclo_alta]" => "2010"
            );
            //$this->Auth->password("yu27bu");
            $this->post("http://localhost/regetp/instits/add", $data);

            //$this->assertNoText('La Instituci�n no pudo ser guardada');
            $this->assertText('Se ha guardado la Instituci�n');
            $this->assertText('permisos');
    }


}

?>