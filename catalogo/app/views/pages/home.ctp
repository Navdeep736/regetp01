<?php echo $html->css('catalogo.home', false);?>

<h1 class="grid_12">El Cat�logo Nacional de T�tulos y Certificaciones</h1>

<div class="grid_9">
    <p>
        En funci�n de la mejora continua de la calidad de la educaci�n t�cnico profesional cr�ase, 
en el �mbito del Instituto Nacional de Educaci�n Tecnol�gica, el Registro Federal de Instituciones de 
Educaci�n T�cnico Profesional y el Cat�logo Nacional de T�tulos y Certificaciones y establ�cese el proceso de 
la Homologaci�n de T�tulos y Certificaciones. Dichos instrumentos, en forma combinada, permitir�n: 
    </p>
    
    <ul>
        <li>
            Garantizar el derecho de los estudiantes y de los egresados a la formaci�n y al reconocimiento, en todo el 
territorio nacional, de estudios, certificaciones y t�tulos de calidad equivalente. 
        </li>
        
        <li>
            Definir los diferentes �mbitos institucionales y los distintos niveles de certificaci�n y titulaci�n de la 
educaci�n t�cnico profesional. 
        </li>
        
        <li>
            Propiciar la articulaci�n entre los distintos �mbitos y niveles de la educaci�n t�cnico-profesional. 
        </li>
        
        <li>
            Orientar la definici�n y el desarrollo de programas federales para el fortalecimiento y mejora de las 
instituciones de educaci�n t�cnico profesional. 
        </li>
    </ul>
</div>

<?php echo $html->image('/css/img/me_trans.png', array('class' => 'grid_3'))?>


    
<h2 class="separador grid_4">B�squedas por Perfiles</h2>
<div class="clear"></div>

<div class="boxblanca grid_4">
    <div class="box_pad_wrapper">
    <h3>Estudiantes</h3>        
    <h4>Gu�a del Estudiante</h4>

    <?php echo $html->link('m�s informaci�n', 
            array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'),
            array('class'=>'mas_info_gris'));?>
    <p>
       Aqu� podr�s encontrarar lugares donde estudiar y obtener un t�tulo o certificaci�n.
    </p>
    </div>
</div>
    
<div class="boxblanca grid_8">
    <h3 style="margin-left: 10px; margin-bottom: 0px;">Empresas, Profesionales, Funcionarios, Otros</h3>
    <div class="grid_4 alpha" style="">                   
        <div class="box_pad_wrapper">
            <h4>Buscador de T�tulos</h4>
            <?php echo $html->link('m�s informaci�n', 
                    array('controller'=>'titulos', 'action'=>'search'),
                    array('class'=>'mas_info_gris'));?>
            <p>
               Mediante este buscador se puede obtener un listado de t�tulos o certificaciones de Educaci�n T�cnico Profesonal
            </p>
        </div>
    </div>


    <div class="grid_4 alpha omega" style="margin-left: -1px; border-left: solid #dcddde 1px;">
        <div class="box_pad_wrapper" style="margin-left: 10px; padding-right: 0px;">
            <h4>Buscador de Instituciones</h4>
        <?php echo $html->link('m�s informaci�n', 
                array('controller'=>'instits', 'action'=>'search_form'),
                array('class'=>'mas_info_gris'));?>
        <p>
           Mediante este buscador se obtiene un listado de instituciones del Registro Federal de Instituciones de Educaci�n T�cnico Profesonal
        </p>
        </div>
    </div>

</div>


<h2 class="grid_12">B�squedas por Oferta</h2>
    
<div class="clear"></div>

<div class="grid_4 boxgris">
    <div class="box_pad_wrapper">
        <h4>Formaci�n Profesional</h4>

        <?php echo $html->link('m�s informaci�n', 
            array('controller'=>'titulos', 'action'=>'search', FP_ID),
            array('class'=>'mas_info_azul'));?>

        <p>
            �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
        </p>
    </div>
</div>
    
    
<div class="grid_4 boxgris">
     <div class="box_pad_wrapper">
    <h4>Secundario T�cnico</h4>

    <?php echo $html->link('m�s informaci�n', 
        array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID),
        array('class'=>'mas_info_azul'));?>
    <p>
       �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
    </p>
     </div>

</div>
    
<div class="grid_4 boxgris">
    <div class="box_pad_wrapper">
    <h4>Superior T�cnico</h4>

    <?php echo $html->link('m�s informaci�n', 
        array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID),
        array('class'=>'mas_info_azul'));?>
    <p>
        �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
    </p>
     </div>
</div>
    

