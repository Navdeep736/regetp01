<?
//echo $javascript->link('jquery-1.4.2.min');
echo $javascript->link('jquery.autocomplete');
echo $javascript->link('jquery.blockUI');
echo $javascript->link('jquery.meio.mask');
echo $html->css('jquery.autocomplete.css');
?>
<script type="text/javascript">
    var lineasDeAccion = new Array();
    lineasDeAccion[0] = '-- Seleccione --';
    <?
    foreach ($lineasDeAccion as $key=>$value) {
    ?>
        lineasDeAccion[<?=$key?>] = '<?=$value?>';
    <?
    }
    ?>

    var lineasDeAccionOriginales = lineasDeAccion;


    jQuery(document).ready(function() {

        <?php if (!empty($this->data['Fondo']) && empty($this->data['Fondo']['instit_id'])) {?>
            jQuery('#FondoTipo').val('j');
        <? }?>

        CambiaTipoFondo();

        jQuery(document).ajaxStart(function() {
            jQuery.blockUI({ message: '<h1>Buscando...</h1>',overlayCSS: { backgroundColor: '#00f' }, showOverlay: true });
        });

        jQuery(document).ajaxStop(jQuery.unblockUI);

        jQuery("#FondoPosibleInstit").autocomplete("<?echo $html->url(array('controller'=>'fondo_temporales','action'=>'search_instits'));?>", {
		dataType: "json",
		parse: function(data) {
			return jQuery.map(data, function(instit) {
				return {
					data: instit,
					value: instit.nombre,
					result: instit.nombre
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {
                jQuery("#hiddenInstitId").remove();
                jQuery("#FondoEditForm fieldset #institCueInfo").remove();
                jQuery("#FondoEditForm fieldset .institCueInfo").remove();

                var div = "<div id='institCueInfo' class='institCueInfo'>" +
                              "<h4> Informacion sobre la Institucion </h4>" +
                              "<div><strong>CUE: </strong>" + item.cue + "</div>" +
                              "<div><strong>Nro.Instit: </strong>" + item.nroinstit + "</div>" +
                              "<div><strong>Tipo de Institucion: </strong>" + item.tipo + "</div>" +
                              "<div><strong>A�o de Creacion: </strong>" + item.anio_creacion + "</div>" +
                              "<div><strong>Direccion: </strong>" + item.direccion + "</div>" +
                              "<div><strong>Departamento: </strong>" + item.depto + "</div>" +
                              "<div><strong>Localidad: </strong>" + item.localidad + "</div>" +
                              "<div><strong>Jurisdiccion: </strong>" + item.jurisdiccion + "</div>" +
                              "<div><strong>Codigo Postal: </strong>" + item.cp + "</div>" +
                              "<div><strong>CUE anterior: </strong>" + item.cue_anterior + "</div>" +
                          "</div>";

                jQuery("#FondoEditForm fieldset").append(div);

                jQuery("#FondoInstitId").val(item.id);
                jQuery("#FondoJurisdiccionId").val(item.jurisdiccion_id);

        });

        /** ** funciones de lineas de accion ** **/
        jQuery("#agregar_nueva_linea").click(function(){

            nueva_linea = jQuery(".lista_lineas dl #detalle .nueva_linea").first();
            if(nueva_linea.length != 0){
                agregarLinea(nueva_linea);
            }

            html = "<span class='nueva_linea' style='display:none'>" +
                        "<span class='nueva_linea_in'>" +
                            "<dt onmouseout='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' onmouseover='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' class='' style='height: 30px;'>" +
                                "<span>" +
                                    '<?php echo $html->image('/img/check.gif', array('id'=>'check_linea','alt' => 'Confirmar', 'onclick'=>'agregarLinea(jQuery(this).parent().parent().parent().parent().parent());'))?>' +
                                    '<?php echo $html->image('/img/delete.png', array('alt' => 'Borrar','onclick'=>'jQuery(this).parent().parent().parent().parent().remove(); ActualizarTotal(); actualizarComboLineasDeAccion();'))?>' +
                                "</span>" +
                                "<span>" +
                                    "<select class='linea_de_accion_id' style='width:400px'>";
            jQuery.each(jQuery(lineasDeAccion), function(key, value) {
                if (value) {
                    html += '<option value="'+key+'">'+value+'</option>';
                }
            });
            html +=                "</select>" +
                                "</span>" +
                            "</dt>" +
                            "<dd><input class='monto' alt='decimal' style='margin-top:-14px;width:100px' type='text' onkeypress ='agregarLineaConEnter(this,event);'/></dd>" +
                        "</span>" +
                    "</span>";
           jQuery(".lista_lineas dl #detalle").append(html);
           jQuery(".lista_lineas .nueva_linea").show();
           jQuery(".lista_lineas dl #detalle .nueva_linea .linea_de_accion_id").focus();

           jQuery(".lista_lineas dl #detalle .nueva_linea .monto").setMask("integer");
        });

        jQuery(document).keypress(function(e) {
            if (e.keyCode == 10 || e.keyCode == 13){
                return false;
            }
            if ((e.charCode == 43 || e.charCode == 107)){
                jQuery("#agregar_nueva_linea").click();
            }
        });

    });

    function format(instit) {
                return instit.nombre + " [" + instit.cue + "]";
    }

    function CambiaTipoFondo() {
        if (jQuery('#FondoTipo :selected').val() == 'i') {
            jQuery('#buscador_instit').show();
            jQuery('#jurisdiccional').hide();
        }
        else {
            jQuery('#jurisdiccional').show();
            jQuery('#buscador_instit').hide();
        }
    }

    function SumarLinasDeAccionMontos() {
        var total = 0;
        var valor_procesado = 0;
        jQuery.each(jQuery('.monto'), function(key, value) {
            valor_procesado = replaceAll(jQuery(value).val(),".","");
            total += parseFloat(valor_procesado);
        });

        return total;
    }

    function AsignarTotal() {
        jQuery('#FondoTotal').val(SumarLinasDeAccionMontos());
        return true;
    }

    function ActualizarTotal() {
        if (!isNaN(SumarLinasDeAccionMontos())) {
            jQuery('#total').html(jQuery.mask.string(SumarLinasDeAccionMontos(),"integer"));
        }
        else {
            jQuery('#total').html('<span style="color:red;">Error! Debe ingresar montos num�ricos</span>');
        }
    }

     function actualizarComboLineasDeAccion(idAdic) {
        var lineasDeAccionAux = new Array();
        var aEliminar = new Array();
        var idAdicional = '';

        if (arguments.length > 0) {
            idAdicional = arguments[0];
        }

        // recorre las ya utilizadas
        jQuery.each(jQuery('.linea_nombre'), function(key, value) {
            aEliminar[aEliminar.length] = jQuery(value).attr('id');
        });

        // elimina las ya utilizadas
        jQuery.each(jQuery(lineasDeAccionOriginales), function(keyLinea, valueLinea) {
            if (jQuery.inArray(keyLinea.toString(), aEliminar) == -1 || keyLinea == idAdicional) {
                lineasDeAccionAux[keyLinea] = valueLinea;
            }
        });

        lineasDeAccion = lineasDeAccionAux;

        return;
    }

    function replaceAll( text, busca, reemplaza ){
      while (text.toString().indexOf(busca) != -1)
          text = text.toString().replace(busca,reemplaza);
      return text;
    }


</script>
<div class="fondos form">

    <?php echo $form->create('Fondo', array('onsubmit'=>'return AsignarTotal();'));?>
    <fieldset>
        <?php
        if (empty($this->passedArgs['instit_id']) && empty($this->passedArgs['jurisdiccion_id'])) {
            echo $form->input("tipo", array(
                                                'label' => 'Tipo de Fondo',
                                                'options' => array('i'=>'Institucional','j'=>'Jurisdiccional'),
                                                'default' => array('i'),
                                                'onchange'=> 'CambiaTipoFondo();'
                 ));
        ?>

            <div id="buscador_instit">
            <?php
                echo $form->input('posible_instit', array('label'=>'Posible nombre o CUE de la institucion','value'=>($this->data['Instit']['cue'] * 100 + $this->data['Instit']['anexo'])));
            ?>
            </div>
            <div id="jurisdiccional">
            <?php
                echo $form->input('jurisdiccion_id', array('label'=>'Jurisdiccion','options'=>$jurisdicciones));
            ?>
            </div>
        <?php
        }
        else {
            echo $form->input('jurisdiccion_id', array('type'=>'hidden'));
            echo $form->input('tipo', array('type'=>'hidden'));

            if (!empty($this->passedArgs['instit_id'])) {
            ?>
                <div id="datos_instit">
                    <?
                    //el anexo viene con 1 solo digito por lo general. Pero para leerlo siempre hay que ponerlo
                    // en formato de 2 digitos
                    $armar_anexo = ($instit['Instit']['anexo']<10)?'0'.$instit['Instit']['anexo']:$instit['Instit']['anexo'];
                    $nombreInstit = "".($instit['Instit']['cue']*100)+$instit['Instit']['anexo']." - ". $instit['Instit']['nombre_completo'];
                    ?>
                    <div class="instit_name"><b><?= $html->link($nombreInstit, '/instits/view/'.$instit['Instit']['id'], array('target'=>'_blank')) ?></b></div>
                    <div class="instit_atributte"><b>Domicilio: </b> <?= $instit['Instit']['direccion'] ?></div>
                    <br />
                    <div class="instit_atributte"><b>Gesti�n: </b><?= $instit['Gestion']['name'] ?></div>
                    <div class="instit_atributte"><b>Jurisdicci�n: </b> <?= $instit['Jurisdiccion']['name'] ?></div>
                    <br />
                    <div class="instit_atributte"><b>Departamento: </b><?= $instit['Departamento']['name'] ?></div>
                    <div class="instit_atributte"><b>Localidad: </b><?= $instit['Localidad']['name'] ?></div>
                </div>
            <?php
            }
            else {
                ?>
                <div id="datos_instit">
                    <div class="instit_name"><b><?=$jurisdicciones[$this->passedArgs['jurisdiccion_id']]?></b></div>
                </div>
                <?php
            }
        }
        ?>
        <br />
        <label style="display:inline; width:100px; text-align: right;">A�o:</label>
        <?=$form->input('anio', array('options'=>$anios, 'default'=>date('Y'), 'style'=>'width: 70px; display:inline;', 'div' => false, 'label' => false))?>
        <label style="display:inline; width:100px; text-align: right;">Trimestre:</label>
        <?=$form->input('trimestre', array('options'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4'), 'default'=>$trimestre, 'style'=>'width: 40px; display:inline;', 'div' => false, 'label' => false))?>
        <label style="display:inline; width:100px; text-align: right;">Memo:</label>
        <?=$form->input('memo', array('maxlength'=>30, 'size'=>10, 'style'=>'width: 40px; display:inline;', 'div' => false, 'label' => false))?>
        <label style="display:inline; width:100px; text-align: right;">Resoluci�n:</label>
        <?=$form->input('resolucion', array('maxlength'=>30, 'size'=>10, 'style'=>'width: 70px; display:inline;', 'div' => false, 'label' => false))?>

        <h2>Lineas de Accion</h2>
        <div class="lista_lineas">
            <dl class="item_lineas" style="cursor:pointer;padding:0px !important">
                <div id="detalle">

                    
                    
                </div>
                <div id="totales">
                    <dt onmouseout="jQuery(this).toggleClass('item_fondos_seleccionado')" onmouseover="jQuery(this).toggleClass('item_fondos_seleccionado')" class="" >
                        <span style="padding-left:15px">
                            >><strong> Total</strong>
                        </span>
                    </dt>
                    <dd><strong>$ <span id="total">0</span></strong></dd>
                </div>
            </dl>

        </div>
        <span style="float:right">
            <?php echo $html->image('/img/add.gif', array('id'=>'agregar_nueva_linea','alt' => 'Agregar'))?>
        </span>

        <?php
            echo $form->input('total', array('type'=>'hidden'));
            echo $form->input('instit_id', array('type'=>'hidden'));

            echo $form->input('description', array('label'=>'Descripci�n'));
	?>
    </fieldset>
    <?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Volver a Fondos', true), array('action' => 'index'));?></li>
	</ul>
</div>

<script type="text/javascript">
    var i = 0;
    
    function agregarLinea(element){

        uniqid = jQuery(element).parent('.linea_confirmada').attr("order");
        linea_id = '';

        if(uniqid == undefined){
            uniqid = new Date().getTime();
            pre = "<div class='linea_confirmada' order='"+ uniqid  + "'>";
            post = "</div>";
            selector = "";
        }else{
            pre = '';
            post = '';
            selector = " .linea_confirmada[order="+uniqid+"]";
        }
        

        html = pre +
               "<dt onmouseout='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' onmouseover='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' class='' >" +
               "<span>" +
                    '<?php echo $html->image('/img/modify.png', array('alt' => 'Modificar', 'onclick'=>'modificarLinea(this);'))?>' +
                    '<?php echo $html->image('/img/delete.png', array('alt' => 'Borrar','onclick'=>'jQuery(this).parent().parent().parent().remove(); ActualizarTotal(); actualizarComboLineasDeAccion();'))?>' +
                "</span>" +
                "<span class='linea_nombre' id='"+jQuery(element).find(".linea_de_accion_id option:selected").val()+"'>" +
                jQuery(element).find(".linea_de_accion_id option:selected").text() +
                "</span>" +
                "</dt>" +
                "<dd>" +
                jQuery(element).find(".monto").val() +
                "</dd>" +
                "<input class='linea_id' type='hidden' name='data[Fondo][FondosLineasDeAccion]["+i+"][lineas_de_accion_id]' value='"+ jQuery(element).find(".linea_de_accion_id option:selected").val() +"'>" +
                "<input class='monto' type='hidden' name='data[Fondo][FondosLineasDeAccion]["+i+"][monto]' value='" + jQuery(element).find(".monto").val() + "'>" +
                post;

        jQuery(".lista_lineas dl .nueva_linea").remove();
        
        jQuery(".lista_lineas dl #detalle" + selector).append(html);
        i++;

        // actualizar total
        ActualizarTotal();
        actualizarComboLineasDeAccion();
    }

    function modificarLinea(element){
        uniqid = jQuery(element).parent().parent().parent().attr("order");
        
        linea_id = jQuery(element).parent().parent().parent().find(".linea_id").val();
        monto = jQuery(element).parent().parent().parent().find(".monto").val();

        actualizarComboLineasDeAccion(linea_id);
        
        html = "<span class='nueva_linea'>" +
                        "<span class='nueva_linea_in'>" +
                            "<dt onmouseout='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' onmouseover='jQuery(this).toggleClass(\"item_fondos_seleccionado\")' class='' style='height: 30px;'>" +
                                "<span>" +
                                    '<?php echo $html->image('/img/check.gif', array('id'=>'check_linea','alt' => 'Confirmar', 'onclick'=>'agregarLinea(jQuery(this).parent().parent().parent().parent().parent()); actualizarComboLineasDeAccion();'))?>' +
                                    '<?php echo $html->image('/img/delete.png', array('alt' => 'Borrar','onclick'=>'jQuery(this).parent().parent().parent().parent().parent().remove(); actualizarComboLineasDeAccion();'))?>' +
                                "</span>" +
                                "<span>" +
                                    "<select class='linea_de_accion_id' style='width:400px'>";
                                jQuery.each(jQuery(lineasDeAccion), function(key, value) {
                                    if (value) {
                                        html += '<option value="'+key+'">'+value+'</option>';
                                    }
                                });
                                       
                        html +=   "</select>" +
                                "</span>" +
                            "</dt>" +
                            "<dd><input class='monto' style='margin-top:-14px;width:100px' type='text' value='"+ monto +"' onkeypress ='agregarLineaConEnter(this,event);'/></dd>" +
                            "<input class='linea_id' type='hidden' name='data[Fondo][FondosLineasDeAccion][][lineas_de_accion_id]' value='"+ linea_id +"'>" +
                            "<input class='monto' type='hidden' name='data[Fondo][FondosLineasDeAccion][][monto]' value='" + monto + "'>" +
                        "</span>" +
                    "</span>";

        jQuery(".lista_lineas dl #detalle .linea_confirmada[order=" + uniqid + "]").html('');
        jQuery(".lista_lineas dl #detalle .linea_confirmada[order=" + uniqid + "]").append(html);
        jQuery(".lista_lineas dl #detalle .linea_confirmada[order=" + uniqid + "] .linea_de_accion_id").val(linea_id);
        jQuery(".lista_lineas dl #detalle .linea_confirmada[order=" + uniqid + "] .monto").setMask("integer");
        // actualizar total
        ActualizarTotal();
    }

    function agregarLineaConEnter(element,event){
        if ((event.keyCode == 10 || event.keyCode == 13)){
            agregarLinea(jQuery(element).parent().parent().parent());
        }
    }
</script>

