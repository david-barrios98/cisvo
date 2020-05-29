$(document).ready(function(){
  //ROLES DEL PROPIETARIO
    //SE OCULTAN LOS FORMULARIOS DE LOS 3 ROLES AL CARGAR EL FORMULARIO PRINCIPAL DE REGISTRO
    $('#visitante').hide(); 
    $('#aprendiz').hide();
    $('#funcionario').hide();

    $('#rolpropietario-txt').on('change', function(){
      //SI SE SELECCIONA UNA OPCION EN EL COMBOX ROL DE PROPIETARIO
      $.ajax({
        success: function(){
          var rol = $('#rolpropietario-txt').val() //SE ALMACANEA EL VALOR QUE TRAIGA LA OPCION

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

    /*Carga el combobox del area a la que pertenece el funcionario*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxAreaFun.php'
    })
    .done(function(area){
      $('#area-txt').html(area)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los cargos')
    })*/

    /*Carga el combobox del cargo del funcionario*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCargo.php'
    })
    .done(function(cargo){
      $('#cargo-txt').html(cargo)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los cargos')
    })*/

    /*Carga el combobox del centro de formacion en propietario*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCentr.php'
    })
    .done(function(centro){
      $('#centro-txt').html(centro)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los centros')
    })*/

    /*Carga el combobox de especialidad o programa de formacion del aprendiz*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxProgr.php'
    })
    .done(function(programa){
      $('#especialidad-txt').html(programa)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las especialidades')
    })*/

    /*Carga el combobox de marca de objetos */
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxMarca.php'
    })
    .done(function(marcaobjeto){
      $('#marcaobjeto-txt').html(marcaobjeto)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las marcas')
    })*/

    /*Carga el combobox de tipos de objetos*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxTipo.php'
    })
    .done(function(tipoobjeto){
      $('#tipoobjeto-txt').html(tipoobjeto)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los tipos')
    })*/

    /*Carga el combobox de departamento en el propietario*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxDepart.php'
    })
    .done(function(departamentos){
      $('#departamento-txt').html(departamentos)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las departamentos')
    })*/

    $('#departamento-txt').on('change', function(){
      var id = $('#departamento-txt').val()
      $.ajax({
        type: 'POST',
        cache: false,
        url: '../core/configComboxMunic.php',
        data: {'id': id}
      })
      .done(function(municipios){
        $('#municipio-txt').html(municipios)
      })
      /*.fail(function(){
        alert('Hubo un errror al cargar los municipios')
      })*/
    })

    /*Carga el combobox del tipo de vehiculo*/
    
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/CBVehiculoTipo.php'
    })
    .done(function(tipoveh){
      $('#tipovehiculo-txt').html(tipoveh)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los marca de vehiculos')
    })*/
    
    /*Carga el combobox de las marcas de vehiculo*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/CBVehiculoMarca.php'
    })
    .done(function(marcasvehiculo){
      $('#marcavehiculo-txt').html(marcasvehiculo)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar los marca de vehiculos')
    })*/
    

    /*Carga el combobox de tipos de solicitudes*/
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboSoliTipo.php'
    })
    .done(function(tiposolicitud){
      $('#tiposolicitud-txt').html(tiposolicitud)
    })
    /*.fail(function(){
      alert('Hubo un errror al cargar las departamentos')
    })*/
     
  })
