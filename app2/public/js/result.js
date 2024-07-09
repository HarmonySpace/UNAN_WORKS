$(document).ready(function() {
  const filter = $("#res").data("data")
  const data = Object.values(filter)
  const rootDir = "../.."
  const table = $("#table")
  $.get(rootDir + "/src/partials/data-table.mustache", function(template) {
    const rendered = Mustache.render(template, { data: data })
    table.html(rendered)
  })
})
