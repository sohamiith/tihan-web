@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Events</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_event" class="btn btn-info w-100" id="add_event">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Events
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
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
                            <th>Image 4</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_event">
                          @foreach($events as $event)
                            <tr id="row_event_{{ $event->seq_no}}">
                              <td class="text-muted">{{$event->title}}</td>
                              <td class="text-muted">{{$event->event_date}}</td>
                              @if($event->url1)
                                <td class="text-muted"><a target="_blank" href="{{$event->url1}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($event->url2)
                                <td class="text-muted"><a target="_blank" href="{{$event->url2}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($event->url3)
                                <td class="text-muted"><a target="_blank" href="{{$event->url3}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($event->url4)
                                <td class="text-muted"><a target="_blank" href="{{$event->url4}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" id="delete_event" data-id="{{ $event->seq_no }}">Delete</a>
                                    </a>
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
      <h2>Upload Form</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_event">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Form Title:</label>
          <input type="text" class = "form-control" id="title" name="title" placeholder="Form Title" required><br>
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
          <label class="form-label required">Upload File1:</label>
          <input type="file" id="file1" name="file1">
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Upload File2:</label>
          <input type="file" id="file2" name="file2">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Upload File3:</label>
          <input type="file" id="file3" name="file3">
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Upload File4:</label>
          <input type="file" id="file4" name="file4">
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
        url: "admin-events/" + seq_no
      }).done(function(res){
        $("#row_event_" + seq_no).remove();
        alert(res)
      });
    }
  });

  //Add form
  $("form").on('submit',function(e){
    console.log("here");
    e.preventDefault();
    let formData = new FormData(this);
    var file_data1 = $('#file1').prop('files')[0];
    if(file_name1){
      var file_name1 = file_data1.name;
      var file_extension1 = file_name1.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension1,['pdf','doc','jpeg','jpg','png','gif']) == -1){
        alert("Invalid file type");
      }
    }
    
    var file_data2 = $('#file2').prop('files')[0];
    if(file_data2)
    {
      var file_name2 = file_data2.name;
      var file_extension2 = file_name2.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension2,['pdf','doc','jpeg','jpg','png','gif']) == -1){
        alert("Invalid file type");
      }
    }
    
    var file_data3 = $('#file3').prop('files')[0];
    if(file_data3)
    {
      var file_name3 = file_data3.name;
      var file_extension3 = file_name3.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension3,['pdf','doc','jpeg','jpg','png','gif']) == -1){
        alert("Invalid file type");
      }
    }

    var file_data4 = $('#file4').prop('files')[0];

    if(file_data4)
    {
      var file_name4 = file_data4.name;
      var file_extension4 = file_name4.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension4,['pdf','doc','jpeg','jpg','png','gif']) == -1){
        alert("Invalid file type");
      }
    }

    $.ajax({
        url:"admin-events/add",
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
          if(res.url1){
            row += '<td class="text-muted"><a target="_blank" href=' + res.url1 + '>view</a></td>';  
          }
          else{
            row += '<td class="text-muted">None</td>';
          }

          if(res.url2){
            row += '<td class="text-muted"><a target="_blank" href=' + res.url2 + '>view</a></td>';  
          }
          else{
            row += '<td class="text-muted">None</td>';
          }

          if(res.url3){
            row += '<td class="text-muted"><a target="_blank" href=' + res.url3 + '>view</a></td>';  
          }
          else{
            row += '<td class="text-muted">None</td>';
          }

          if(res.url4){
            row += '<td class="text-muted"><a target="_blank" href=' + res.url4 + '>view</a></td>';  
          }
          else{
            row += '<td class="text-muted">None</td>';
          }

          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#" id="delete_event" data-id="' + res.seq_no + '">Delete</a> </div></span> </td>';

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