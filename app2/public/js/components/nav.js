$(document).ready(function() {
  const nav = $("#nav")
  const links = [
    {
      label: "Filtrar",
      link: "/"
    }]
  $.get("/src/partials/nav.mustache", function(template) {
    const rendered = Mustache.render(template, { links: links })
    nav.html(rendered)
  })
})
