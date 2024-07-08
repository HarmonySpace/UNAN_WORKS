$(document).ready(function() {
  const filter = $("#res").data("data")
  console.log(filter)
  const data = Object.values(filter)
  console.log(data)
  const rootDir = "../.."
  const table = $("#table")
  $.get(rootDir + "/src/partials/data-table.mustache", function(template) {
    const rendered = Mustache.render(template, { data: data })
    table.html(rendered)
  })

  // $.ajax({
  //   url: "/result",
  //   type: "GET",
  //   success: function(data) {
  //     console.log(data)
  //     $.get(rootDir + "/src/partials/data-table.mustache", function(template) {
  //       const rendered = Mustache.render(template, { data: data })
  //       table.html(rendered)
  //     })
  //   },
  //   error: function(status, error) {
  //     console.error(status, error)
  //   }
  // })
})
