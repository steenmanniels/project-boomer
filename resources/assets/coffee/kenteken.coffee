$ ->
  console.log(APP_URL)

$("#formKenteken").submit (obj) ->
  obj.preventDefault()
  data = $(this).serializeArray()

  $.each data, (index, value) ->
    console.log(value)
    if value.name == 'inputKenteken'
      kenteken = value.value

      url = "#{APP_URL}/dashboard/occasion/getkenteken"

      $.get
        url: url
        data: { kenteken:kenteken }
        error: (jqXHR, textStatus, errorThrown) ->
          console.log("AJAX Error: #{textStatus}")

        success: (data, textStatus, jqXHR) ->
          result = data[0]
          keys = Object.keys(result)

          $("#formResult").append("<h3>#{result['handelsbenaming']}</h3>")

          keys.forEach (element, index, array) ->
            addFormElement(element, result[element])

          $("#formResult").append("<input type='submit' value='Occasion toevoegen'/>")

addFormElement = (name, value) ->
  html = "<input type='hidden' name='#{name}' value='#{value}'/>"
  $("#formResult").append(html)