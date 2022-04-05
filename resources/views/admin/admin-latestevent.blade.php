@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Latest Events</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_event" class="btn btn-info w-100" id="add_event">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add Latest Events
              </a>
            </div>
          </div>
          <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                      <table class="table table-vcenter card-table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Event Date</th>
                            <th>Document</th>
                            <th>Image</th>
                            <th></th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_event">
                          @foreach($events as $event)
                            <tr id="row_event_{{ $event->seq_no}}">
                              <td class="text-muted">{{$event->title}}</td>
                              <td class="text-muted">{{$event->event_date}}</td>
                              <td class="text-muted"><a target="_blank" href="{{$event->document}}">View</a></td>
                              <td class="text-muted"><a target="_blank" href="{{$event->url}}">Image</a></td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_event" id="edit_event" data-id="{{ $event->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_event" data-id="{{ $event->seq_no }}">Delete</a>
                                  </div>
                                </span>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="div_event" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2>Add Latest Event</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_event">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Event Title:</label>
          <input type="text" class = "form-control" id="title" name="title" placeholder="Even Title" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Event Date:</label>
          <input type="date" class = "form-control" id="event_date" name="event_date" class="form-control mb-2" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Document Link:</label>
          <input type="text" class = "form-control" id="doc" name="doc" placeholder="Document Link"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Upload PDF File:</label>
          <input type="file" id="file_name" name="file_name">
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <input type="button" class="btn btn-secondary w-100" value="Clear" id="clear_data">
        </div>
        <div class="col-md-3 col-xl-6">
          <input type="submit" class="btn btn-success w-100" value="Save">
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers:{
          'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
      }
    });
  });

  // Open add form popup
  $("#add_event").on('click',function(){
    $("#form_event").trigger('reset');
    $("#seq_no").trigger('reset');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_event").trigger('reset');
    document.getElementById("seq_no").value = '';
  });

  // Delete Student
  $("body").on('click','#delete_event',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-latestevent/" + seq_no
      }).done(function(res){
        $("#row_event_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Update Students
  $("body").on('click','#edit_event',function(){
    var seq_no = $(this).data('id');
    $.get('admin-latestevent/'+seq_no,function(res){
        $("#seq_no").val(res[0].seq_no);
        $("#title").val(res[0].title);
        $("#event_date").val(res[0].event_date);
        $("#doc").val(res[0].doc);
        $("#file_name").val(res[0].file_name);
    });
  });

  //Add form
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    var file_data = $('#file_name').prop('files')[0];
    if(file_data)
    {
      var file_name = file_data.name;
      var file_extension = file_name.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension,['png','jpg','jpeg','gif','pdf','doc']) == -1){
        alert("Invalid file type");
      }
    }

    $.ajax({
        url:"admin-latestevent/add",
        data: formData,
        type:'POST',
        contentType: false,
        processData: false,
    }).done(function(res){
        if('error' in res)
        {
          alert(res.error);
        }
        else
        {
          var row = '<tr id="row_event_'+ res.seq_no + '">';
          row += '<td class="text-muted">' + res.title + '</td>';
          row += '<td class="text-muted">' + res.event_date + '</td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.doc + '>View</a></td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.url + '>Image</a></td>';
          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_event" id="edit_event" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_event" data-id="' + res.seq_no +'">Delete</a></div></span> </td>';

          if($("#seq_no").val()){
              $("#row_event_" + res.seq_no).replaceWith(row);
          }else{
              $("#list_event").prepend(row);
          }
        }
        
        document.getElementById("seq_no").value = '';
        $("#form_event").trigger('reset');
        window.location.href = "#";
    });
  });

</script>

@endsection