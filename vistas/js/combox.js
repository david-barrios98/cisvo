$(document).ready(function(){
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
})