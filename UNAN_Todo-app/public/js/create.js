$(document).ready(function () {
  const addForm = $('#addTodo')
  const name = $('#tname')
  const date_f = $('#tdate_f')
  const status = $('#tstatus')
  const priority = $('#tpriority')

  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });


  addForm.validate()

  addForm.submit(function (event) {
    event.preventDefault();

    $.ajax({
      url: '/create',
      method: "POST",
      dataType: 'JSON',
      cache: false,
      processData: false,
      data: JSON.stringify({
        name: name.val(),
        status: status.val(),
        priority: priority.val(),
        date_f: date_f.val()
      }),
      success: function (data) {
        console.log(data.message)
        location.href = '/'
      },
      error: function (xhr, status, error) {
        console.error(error)
      }
    })
  })
})
