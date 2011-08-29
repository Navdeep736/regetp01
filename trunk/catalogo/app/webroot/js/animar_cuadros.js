/* esto es un hack para que jquery me deje animar propiedades que no son de CSS */
var $_fx_step_default = $.fx.step._default;
$.fx.step._default = function (fx) {
	if (!fx.elem.customAnimate) return $_fx_step_default(fx);
	fx.elem[fx.prop] = fx.now;
	fx.elem.updated = true;
};

function animar_cuadros (id_svg,nodos,id_descripcion) {
	var doc = document.getElementById(id_svg).contentDocument;
	var len = nodos.length;
	for(var i = 0; i<len ; i++){
	  var nodo = doc.getElementById(nodos[i]["id"]);
	  $(nodo).mouseenter(get_resizer(nodo, 1,1.2, nodos[i]["texto"]))
	         .mouseleave(get_resizer(nodo, 1.2,1));
	}

	function get_bounds(nodo){
		console.debug(nodo);
	}

	function get_resizer(nodo, scaleFrom, scaleTo, text){
	  return function(){
	    if(text){
	      $("#" + id_descripcion).hide().text(text).fadeIn("fast");  
	    }else{
	      $("#" + id_descripcion).fadeOut();
	    }
	    
	    var object = nodo
	    /*este DIV se crea pero no se agrega al DOM, es solamente para tener algun
	      lugar donde meter la propiedad a animar (scale)*/
	    var tmpObj = $.extend($('<div>')[0], {
	      scale: scaleFrom,
	      customAnimate: true,
	      updated: true
	    });
	    $(tmpObj).animate({"scale": scaleTo},{duration:500, 
	      step:function (scale, fx) {
	      	var bounds = object.getBoundingClientRect();
	        var tx = bounds["left"] + bounds["width"]/2;
	        tx = tx - tx*scale;
	        var ty = bounds["top"] + bounds["height"]/2;
	        ty = ty - ty*scale;
	        /*el translate se hace porque el scale me mueve el centro del objeto*/
	        var transform = "translate("+(tx).toString()+","+(ty).toString()+"), scale("+(scale).toString()+")";
	        object.setAttribute("transform",transform);
	      }
	    });
	  }
	}
}