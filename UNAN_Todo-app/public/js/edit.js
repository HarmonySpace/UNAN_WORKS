$(document).ready(function () {
  const editForm = $('#editTodo')
  const id = $('#todo_id')
  const name = $('#tname')
  const date_f = $('#tdate_f')
  const status = $('#tstatus')
  const priority = $('#tpriority')
  const init_s = status.data('status')
  status.val(init_s)
  const init_p = priority.data('priority')
  priority.val(init_p)

  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });

  editForm.validate()

  editForm.submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: '/update',
      method: "POST",
      dataType: 'JSON',
      cache: false,
      processData: false,
      data: JSON.stringify({
        id: id.data('id'),
        name: name.val(),
        status: status.val(),
        priority: priority.val(),
        date_f: date_f.val()
      }),
      success: function (data) {
        console.log(data)
        location.href = '/'
      },
      error: function (xhr, status, error) {
        console.error(error)
      }
    })
  })
})
