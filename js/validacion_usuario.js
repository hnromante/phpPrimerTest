//Declaracion de variables DOM
  var tf_nick = $("#tf_nick");
  var tf_pass1 = $("#tf_pass1");
  var tf_pass2 = $("#tf_pass2");
  var btn_guardar = $("#btn_guardar");
  var formularios = $('.form');


  //FUNCION AJAX PARA REVISAR SI EL NOMBRE DE USUARIO EXISTE
  tf_nick.change(function(){
    $.post('ajax_validacion_nick.php', {
      
      nick:tf_nick.val(),
      
      beforeSend: function(){
                    $('.validacion').html("Espere un momento por favor..");
                  }
      }, function(respuesta){
            $('.validacion').html(respuesta);
           });
  });

  //Verificacion password Jquery + notificacion
  btn_guardar.hide();
  tf_pass2.change(function(event){
      if(tf_pass1.val() == tf_pass2.val()){
        swal('Bien hecho', 'Las contrasenas coinciden','success');
        btn_guardar.show();
      }else{
        swal('Oppss...','Las constrasenas no coinciden','error');
        btn_guardar.hide();
      }
    });

  //Deshabilitamos la tecla Enter
  formularios.kreypress(function(e){
    if(e.which == 13){
      return false;
    };
  });

  if(tf_nick.val() == "" || tf_pass1.val() == "" || tf_pass2.val() == ""){
    swal('Oppss','Hay campos vacios','error');
  }