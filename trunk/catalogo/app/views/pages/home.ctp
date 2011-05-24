<h1>Bienvenidos</h1>
<div class="grid_9 alpha">
    <cite class="bigquote">
        Necesitamos que todos los argentinos tengan una educaci�n de calidad y en particular los t�cnicos porque sabemos que las tecnolog�as van cambiando d�a a d�a, as� que, hay que contextualizar las escuelas t�cnicas y tambi�n que los chicos nuestros tengan una alta calificaci�n que les permita complementar la formaci�n acad�mica con la transformaci�n tecnol�gica y estar mejor preparados para el mundo laboral
    </cite>
</div>
<div class="grid_3 omega"><?php echo $html->image('/css/img/me_trans.png')?></div>


<div class="buscadores grid_12 alpha">
    <div class="grid_12 alpha omega">
    <h2 class="separador uppercase grid_4 alpha">B�squedas por Perfiles</h2>
    </div>
    
    <div class="boxblanca box_grid_4 alpha">
        <h3>Estudiantes</h3>        
        <h2>Gu�a del Estudiante</h2>
        
        <?php echo $html->link('m�s informaci�n', 
                array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'),
                array('class'=>'mas_info_gris'));?>
                
        <p>
           Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados
        </p>

    </div>
    
    <div class="boxblanca grid_8 omega">
        <h3 class="grid_8" style="margin-bottom: 0px;">Organizaciones/Empresas/Entes Gubernamentales</h3>
        <div class="box_grid_4 alpha omega" style="border-right: solid #dcddde 1px; padding-right: 10px; margin-right: 9px;">                   
            <h2>Buscador de Instituciones</h2>
            <?php echo $html->link('m�s informaci�n', 
                    array('controller'=>'instits', 'action'=>'search_form'),
                    array('class'=>'mas_info_gris'));?>
            <p>
               Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados
            </p>
        </div>
        
        
        <div class="box_grid_4 alpha omega">
            <h2>Buscador de T�tulos</h2>
            <?php echo $html->link('m�s informaci�n', 
                    array('controller'=>'titulos', 'action'=>'search'),
                    array('class'=>'mas_info_gris'));?>
            <p>
               Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados
            </p>
        </div>
        
    </div>
</div>


<div class="buscadores">
    <div class="grid_12 alpha omega">
        <br />
        <h2 class="uppercase">B�squedas por Oferta</h2>
    </div>
    
    <div class="box_grid_4 boxgris alpha">
            <h2 class="grid_4">Formaci�n Profesional</h2>
            
            <?php echo $html->link('m�s informaci�n', 
                array('controller'=>'titulos', 'action'=>'search', FP_ID),
                array('class'=>'mas_info_azul'));?>
            
            <p>
                �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
            </p>
            
            
    </div>
    
    
    <div class="box_grid_4 boxgris">
            <h2>Secundario T�cnico</h2>
            
            <?php echo $html->link('m�s informaci�n', 
                array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID),
                array('class'=>'mas_info_azul'));?>
            <p>
               �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
            </p>
            
            
    </div>
    
    <div class="box_grid_4 boxgris omega">
            <h2>Superior T�cnico</h2>
            
            <?php echo $html->link('m�s informaci�n', 
                array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID),
                array('class'=>'mas_info_azul'));?>
            <p>
                �Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda
            </p>
            
            
    </div>
    
</div>


<div class="clear"></div>



<div class="grid_12 alpha">
    <br />
    <h2>El Rol del Cat�logo Nacional de T�tulos y Certificados</h2>
    
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