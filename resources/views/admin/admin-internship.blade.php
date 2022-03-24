@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Internship</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_internship" class="btn btn-info w-100" id="add_internship">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Internship
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
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Poster</th>
                            <th>Apply Link</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_internship">
                          @foreach($internships as $internship)
                            <tr id="row_internship_{{ $internship->seq_no}}">
                              <td class="text-muted">{{$internship->title}}</td>
                              <td class="text-muted">{{$internship->start_date}}</td>
                              <td class="text-muted">{{$internship->end_date}}</td>
                              <td class="text-muted"><a target="_blank" href="{{$internship->document}}">view</a></td>
                              <td class="text-muted"><a target="_blank" href="{{$internship->link}}">link</a></td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_internship" id="edit_internship" data-id="{{ $internship->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_internship" data-id="{{ $internship->seq_no }}">Delete</a>
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

<div id="div_internship" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2>Add Internship</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_internship">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Title:</label>
          <input type="text" class = "form-control" id="title" name="title" placeholder="Title" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Start Date:</label>
          <input type="date" class = "form-control" id="start_date" name="start_date" class="form-control mb-2" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">End Date:</label>
          <input type="date" class = "form-control" id="end_date" name="end_date" class="form-control mb-2" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Document Link:</label>
          <input type="text" class = "form-control" id="document" name="document" placeholder="Document Line" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Registration Link:</label>
          <input type="text" class = "form-control" id="link" name="link" placeholder="Registration Link" required><br>
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
  $("#add_internship").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_internship").trigger('reset');
    $("#seq_no").trigger('reset');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_internship").trigger('reset');
  });

  // Delete Student
  $("body").on('click','#delete_internship',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-internship/" + seq_no
      }).done(function(res){
        $("#row_internship_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Update Students
  $("body").on('click','#edit_internship',function(){
    var seq_no = $(this).data('id');
    $.get('admin-internship/'+seq_no,function(res){
        $("#seq_no").val(res[0].seq_no);
        $("#title").val(res[0].title);
        $("#start_date").val(res[0].start_date);
        $("#end_date").val(res[0].end_date);
        $("#document").val(res[0].document);
        $("#link").val(res[0].link);
    });
  });

  //Add form
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-internship/add",
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
          var row = '<tr id="row_internship_'+ res.seq_no + '">';
          row += '<td class="text-muted">' + res.title + '</td>';
          row += '<td class="text-muted">' + res.start_date + '</td>';
          row += '<td class="text-muted">' + res.end_date + '</td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.document + '>view</a></td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.link + '>link</a></td>';
          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_internship" id="edit_internship" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_internship" data-id="' + res.seq_no +'">Delete</a></div></span> </td>';

          if($("#seq_no").val()){
              $("#row_internship_" + res.seq_no).replaceWith(row);
          }else{
              $("#list_internship").prepend(row);
          }
        }

        document.getElementById("seq_no").value = '';
        $("#form_internship").trigger('reset');
        window.location.href = "#";
    });
  });

</script>

@endsection