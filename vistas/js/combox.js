$(document).ready(function(){
  //ROLES DEL PROPIETARIO
    //SE OCULTAN AL CARGAR EL FORMULARIO PRINCIPAL DE REGISTRO
    $('#visitante').hide(); 
    $('#aprendiz').hide();
    $('#funcionario').hide();

    $('#rolpropietario-reg').on('change', function(){
      //SI SE SELECCIONA UNA OPCION EN EL COMBOX ROL DE PROPIETARIO
      $.ajax({
        success: function(){
          var rol = $('#rolpropietario-reg').val() //SE ALMACANEA EL VALOR QUE TRAIGA LA OPCION

          //SE EVALUA LO QUE TRAIGA
          if(rol == 'aprendiz'){
            $('#aprendiz').show();//.show() MUESTRA EL FORMULARIO
            $('#visitante').hide(); 
            $('#funcionario').hide();
          }else if(rol == 'funcionario'){
            $('#funcionario').show();
            $('#aprendiz').hide();
            $('#visitante').hide();
          }else if (rol == 'visitante'){
            $('#visitante').show();
            $('#funcionario').hide();
            $('#aprendiz').hide();
          }else {
            $('#visitante').hide(); 
            $('#aprendiz').hide();
            $('#funcionario').hide();
          }
    
        }
      })
      /*.fail(function(){
        alert('Hubo un error al cargar los marca los roles') //ALERTA SENSILLA SI OCURRE UN ERROR
      })*/
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCargo.php'
    })
    .done(function(especialidad){
      $('#cargo-reg').html(especialidad)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los cargos')
    })*/

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCentr.php'
    })
    .done(function(centro){
      $('#centro-reg').html(centro)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los centros')
    })*/

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxProgr.php'
    })
    .done(function(centro){
      $('.especialidad-reg').html(centro)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las especialidades y areas')
    })*/

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxMarca.php'
    })
    .done(function(centro){
      $('#marca-reg').html(centro)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las marcas')
    })*/

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxTipo.php'
    })
    .done(function(centro){
      $('#tipo-reg').html(centro)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los tipos')
    })*/

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxDepart.php'
    })
    .done(function(departamentos){
      $('#departamento-reg').html(departamentos)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las departamentos')
    })*/

    $('#departamento-reg').on('change', function(){
      var id = $('#departamento-reg').val()
      $.ajax({
        type: 'POST',
        cache: false,
        url: '../core/configComboxMunic.php',
        data: {'id': id}
      })
      .done(function(municipios){
        $('#municipio-reg').html(municipios)
      })
      /*.fail(function(){
        alert('Hubo un errror al cargar los municipios')
      })*/
    })
    $('#tipovehiculo-reg').on('change', function(){
      var id = $('#tipovehiculo-reg').val()
      $.ajax({
        type: 'POST',
        cache: false,
        url: '../core/configComboMarVeh.php',
        data: {'id': id}
      })
      .done(function(marcas){
        $('#marcavehiculo-reg').html(marcas)
      })
      /*.fail(function(){
        alert('Hubo un errror al cargar los marca de vehiculos')
      })*/
    })
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboSoliTipo.php'
    })
    .done(function(tiposolicitud){
      $('#tiposolicitud-reg').html(tiposolicitud)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las departamentos')
    })*/
    $('#').on('change', function(){
      var id = $('dni-reg').val()
      $.ajax({
        type: 'POST',
        cache: false,
        url: '../core/configComboMarVeh.php',
        data: {'id': id}
      })
      .done(function(marcas){
        $('#marcavehiculo-reg').html(marcas)
      })
      /*.fail(function(){
        alert('Hubo un errror al cargar los marca de vehiculos')
      })*/
    })
})