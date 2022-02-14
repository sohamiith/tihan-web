@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Students Data</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_student" class="btn btn-info w-100" id="add_student">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Create new Student
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
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Guide</th>
                            <th>Date of joining</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Program</th>
                            <th>Tenure</th>
                            <th>Stipend</th>
                            <th>Project</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_student">
                          @foreach($students as $student)
                            <tr id="row_student_{{ $student->seq_no}}">
                              <td>{{$student->roll_no}}</td>
                              <td class="text-muted">{{$student->full_name}}</td>
                              <td class="text-muted">{{$student->first_guide}}</td>
                              <td class="text-muted">{{$student->date_of_joining}}</td>
                              <td class="text-muted">{{$student->personal_email}}</td>
                              <td class="text-muted">{{$student->phone}}</td>
                              <td class="text-muted">{{$student->program}}</td>
                              <td class="text-muted">{{$student->tenure}}</td>
                              <td class="text-muted">{{$student->stipend}}</td>
                              <td class="text-muted">{{$student->project_title}}</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_student" id="edit_student" data-id="{{ $student->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_student" data-id="{{ $student->seq_no }}">Delete</a>
                                    <a class="dropdown-item" href="#">Inactive</a>
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

<div id="div_student" class="overlay">
  <div class="popup">
    <h2 id = "modal_title"></h2><br>
    <a class="close" href="#">&times;</a>
    <form action="#" enctype="multipart/form-data" id="form_student">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Enrollment No:</label>
          <input type="text" class = "form-control" id="roll_no" name="roll_no" placeholder="Enrollment No" required><br>
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
        <div class="col-md-3 col-xl-6">
          <label class="form-label required" for="program">Program:</label>
          <select name="program" id="program" class="form-select">
              <option value="mtech_TA" class="dropdown-item">M.tech TA(2 years)</option>
              <option value="mtech_RA" class="dropdown-item">M.tech RA(3 years)</option>
              <option value="phd" class="dropdown-item">PHD</option>
              <option value="pdf" class="dropdown-item">Post Doc</option>
          </select><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">First Guide:</label>
          <input type="text" class = "form-control" id="first_guide" name="first_guide" placeholder="First Guide"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Second Guide:</label>
          <input type="text" class = "form-control" id="second_guide" name="second_guide" placeholder="Second Guide"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Date Of joining:</label>
          <input type="date" class = "form-control" id="date_of_joining" name="date_of_joining" class="form-control mb-2" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Research Domain:</label>
          <input type="text" class = "form-control" id="research" name="research" placeholder="Research Domain"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label">Project Title:</label>
          <input type="text" class = "form-control" id="project_title" name="project_title" placeholder="Project Title"><br>
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

<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers:{
          'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
      }
    });
  });

  // Open add students popup
  $("#add_student").on('click',function(){
    $("#form_student").trigger('reset');
    $("#modal_title").html('Add New Student');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_student").trigger('reset');
    window.location.href = "#";

  });

  // Delete Student
  $("body").on('click','#delete_student',function(){
    var seq_no = $(this).data('id');
    confirm('Are you sure to delete?');
    $.ajax({
      type:'DELETE',
      url: "admin-students/" + seq_no
    }).done(function(res){
      $("#row_student_" + seq_no).remove();
      alert(res)
    });
  });

  // Update Students
  $("body").on('click','#edit_student',function(){
    var seq_no = $(this).data('id');
    $.get('admin-students/'+seq_no,function(res){
        $("#modal_title").html('Edit Student Data');
        $("#seq_no").val(res[0].seq_no);
        $("#roll_no").val(res[0].roll_no);
        $("#phone").val(res[0].phone);
        $("#full_name").val(res[0].full_name);
        $("#email").val(res[0].personal_email);
        $("#institute").val(res[0].institute);
        $("#department").val(res[0].department);
        $("#program").val(res[0].program);
        $("#first_guide").val(res[0].first_guide);
        $("#second_guide").val(res[0].second_guide);
        $("#date_of_joining").val(res[0].date_of_joining);
        $("#research").val(res[0].research_domain);
        $("#project_title").val(res[0].project_title);
        $("#tenure").val(res[0].tenure);
        $("#stipend").val(res[0].stipend);
        $("#profile_id").val(res[0].profile_url);
        $("#photo").val(res[0].photo);
    });
  });

  //Add students
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-students/add",
        data: formData,
        type:'POST',
        contentType: false,
        processData: false,
    }).done(function(res){
        var row = '<tr id="row_student_'+ res.seq_no + '">';
        row += '<td class="text-muted">' + res.roll_no + '</td>';
        row += '<td class="text-muted">' + res.full_name + '</td>';
        row += '<td class="text-muted">' + res.first_guide + '</td>';
        row += '<td class="text-muted">' + res.date_of_joining + '</td>';
        row += '<td class="text-muted">' + res.personal_email + '</td>';
        row += '<td class="text-muted">' + res.phone + '</td>';
        row += '<td class="text-muted">' + res.program + '</td>';
        row += '<td class="text-muted">' + res.tenure + '</td>';
        row += '<td class="text-muted">' + res.stipend + '</td>';
        row += '<td class="text-muted">' + res.project_title + '</td>';
        row += '<td>' + '<span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">View/Edit</a> <a class="dropdown-item" href="#">Delete</a> <a class="dropdown-item" href="#">Inactive</a></div> </span>' + '</td>';
        if($("#seq_no").val()){
            $("#row_student_" + res.seq_no).replaceWith(row);
        }else{
            $("#list_student").prepend(row);
        }
        $("#form_student").trigger('reset');
        window.location.href = "#";
    });
  });

</script>


@endsection