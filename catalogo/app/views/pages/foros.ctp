
<?php echo $this->element('menu_docs')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Foros sectoriales</h2>
        
        
        <p>
        La ley 26.058 crea tres instrumentos para la mejora continua de la calidad de la Educaci�n T�cnica Profesional: el Registro Federal de Instituciones de Educaci�n T�cnica Profesional, el proceso de Homologaci�n de T�tulos y Certificaciones y el Cat�logo Nacional de T�tulos y Certificaciones. Durante los �ltimos a�os, una de las tareas centrales del INET ha sido la construcci�n del Cat�logo Nacional de T�tulos y Certificaciones que, tal como indica la ley, se organiza en funci�n de las familias y perfiles profesionales adoptados para la definici�n de las ofertas formativas.
</p>

<p>
Si bien el Cat�logo es una n�mina de los t�tulos y/o certificaciones profesionales y sus propuestas curriculares que cumplen con las especificaciones reguladas por la ley para la educaci�n t�cnico profesional, su construcci�n no se reduce a una simple enumeraci�n de t�tulos y certificados pues tiene que estructurarse de modo que responda a dos l�gicas diferentes: la del mundo educativo y la del mundo del trabajo. 
</p>

<p>
Para asegurar la pertinencia productiva de los t�tulos y certificados que conforman el Cat�logo, se han convocado Foros Sectoriales. Se entiende por Foro Sectorial un grupo de trabajo cuyo objetivo ?en este caso- consiste en identificar diferentes funciones, posiciones y figuras laborales y en caracterizar los diferentes perfiles que permitan construir y ordenar las ofertas formativas correspondientes y enmarcarlas en las familias profesionales del sector.
 </p>
 
 <p>
La identificaci�n de familias profesionales responde a la necesidad de determinar carencias formativas en el mundo productivo y al mismo tiempo es un puente eficaz y v�lido para el desarrollo de pol�ticas de empleo. Por tanto, el Foro se constituye tanto como instancia proveedora de insumos como mecanismo de validaci�n de las ofertas que se generen. 
</p>

<p>
Estos Foros se constituyen en el marco del CoNETyP y est�n integrados por representantes de los trabajadores, empresarios, de instituciones de ciencia y tecnolog�a y por personas de reconocida trayectoria en la materia de los sectores de actividad de relevancia estrat�gica econ�mica seleccionados.
</p>

<p>
Para obtener m�s informaci�n sobre caracter�sticas, objetivos y modos de funcionamiento de los foros consulte el siguiente documento:
</p>
        
        <p><?echo $html->link('Ver metodolog�a','/pages/foros_metodologia');?></p>
        
        
        <h3>Foros</h3>
        
        <p style="color:red">Falta informe de: Informatica, Construcciones y Hoteleria y Gastronomia</p>

        <?php 
                
        
        $vops = array(
            'foroName' => 'Automotriz',
            'participantes' => array(
                'ACRABA',
                'APTA' ,
                'ATAAP' ,
                'ATRAR',
                'FNPT' ,
                'Ministerio de la Producci�n',
                'SMATA' ,
                'MTEySS',
                'UDA' ,
                'UTMAN' ,
                'FAATRA',
                'AMET',
                'UMAM',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Sector automotriz - Informe Final.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Energ�a El�ctrica',
            'participantes' => array(
                'ACYEDE', 'CADIME','APSE','EDENOR','EDESUR',
                'Ministerio de la Producci�n', 'ATEERA', 'TRANSENER', 
                'Sindicato de Luz y Fuerza', 'FATLyF', 'APSEE', 
                'FACT�c', 'FNPT'
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/INFORME SECTORIAL SECTOR ENERGIA ELECTRICA.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Est�tica Profesional',
            'participantes' => array(
                'Confederaci�n General de Peluqueros y Peinadores de la R:A:',
                'Federaci�n Nacional de Trabajadores de Peluquer�a y Afines.',
                'Confederaci�n Nacional de Patrones Peluqueros',
                'Escuela de Cosmetolog�a, Cosmiatr�a, Est�tica Corporal y Maquillaje. (Viviana Bustos)',
                'FACE',
                'APPYA',
                'Asociaci�n Argentina de Cosmetolog�a y Est�tica',
                'AMRA',
                'ANMAT',
                'Ministerio de Salud ',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Informe_sectorial_estetica_profesional.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Hort�cola',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/horticultura_informe_final.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        
        $vops = array(
            'foroName' => 'Inform�tica',
            'participantes' => array(
                'COORDIEP',
                'CPCI',
                'CESSI',
                'UDA',
                'Polo IT Buenos Aires',
                'SADIO',
                'USUARIA',
                'C�rdoba Technology, Cluster de Tecnolog�a de la Informaci�n',
                'Ministerio de la Producci�n',
                'COPITEC',
                'CICOMRA',
                'CEIL',
                'FNPT' ,
            ),
            'docInfoSectorial' => ''
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Madera y Mueble',
            'participantes' => array(
                'FAIMA',
                'INTI' ,
                'RITIM',
                'Ministerio de Producci�n',
                'AFOA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Metalmec�nica',
            'participantes' => array(
                'Ministerio de la Producci�n.',
                'CAME',
                'UOM',
                'UDA',
                'ASIMRA',
                'FNPT',
                'AMET' ,
                'ADIMRA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Producci�n Lechera',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Textil / Indumentaria',
            'participantes' => array(
                'Asociaci�n Confeccionistas de Pergamino',
                'FAIIA',
                'Uni�n Cortadores de la Indumentaria',
                'AAQCT',
                'INTI',
                'AOT',
                'Fundaci�n Pro-Tejer',
                'UIA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        ?>
        
       
    </div>
</div>