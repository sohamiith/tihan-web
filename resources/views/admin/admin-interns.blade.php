@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Interns Data</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_intern" class="btn btn-info w-100" id="add_intern">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Create new Intern
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
                            <th>Internship ID</th>
                            <th>Name</th>
                            <th>Supervisior</th>
                            <th>Date of joining</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Name of Institute</th>
                            <th>Qualification</th>
                            <th>Tenure</th>
                            <th>Department</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_intern">
                          @foreach($interns as $intern)
                            <tr id="row_intern_{{ $intern->seq_no}}">
                              <td>{{$intern->intern_no}}</td>
                              <td class="text-muted">{{$intern->full_name}}</td>
                              <td class="text-muted">{{$intern->guide}}</td>
                              <td class="text-muted">{{$intern->date_of_joining}}</td>
                              <td class="text-muted">{{$intern->personal_email}}</td>
                              <td class="text-muted">{{$intern->phone}}</td>
                              <td class="text-muted">{{$intern->institute}}</td>
                              <td class="text-muted">{{$intern->qualification}}</td>
                              <td class="text-muted">{{$intern->tenure}}</td>
                              <td class="text-muted">{{$intern->department}}</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_intern" id="edit_intern" data-id="{{ $intern->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_intern" data-id="{{ $intern->seq_no }}">Delete</a>
                                    <a class="dropdown-item" id="active_intern" data-id="{{ $intern->seq_no }}">Inactive</a>
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

<div id="div_intern" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2 id = "modal_title"></h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_intern">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <input type="hidden" class = "form-control" id="active" name="active">
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Enrollment No:</label>
          <input type="text" class = "form-control" id="intern_no" name="intern_no" placeholder="Internship ID" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Contact No:</label>
          <input type="text" class = "form-control" id="phone" name="phone" placeholder="Phone No" required><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Full Name:</label>
          <input type="text" class = "form-control" id="full_name" name="full_name" placeholder="Full Name" required><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Email ID:</label>
          <input type="text" class = "form-control" id="email" name="email" placeholder="Email ID" required><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required">Institute Name:</label>
          <input type="text" class = "form-control" id="institute" name="institute" placeholder="Institute" required><br>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Department Name:</label>
          <input type="text" class = "form-control" id="department" name="department" placeholder="Department" required><br>
        </div>
        <!-- <div class="col-md-3 col-xl-6">
          <label class="form-label required" for="program">Program:</label>
          <select name="program" id="program" class="form-select">
              <option value="mtech_TA" class="dropdown-item">M.tech TA(2 years)</option>
              <option value="mtech_RA" class="dropdown-item">M.tech RA(3 years)</option>
              <option value="phd" class="dropdown-item">PHD</option>
              <option value="pdf" class="dropdown-item">Post Doc</option>
          </select><br>
        </div> -->
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">First Guide:</label>
          <input type="text" class = "form-control" id="guide" name="guide" placeholder="Guide"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Qualification</label>
          <input type="text" class = "form-control" id="qualification" name="qualification" placeholder="Recent qualification"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Date Of joining:</label>
          <input type="date" class = "form-control" id="date_of_joining" name="date_of_joining" class="form-control mb-2" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Internship Role:</label>
          <input type="text" class = "form-control" id="role" name="role" placeholder="Role"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label">Work Domain:</label>
          <input type="text" class = "form-control" id="work_area" name="work_area" placeholder="Work area"><br>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Tenure (In Months):</label>
          <input type="text" class = "form-control" id="tenure" name="tenure" placeholder="Tenure (In Months)" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Stipend (Per Month):</label>
          <input type="text" class = "form-control" id="stipend" name="stipend" placeholder="Stipend (Per Month)" required><br>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Profile URL:</label>
          <input type="text" class = "form-control" id="profile_id" name="profile_id" placeholder="Profile URL"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Profile Picture:</label>
          <input type="file" id="photo" name="photo">
        </div>
      </div>
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

  // Open add intern popup
  $("#add_intern").on('click',function(){
    $("#form_intern").trigger('reset');
    $("#modal_title").html('Add New Intern');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_intern").trigger('reset');
  });

  // Delete intern
  $("body").on('click','#delete_intern',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-interns/" + seq_no
      }).done(function(res){
        $("#row_intern_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Active/Inactive Intern
  $("body").on('click','#active_intern',function(){
    var seq_no = $(this).data('id');
    var seq_no = $(this).data('id');
    $.ajax({
      type:'GET',
      url: "admin-interns/active/" + seq_no
    }).done(function(res){
      $("#row_intern_" + seq_no).remove();
    });
  });

  // Update intern
  $("body").on('click','#edit_intern',function(){
    var seq_no = $(this).data('id');
    $.get('admin-interns/'+seq_no,function(res){
        $("#modal_title").html('Edit Intern Data');
        $("#seq_no").val(res[0].seq_no);
        $("#intern_no").val(res[0].intern_no);
        $("#phone").val(res[0].phone);
        $("#full_name").val(res[0].full_name);
        $("#email").val(res[0].personal_email);
        $("#institute").val(res[0].institute);
        $("#department").val(res[0].department);
        // $("#program").val(res[0].program);
        $("#guide").val(res[0].guide);
        $("#qualification").val(res[0].qualification);
        $("#date_of_joining").val(res[0].date_of_joining);
        $("#role").val(res[0].role);
        $("#work_area").val(res[0].work_area);
        $("#tenure").val(res[0].tenure);
        $("#stipend").val(res[0].stipend);
        $("#profile_id").val(res[0].profile_url);
        $("#photo").val(res[0].photo);
    });
  });

  //Add Intern
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-interns/add",
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
        var row = '<tr id="row_intern_'+ res.seq_no + '">';
        row += '<td class="text-muted">' + res.intern_no + '</td>';
        row += '<td class="text-muted">' + res.full_name + '</td>';
        row += '<td class="text-muted">' + res.guide + '</td>';
        row += '<td class="text-muted">' + res.date_of_joining + '</td>';
        row += '<td class="text-muted">' + res.personal_email + '</td>';
        row += '<td class="text-muted">' + res.phone + '</td>';
        row += '<td class="text-muted">' + res.institute + '</td>';
        row += '<td class="text-muted">' + res.qualification + '</td>';
        row += '<td class="text-muted">' + res.tenure + '</td>';
        row += '<td class="text-muted">' + res.department + '</td>';
        row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_intern" id="edit_intern" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_intern" data-id="' + res.seq_no +'">Delete</a> <a class="dropdown-item" id="active_intern" data-id="'+res.seq_no +'">Inactive</a> </div></span> </td>';

        if($("#seq_no").val()){
            $("#row_intern_" + res.seq_no).replaceWith(row);
        }else{
            $("#list_intern").prepend(row);
        }
      }
      document.getElementById("seq_no").value = '';
      document.getElementById("active").value = '';
      $("#form_intern").trigger('reset');
      window.location.href = "#";
    });
  });

</script>


@endsection