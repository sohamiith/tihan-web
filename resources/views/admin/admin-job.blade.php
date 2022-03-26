@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Jobs</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_job" class="btn btn-info w-100" id="add_job">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Jobs
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
                            <th>Description</th>
                            <th>Poster</th>
                            <th>Apply Link</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_job">
                          @foreach($jobs as $job)
                            <tr id="row_job_{{ $job->seq_no}}">
                              <td class="text-muted">{{$job->title}}</td>
                              <td class="text-muted">{{$job->description}}</td>
                              <td class="text-muted"><a target="_blank" href="{{$job->document}}">view</a></td>
                              <td class="text-muted"><a target="_blank" href="{{$job->link}}">link</a></td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_job" id="edit_job" data-id="{{ $job->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_job" data-id="{{ $job->seq_no }}">Delete</a>
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

<div id="div_job" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2>Add Job</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_job">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Title:</label>
          <input type="text" class = "form-control" id="title" name="title" placeholder="Title" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Discription:</label>
          <input type="textarea" class = "form-control" id="description" name="description" placeholder="Discription" required><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Poster Link:</label>
          <input type="text" class = "form-control" id="document" name="document" placeholder="Poster Link" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Apply Link:</label>
          <input type="text" class = "form-control" id="link" name="link" placeholder="Apply Link" required><br>
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
  $("#add_job").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_job").trigger('reset');
    $("#seq_no").trigger('reset');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_job").trigger('reset');
  });

  // Delete Student
  $("body").on('click','#delete_job',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-job/" + seq_no
      }).done(function(res){
        $("#row_job_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Update Students
  $("body").on('click','#edit_job',function(){
    var seq_no = $(this).data('id');
    $.get('admin-job/'+seq_no,function(res){
        $("#seq_no").val(res[0].seq_no);
        $("#title").val(res[0].title);
        $("#description").val(res[0].description);
        $("#document").val(res[0].document);
        $("#link").val(res[0].link);
    });
  });

  //Add form
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-job/add",
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
          var row = '<tr id="row_job_'+ res.seq_no + '">';
          row += '<td class="text-muted">' + res.title + '</td>';
          row += '<td class="text-muted">' + res.description + '</td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.document + '>view</a></td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.link + '>link</a></td>';
          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_job" id="edit_job" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_job" data-id="' + res.seq_no +'">Delete</a></div></span> </td>';

          if($("#seq_no").val()){
              $("#row_job_" + res.seq_no).replaceWith(row);
          }else{
              $("#list_job").prepend(row);
          }
        }

        document.getElementById("seq_no").value = '';
        $("#form_job").trigger('reset');
        window.location.href = "#";
    });
  });

</script>

@endsection