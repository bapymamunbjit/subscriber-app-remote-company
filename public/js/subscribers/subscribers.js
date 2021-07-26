//Initializing global variable for datatable
let globalTable = null

$(document).ready(function () {

  //Global datatable for listing subscribers
  globalTable = $('#tblSubscribers').DataTable( {
    ordering: true,
    order: [[0, "desc"]],
    ajax: {
        url: '/subscribers/getSubscribersData',
        dataSrc: ''
    },
    "columns": [
      { "data": "id" },
      { "data": "name" },
      { "data": "email", className: 'editable' },
      { "data": "country" },
      { "data": "subscription_date" },
      { "data": "subscription_time" },
      { "data": "action" }
    ],
    "columnDefs": [{
      "targets": -1,
      //"data": "id",
      "orderable": false,
      "defaultContent": "<button id='delete-button' class='btn btn-danger'>Delete</button>"
    }]
  });

  //Edit event after clicking subscriber's email
  $('#tblSubscribers tbody').on('click', '.editable', function () {
    var id = $(this).siblings(":first").text();
    var name = $(this).siblings(":nth-of-type(2)").text();
    var email = $(this).text();
    var country = $(this).siblings(":nth-of-type(4)").text();

    $('#editModal').modal('toggle')
    $('#editRowId').val(id);
    $('#editSubscriberName').val(name);
    $('#editSubscriberEmail').val(email);
    $('#editSubscriberCountry').val(country);
  });

  //Delete button click event
  $('#tblSubscribers tbody').on('click', '#delete-button', function () {
    var id = $(this).parent().siblings(":first").text();
    var email = $(this).parent().siblings(":nth-of-type(3)").text();
    deleteSubscriber(id, email)
  });
});

//Function to save subscriber
function saveSubscriber() {
  let subscriberName = $("#subscriberName").val()
  let subscriberEmail = $("#subscriberEmail").val()
  let subscriberCountry = $("#subscriberCountry").val()

  const data = { name: subscriberName, email: subscriberEmail, country: subscriberCountry }
  let url = "/save-subscriber"

  $.ajax({
    type: "POST",
    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: url,
    data: data,
    dataType: 'json',
    success: function (res) {
      $('#addSubscriberForm').trigger("reset");
      $('#addModal').modal('toggle');
      $('.alert').addClass( "alert-success" ).text('Subscriber added succesfully!').show("slow").delay(2000).hide("slow");
      globalTable.ajax.reload()
    },
    error: function (xhr) {
      if(xhr.status === 422){
        let errors = xhr.responseJSON.errors
        console.log(errors)
        if(errors.name){
          $("#messageName").show().text(errors.name[0])
        }
        if(errors.email){
          $("#messageEmail").show().text(errors.email[0])
        }
        if(errors.country){
          $("#messageCountry").show().text(errors.email[0])
        }
      }
    }
  });
}

//Function to update subscriber
function updateSubscriber() {
  let rowId = $('#editRowId').val();
  let subscriberName = $("#editSubscriberName").val()
  let subscriberEmail = $("#editSubscriberEmail").val()
  let subscriberCountry = $("#editSubscriberCountry").val()

  const data = { id:rowId, name: subscriberName, email: subscriberEmail, country: subscriberCountry }
  let url = "/update-subscriber"

  $.ajax({
    type: "PUT",
    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: url,
    data: data,
    dataType: 'json',
    success: function (res) {
      $('#editSubscriberForm').trigger("reset");
      $('#editModal').modal('toggle');
      $('.alert').addClass( "alert-success" ).text('Subscriber updated succesfully!').show("slow").delay(2000).hide("slow");
      globalTable.ajax.reload()
    },
    error: function (xhr) {
      if(xhr.status === 422){
        let errors = xhr.responseJSON.errors
        if(errors.name){
          $("#editMessageName").show().text(errors.name[0])
        }
        if(errors.email){
          $("#editMessageEmail").show().text(errors.email[0])
        }
        if(errors.country){
          $("#editMessageCountry").show().text(errors.country[0])
        }
      }
    }
  });
}

//Function to delete subscriber
function deleteSubscriber(id, email) {
  const data = { id:id, email: email }
  let url = "/delete-subscriber"

  $.ajax({
    type: "DELETE",
    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: url,
    data: data,
    dataType: 'json',
    success: function (res) {
      globalTable.ajax.reload()
      $('.alert').addClass( "alert-success" ).text('Subscriber deleted succesfully!').show("slow").delay(2000).hide("slow");
    },
    error: function (xhr, textStatus, error) {
      $('.alert').addClass( "alert-danger" ).text('Something went wrong!').show("slow").delay(2000).hide("slow");
    }
  });
}

//Function to clear error meassages in form
function clearMsg(idName) {
  $("#"+idName).hide()
}