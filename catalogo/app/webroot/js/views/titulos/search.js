$(function(){
    if($('#jurisdiccion_id').val() != 0){
        $depto_aux = $('#departamento_id').val();
        reloadCombo($('#jurisdiccion_id').val(), $depto_aux);
    }

    $('#SectorId').change(function(){
        var url = urlDomain+'/subsectores/ajax_select_subsector_form_por_sector';
        $.post(url,{'data[sector_id]':$(this).val()},function(data){
            $('#SubsectorId').html(data);
        })
    });
    
    $('#jurisdiccion_id').live("change",function(event){
        reloadCombo($(this).val());
        $("#ajax_indicator").hide();
        $('#LocalidadName').val('');
        $("#hiddenLocId").val('');
    });

    $('#departamento_id').live("change",function(event){
        $("#ajax_indicator").hide();
        $('#LocalidadName').val('');
        $("#hiddenLocId").val('');
    });

    $("#LocalidadName").live("keyup",function(event){
        if($("#LocalidadName").val().length == 0){
            $("#hiddenLocId").val('');
            $("#jurisdiccion_id").val('');
            $("#departamento_id").val('');
        }
    });
    

    function reloadCombo(jur, depto){
        var url = urlDomain+'/departamentos/ajax_select_departamento_form_por_jurisdiccion';
        $.post(url,{'data[jurisdiccion_id]':jur},function(data){
            $('#departamento_id').html(data);
            $('#departamento_id').val(depto);
        })
    }

});


function init__SearchFormJs(locUrl) {
    $( "#LocalidadName" ).autocomplete({
            source: function( request, response ) {
                    $.ajax({
                            url: locUrl,
                            dataType: "json",
                            data: {
                                    featureClass: "P",
                                    style: "full",
                                    maxRows: 30,
                                    q: request.term,
                                    jur: function() { return jQuery('#jurisdiccion_id').val(); },
                                    depto: function() { return jQuery('#departamento_id').val(); }
                            },
                            success: function( data ) {
                                    response( $.map( data, function( item ) {
                                            return {
                                                    label: item.localidad_id == '' ? item.localidad : item.localidad + ', ' + item.departamento + ' (' + item.jurisdiccion + ')',
                                                    value: item.localidad,
                                                    localidad_id: item.localidad_id,
                                                    jurisdiccion_id: item.jurisdiccion_id,
                                                    departamento_id: item.departamento_id,
                                                    shortlabel: item.localidad
                                            }
                                    }));
                            }
                    });
            },
            minLength: 2,
            select: function( event, ui ) {
                    if(ui.item && ui.item.jurisdiccion_id) {
                        $("#jurisdiccion_id").val(ui.item.jurisdiccion_id);
                        $("#departamento_id").val(ui.item.departamento_id);
                        $("#LocalidadName").val(ui.item.shortlabel);
                        $("#hiddenLocId").val(ui.item.localidad_id);
                    }
                    else {
                        $("#LocalidadName").val('');
                        $("#hiddenLocId").val('');
                    }
                     
            },
            open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
    });
    
}
