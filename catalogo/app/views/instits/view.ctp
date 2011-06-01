<?php

    echo $html->css('catalogo.instits', false);
    //echo $html->css('catalogo.titulos', false);
    $cue_instit = ($instit['Instit']['cue']*100)+$instit['Instit']['anexo'];
?>

<h2 class="grid_12"><?php echo $cue_instit ?> <?php echo $instit['Instit']['nombre_completo'] ?></h2>

<br />
<div class="grid_12 boxblanca">
        <dl class="grid_5 prefix_1 alpha">
            <?php if($instit['Instit']['claseinstit_id']) {?>
                    <dt><?php __('Tipo de Instituci�n'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Claseinstit']['name'])) {
                            echo $instit['Claseinstit']['name'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>
            <?php }?>


            <? if($instit['Orientacion']['name']) {?>
                    <dt ><?php __('Orientaci�n'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Orientacion']['name'])) {
                            echo $instit['Orientacion']['name'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>
            <? } ?>
                <dt ><?php __('�mbito de Gesti�n'); ?>:</dt>
                <dd>
                    <?php
                    if(!empty($instit['Gestion']['name'])) {
                        echo $instit['Gestion']['name'];
                    }else {
                        echo "<i>No declarado</i>";
                    } ?>
                </dd>

                <dt><?php __('Tipo de Dependencia'); ?>:</dt>
                <dd>
                    <?php
                    if(!empty($instit['Dependencia']['name'])) {
                        echo $instit['Dependencia']['name'];
                    }else {
                        echo "<i>No declarado</i>";
                    } ?>
                </dd>
                <?php if(!$con_programa_de_etp){?>
                    <dt>
                        <?php echo $relacion_etp; ?>
                    </dt>
                    <dd>&nbsp;</dd>
                <?php }?>
        </dl>  
    
        <dl class="grid_5 omega">
            <dt><?php __('Direcci�n'); ?>:</dt>
            <dd>
            <?php
                if(!empty($instit['Instit']['direccion'])) {
                    echo $instit['Instit']['direccion'].", ";
                }
                if(!empty($instit['Instit']['lugar'])) {
                    echo $instit['Instit']['lugar'].", ";
                }
                if(!empty($instit['Localidad']['name'])) {
                    echo $instit['Localidad']['name'].", ";
                }
                if(!empty($instit['Departamento']['name'])) {
                    echo $instit['Departamento']['name'].", ";
                }
                if(!empty($instit['Jurisdiccion']['name'])) {
                    echo $instit['Jurisdiccion']['name'];
                }
            ?>
            </dd>

                <dt><?php __('C�digo Postal'); ?>:</dt>
                <dd>
                    <?php
                    if(!empty($instit['Instit']['cp'])) {
                        echo $instit['Instit']['cp'];
                    }else {
                        echo "<i>No declarado</i>";
                    } ?>
                </dd>

            <?php if($instit['Instit']['telefono']): ?>
                    <dt><?php __('Tel�fono'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['telefono'])) {
                                echo $instit['Instit']['telefono'];
                            }if(!empty($instit['Instit']['telefono_alternativo'])) {
                                echo ", ".$instit['Instit']['telefono_alternativo'];
                            } ?>
                    </dd>
            <?php endif;?>

            <?php if($instit['Instit']['mail']): ?>
                    <dt><?php __('E-Mail'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['mail'])) {
                                echo $instit['Instit']['mail'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
            <?php endif;?>
            <?php if($instit['Instit']['mail_alternativo']): ?>
                    <dt><?php __('E-Mail Alternativo'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['mail_alternativo'])) {
                                echo $instit['Instit']['mail_alternativo'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
            <?php endif;?>
            <?php if($instit['Instit']['web']): ?>
                    <dt><?php __('Web'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['web'])) {
                                echo $instit['Instit']['web'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
            <?php endif;?>
        </dl>
    </div>


    <h4 class="grid_12">T�tulos o Certificaciones que brinda la Instituci�n</h4>

    <div class="grid_9 boxblanca">
    <ul id="titulos-list">
    <?php 
        $ofertaAnt = '';
        foreach ($instit['Plan'] as $plan) { ?>
        
        <?
        if ($ofertaAnt != $plan['Titulo']['Oferta']['id'] ) {
            echo "<h4>". $plan['Titulo']['Oferta']['name'] ."</h4>";
            $ofertaAnt = $plan['Titulo']['Oferta']['id'];
        }
        
        // inicializo el nombre del titulo que voy a escribir
        $planTituloNombre = '';
        $planNombre = $plan['nombre'];        
        
        
        // si el titulo de referencia es distinto que el nombre del
        // plan se lo tengo que agregar entre parentesis
        // entonces quedaria: Asistente de Peluquero (Titulo: Peluquero)
        if ( trim(strtolower($planNombre)) != trim(strtolower($plan['Titulo']['name'])) ){
            
            $planNombre .= ' (' .  $plan['Titulo']['name'] . ')';
        }
        
        // si es FP le agrego la duracion
        $duracion = '';
        if (!empty($plan['duracion_hs'])){
            $duracion = '. <cite>Duraci�n:' . $plan['duracion_hs'] . ' hs.</cite>';
        }
        elseif (!empty($plan['duracion_semanas'])) {
            $duracion = '. <cite>Duraci�n:' . $plan['duracion_semanas']. ' semanas</cite>';
        }  
        
        $planNombre .= $duracion;
        
        
        // le agrego un link hacia el titulo de referencia
        $link = $html->link('Ver M�s' , array(
            'controller' => 'titulos', 
            'action' => 'view', 
            $plan['Titulo']['id']
            ), array(
                'title' => 'Ver m�s informaci�n del t�tulo',
                'class' => 'mas_info_gris_small',
            ));
        $planNombre .= $link;
        ?>
            
        <li><?php echo $planNombre?></li>

                
    <?php }?>
        </ul>
    </div>
    <?php

        echo $html->link(
                'Si ha notado alg�n dato desactualizado, haga click aqu�',
                '/correos/contacto',
                array(
                   'class'         => "grid_3 boxgris alerta-desactualizada",
                   'instit-nombre' => $instit['Instit']['nombre_completo'],
                   'instit-cue'    => $cue_instit,
                ));
    ?>