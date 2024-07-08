$(document).ready(function() {
  const form = $("#form")

  //id selections
  const select1 = $("#select1")
  const select2 = $("#select2")
  const select3 = $("#select3")
  const select4 = $("#select4")
  const select5 = $("#select5")
  const select6 = $("#select6")
  //options
  let options1
  let options2
  let options3
  let options4
  let options5
  let options6
  let tempData
  //select titles and ids
  const select1_item = {
    id: "anyo",
    default: {
      title: "Todos",
      value: "todos"
    }
  }
  const select2_item = {
    id: "facultaty",
    default: {
      title: "Todas",
      value: "todos"
    }
  }
  const select3_item = {
    id: "career",
    default: {
      title: "Todas",
      value: "todos"
    }
  }
  const select4_item = {
    id: "modality",
    default: {
      title: "Todas",
      value: "todos"
    }
  }
  const select5_item = {
    id: "regime",
    default: {
      title: "Todos",
      value: "todos"
    }
  }
  const select6_item = {
    id: "partial",
    default: {
      title: "Todos",
      value: "todos"
    }
  }

  //array number utility
  function arrayInts(length) {
    const init = [];
    for (let i = 0; i < length; i++) {
      init.push(i);
    }
    const options = init.map((item) => {
      return {
        text: item,
        value: item
      }
    })
    return options;
  }
  //options generator
  function optionsGen(array) {
    return array.map((item) => {
      return {
        text: item,
        value: item.toLowerCase()
      }
    })
  }
  function optionsKeysGen(array) {
    return array.map((item) => {
      return {
        text: item.label,
        value: item.key
      }
    })
  }

  //get years
  const currentYear = new Date().getFullYear();
  const years = Array.from({ length: 30 }, (_, i) => currentYear - i);
  options1 = years.map((item) => {
    return {
      text: item,
      value: item
    }
  })
  $.get("/src/partials/select2.mustache", function(template) {
    const rendered_years = Mustache.render(template, {
      select: select1_item,
      options: options1
    })
    select1.html(rendered_years)
  })

  //get faculties
  $.ajax({
    url: "/faculties",
    type: "GET",
    dataType: "json",
    success: function(data) {
      options2 = data.map((item) => {
        return {
          text: item.name,
          value: item.codfac
        }
      })
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
  $.get("/src/partials/select2.mustache", function(template) {
    const rendered_faculties = Mustache.render(template, {
      select: select2_item,
      options: options2
    })
    select2.html(rendered_faculties)
  })

  //get careers
  $.get("/src/partials/select2.mustache", function(template) {
    const rendered_careers = Mustache.render(template, {
      select: select3_item,
      options: {}
    })
    select3.html(rendered_careers)
  })
  select2.change(function() {
    $.get("/src/partials/select2.mustache", function(template) {
      const rendered_careers = Mustache.render(template, {
        select: select3_item,
        options: {
          text: "Ninguno",
          value: 0
        }
      })
      select3.html(rendered_careers)
    })
    const url3 = "/faculties/" + $("#facultaty").val() + "/careers"
    $.ajax({
      url: url3,
      type: "GET",
      //dataType: "json",
      success: function(data) {
        console.log(data)
        options3 = data.careers.map((item) => {
          return {
            text: item.degree,
            value: item.codcarr
          }
        })
        console.log(options3)
        $.get("/src/partials/select2.mustache", function(template) {
          const rendered_careers = Mustache.render(template, {
            select: select3_item,
            options: options3
          })
          select3.html(rendered_careers)
        })
      },
      error: function(status, error) {
        console.error(status, error)
      }
    })
  })

  //get modality
  tempData = ["Regular", "Sabatino", "Dominical", "Virtual"]
  options4 = optionsGen(tempData)
  $.get("/src/partials/select2.mustache", function(template) {
    const rendered_modality = Mustache.render(template, {
      select: select4_item,
      options: options4
    })
    select4.html(rendered_modality)
  })

  //get regime
  //tempData = [{ label: "Trimestral", key: 1 }, "Cuatrimestral", "Semestral"]
  tempData = [
    {
      label: "Trimestral", 
      key: 1
    },
    {
      label: "Cuatrimestral", 
      key: 2
    },
    {
      label: "Semestral", 
      key: 3
    }
  ]
  options5 = optionsKeysGen(tempData)
  $.get("/src/partials/select2.mustache", function(template) {
    const rendered_regime = Mustache.render(template, {
      select: select5_item,
      options: options5
    })
    select5.html(rendered_regime)
  })

  //get partials
  tempData = ["I", "II", "III", "Final"]
  options6 = optionsGen(tempData)
  $.get("/src/partials/select-list.mustache", function(template) {
    const rendered_regime = Mustache.render(template, {
      select: select6_item,
      options: options6
    })
    select6.html(rendered_regime)
    // console.log($("#final"))
  })

  //form evaluation
  form.validate({
    rules: {
      anyo: {
        required: true
      },
      facultaty: {
        required: true
      },
      career: {
        required: true
      },
      modality: {
        required: true
      },
      regime: {
        required: true
      }
    }
  })
})
