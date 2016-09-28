$ ->
  $('#dateAPK').datepicker({
    format: 'dd/mm/yyyy'
  }).inputmask()

  $('#datePart1').datepicker({
    format: 'dd/mm/yyyy'
  }).inputmask()

  $("#dateAfwijkendBouwjaar").inputmask()
  $("#inputPrijs").inputmask()

#  $('#selectMerk').change()
  $(".select-select2").select2()
  $("#inputModelText").hide()
  $("#inputTrimText").hide()

  
$("#modelChangeText").on "click", (obj) ->
  $("#inputModelText").hide()
  $("input[name='model_input']").val('select')
  $("#inputModelSelect").show()

$("#modelChangeSelect").on "click", (obj) ->
  $("#inputModelSelect").hide()
  $("input[name='model_input']").val('text')
  $("#inputModelText").show()

$("#trimChangeText").on "click", (obj) ->
  $("#inputTrimText").hide()
  $("input[name='type_input']").val('select')
  $("#inputTrimSelect").show()

$("#trimChangeSelect").on "click", (obj) ->
  $("#inputTrimSelect").hide()
  $("input[name='type_input']").val('text')
  $("#inputTrimText").show()

$("#selectPriceType").on "change", (obj) ->
  value = $(this).val()
  if value is 'vast'
    $("#purchaseOptionsWrapper").show()
  else
    $("#purchaseOptionsWrapper").hide()

$("#selectAPK").on "change", (obj) ->
  value = $(this).val()
  if value is 'ja'
    $("#dateAPKWrapper").show()
  else
    $("#dateAPKWrapper").hide()

$("#checkAfwijkendBouwjaar").on "change", (obj) ->
  value = $(this).prop('checked')
  if value is true
    $("#dateAfwijkendBouwjaarWrapper").show()
  else
    $("#dateAfwijkendBouwjaarWrapper").hide()


$("#selectPrijsType").on "change", (obj) ->
  value = $(this).val()
  if value is 'vast'
    $("#inputPrijsWrapper").show()
  else
    $("#inputPrijsWrapper").hide()

$("#merk").on "change", (obj) ->
  data = $(this).val()
  url = "#{APP_URL}/dashboard/occasion/getmodel"
  $('#selectModel').html("<option>Modellen worden geladen</option>").prop('disabled', false)

  $.get
    url: url
    data: { id:data }
    error: (jqXHR, textStatus, errorThrown) ->
      console.log("AJAX Error: #{textStatus}")
      $('#selectModel').html("<option>Geen modellen gevonden</option>").prop('disabled', true)

    success: (data, textStatus, jqXHR) ->
      $('#selectModel').html('')
      response = data['Models']

      console.log("Succesful AJAX call: ")
      console.log(response)

      $.each response, (index, value) ->
        data = value['model_name']
        $('#selectModel').append("<option value='#{data}'>#{data}</option>")

$("#selectModel").on "change", (obj) ->
  model = $(this).val()
  make = $('#merk').val()

  $('#selectType').html("<option>Typen worden geladen</option>").prop('disabled', false)

  url = "#{APP_URL}/dashboard/occasion/gettrim"

  $.get
    url: url
    data: { model:model, make:make }
    error: (jqXHR, textStatus, errorThrown) ->
      console.log("AJAX Error: #{textStatus}")
      $('#selectType').html("<option>Geen typen gevonden</option>").prop('disabled', true)

    success: (data, textStatus, jqXHR) ->
      console.log(data)

#      $('#selectType').select2('destroy')
      $('#selectType').html('')
      response = data['Trims']

      console.log("Succesful AJAX call: ")
      console.log(response)

      $.each response, (index, value) ->
        data = value['model_trim']
        unless data is ''
          $('#selectType').append("<option value='#{data}'>#{data}</option>")
        
#      $('#selectType').select2()

