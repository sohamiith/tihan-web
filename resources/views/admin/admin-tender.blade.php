@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Tenders</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_tender" class="btn btn-info w-100" id="add_tender">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Tender
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
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Document</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_tender">
                          @foreach($tenders as $tender)
                            <tr id="row_tender_{{ $tender->seq_no}}">
                              <td class="text-muted">{{$tender->description}}</td>
                              <td class="text-muted">{{$tender->start_date}}</td>
                              <td class="text-muted">{{$tender->end_date}}</td>
                              <td class="text-muted"><a target="_blank" href="{{$tender->document}}">view</a></td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_tender" id="edit_tender" data-id="{{ $tender->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_tender" data-id="{{ $tender->seq_no }}">Delete</a>
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

<div id="div_tender" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2>Add Tenders</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_form">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Description:</label>
          <input type="text" class = "form-control" id="description" name="description" placeholder="Description" required><br>
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
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Document Link:</label>
          <input type="text" class = "form-control" id="document" name="document" placeholder="Document Line" required><br>
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
  $("#add_tender").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_tender").trigger('reset');
    $("#seq_no").trigger('reset');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    document.getElementById("seq_no").value = '';
    $("#form_tender").trigger('reset');
    document.getElementById("seq_no").value = '';
  });

  // Delete Student
  $("body").on('click','#delete_tender',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-tender/" + seq_no
      }).done(function(res){
        $("#row_tender_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Update Students
  $("body").on('click','#edit_tender',function(){
    var seq_no = $(this).data('id');
    $.get('admin-tender/'+seq_no,function(res){
        $("#seq_no").val(res[0].seq_no);
        $("#description").val(res[0].description);
        $("#start_date").val(res[0].start_date);
        $("#end_date").val(res[0].end_date);
        $("#document").val(res[0].document);
    });
  });

  //Add form
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-tender/add",
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
          var row = '<tr id="row_tender_'+ res.seq_no + '">';
          row += '<td class="text-muted">' + res.description + '</td>';
          row += '<td class="text-muted">' + res.start_date + '</td>';
          row += '<td class="text-muted">' + res.end_date + '</td>';
          row += '<td class="text-muted"><a target="_blank" href=' + res.document + '>view</a></td>';
          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_tender" id="edit_tender" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_tender" data-id="' + res.seq_no +'">Delete</a></div></span> </td>';

          if($("#seq_no").val()){
              $("#row_tender_" + res.seq_no).replaceWith(row);
          }else{
              $("#list_tender").prepend(row);
          }
        }

        document.getElementById("seq_no").value = '';
        $("#form_tender").trigger('reset');
        window.location.href = "#";
    });
  });

</script>

@endsection