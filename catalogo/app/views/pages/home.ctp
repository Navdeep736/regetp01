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

<?php echo $html->image('/css/img/me_trans.png', array('class' => 'grid_3', 'style' => 'padding-top:35px;'))?>


    
<h2 class="separador grid_4">B�squeda por Perfiles</h2>
<div class="clear"></div>

<div class="grid_4">
    <div class="boxblanca">
        <div class="box_pad_wrapper">
        <h3>Estudiantes</h3>
        <h4><?php echo $html->link('Gu�a del Estudiante',array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'));?></h4>

        <?php echo $html->link('m�s informaci�n',
                array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'),
                array('class'=>'mas_info_gris'));?>
        <p>
           La Gu�a del Estudiante ayudar� a que puedas encontrarar donde estudiar y obtener un t�tulo o certificaci�n seg�n tus gustos e intereses.
        </p>
        </div>
    </div>
</div>
    
<div class="grid_8">
    <div class="boxblanca">
        <h3 style="margin-left: 10px; margin-bottom: 0px;">Empresas, profesionales, funcionarios y otros</h3>
        <div class="box_home_buscadores">
            <div class="box_pad_wrapper">
                <h4><?php echo $html->link('Buscador de T�tulos',array('controller'=>'titulos', 'action'=>'search'));?></h4>
                <?php echo $html->link('m�s informaci�n',
                        array('controller'=>'titulos', 'action'=>'search'),
                        array('class'=>'mas_info_gris'));?>
                <p>
                   Desde aqu� obtendr�s un listado de t�tulos o certificaciones de la Educaci�n T�cnico Profesional seg�n los criterios de b�squeda ingresados.
                </p>
            </div>
        </div>

        <div class="box_home_buscadores_separador">&nbsp;</div>

        <div class="box_home_buscadores">
            <div class="box_pad_wrapper" style="margin-left: 10px; padding-right: 0px;">
                <h4><?php echo $html->link('Buscador de Instituciones',array('controller'=>'instits', 'action'=>'search_form'))?></h4>
            <?php echo $html->link('m�s informaci�n',
                    array('controller'=>'instits', 'action'=>'search_form'),
                    array('class'=>'mas_info_gris'));?>
            <p>
               Desde aqu� obtendr�s un listado de instituciones del Registro Nacional Educaci�n T�cnico Profesional seg�n los criterios de b�squeda ingresados.
            </p>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>


<h2 class="grid_12">B�squeda por Oferta</h2>
    
<div class="clear"></div>
    
<div class="grid_4 boxgris">
     <div class="box_pad_wrapper">
    <h4><?php echo $html->link('Secundario T�cnico',array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID));?></h4>

    <?php echo $html->link('m�s informaci�n', 
        array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID),
        array('class'=>'mas_info_azul'));?>
    <p>
       Esta opci�n sirve para obtener informaci�n sobre t�tulos de tecnicaturas de nivel medio.
    </p>
     </div>

</div>
    
<div class="grid_4 boxgris">
    <div class="box_pad_wrapper">
    <h4><?php echo $html->link('Superior T�cnico', array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID));?></h4>

    <?php echo $html->link('m�s informaci�n', 
        array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID),
        array('class'=>'mas_info_azul'));?>
    <p>
        Esta opci�n sirve para obtener informaci�n sobre t�tulos de tecnicaturas de nivel superior.
    </p>
     </div>
</div>


<div class="grid_4 boxgris">
    <div class="box_pad_wrapper">
        <h4><?php echo $html->link('Formaci�n Profesional', array('controller'=>'titulos', 'action'=>'search', FP_ID));?></h4>

        <?php echo $html->link('m�s informaci�n', 
            array('controller'=>'titulos', 'action'=>'search', FP_ID),
            array('class'=>'mas_info_azul'));?>

        <p>
        Esta opci�n sirve para obtener informaci�n sobre certificaciones de formaci�n profesional y educaci�n continua.        </p>
    </div>
</div>
    

