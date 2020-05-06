$(document).ready(function(){
    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCargo.php'
    })
    .done(function(especialidad){
      $('#cargo-reg').html(especialidad)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los cargos')
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxCentr.php'
    })
    .done(function(centro){
      $('#centro-reg').html(centro)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los centros')
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxProgr.php'
    })
    .done(function(centro){
      $('.especialidad-reg').html(centro)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las especialidades y areas')
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxMarca.php'
    })
    .done(function(centro){
      $('#marca-reg').html(centro)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las marcas')
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxTipo.php'
    })
    .done(function(centro){
      $('#tipo-reg').html(centro)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los tipos')
    })

    $.ajax({
      type: 'POST',
      cache: false,
      url: '../core/configComboxDepart.php'
    })
    .done(function(departamentos){
      $('#departamento-reg').html(departamentos)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las departamentos')
    })

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
      .fail(function(){
        alert('Hubo un errror al cargar los municipios')
      })
    })
    $('#tipo_vehiculo-reg').on('change', function(){
      var id = $('#tipo_vehiculo-reg').val()
      $.ajax({
        type: 'POST',
        cache: false,
        url: '../core/configComboMarVeh.php',
        data: {'id': id}
      })
      .done(function(marcas){
        $('#marca_vehiculo-reg').html(marcas)
      })
      .fail(function(){
        alert('Hubo un errror al cargar los marca de vehiculos')
      })
    })
})