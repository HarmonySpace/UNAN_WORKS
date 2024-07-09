$(document).ready(function() {
  const form = $("#form")
  form.on("submit", function(e) {
    const boxes = $("#form  ul li input:checkbox:checked").length > 0
    console.log(boxes)
    if (form.valid() && boxes) {
      return
    } else {
      alert("Todos los campos son necesarios")
    }
    e.preventDefault()
  })
})
