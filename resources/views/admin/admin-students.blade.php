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
                Add New Student
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
                            <th>Date of joining</th>
                            <th>Phone</th>
                            <th>Program</th>
                            <th>Tenure</th>
                            <th>Stipend</th>
                            <th>Profile Photo</th>
                            <th>Aadhar</th>
                            <th>Pan card</th>
                            <th>Passbook</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_student">
                          @foreach($students as $student)
                            <tr id="row_student_{{ $student->seq_no}}">
                              <td>{{$student->roll_no}}</td>
                              <td class="text-muted">{{$student->full_name}}</td>
                              <td class="text-muted">{{$student->date_of_joining}}</td>
                              <td class="text-muted">{{$student->phone}}</td>
                              <td class="text-muted">{{$student->program}}</td>
                              <td class="text-muted">{{$student->tenure}}</td>
                              <td class="text-muted">{{$student->stipend}}</td>
                              @if($student->photo_url)
                                <td class="text-muted"><a target="_blank" href="{{$student->photo_url}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($student->aadhar_url)
                                <td class="text-muted"><a target="_blank" href="{{$student->aadhar_url}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($student->pan_url)
                                <td class="text-muted"><a target="_blank" href="{{$student->pan_url}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              @if($student->passbook_url)
                                <td class="text-muted"><a target="_blank" href="{{$student->passbook_url}}">view</a></td>
                                @else
                                <td class="text-muted">None</td>
                              @endif
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_student" id="edit_student" data-id="{{ $student->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_student" data-id="{{ $student->seq_no }}">Delete</a>
                                    <a class="dropdown-item" id="active_student" data-id="{{ $student->seq_no }}">Inactive</a>
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
    <div class="modal-header">
      <h2 id = "modal_title">Add Student</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_student">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <input type="hidden" class = "form-control" id="active" name="active">
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Enrollment No:</label>
          <input type="text" class = "form-control" id="roll_no" name="roll_no" placeholder="Enrollment No" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label ">Contact No:</label>
          <input type="text" class = "form-control" id="phone" name="phone" placeholder="Phone No" ><br>
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
          <label class="form-label ">Email ID:</label>
          <input type="text" class = "form-control" id="email" name="email" placeholder="Email ID" ><br>
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
          <label class="form-label ">Stipend (Per Month):</label>
          <input type="text" class = "form-control" id="stipend" name="stipend" placeholder="Stipend (Per Month)" ><br>
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
          <label class="form-label">Aadhar card:</label>
          <input type="file" id="aadhar" name="aadhar"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Passbook Copy:</label>
          <input type="file" id="passbook" name="passbook">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Pan card:</label>
          <input type="file" id="pan" name="pan"><br>
        </div>
      </div>
      <br>
      <div class="row">
        <label class="form-label">Permissions</label>
        <div class="divide-y">
          <div>
            <label class="row">
              <span class="col">Login Access</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="login_per" id="login_per" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Apply Leave</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="leave_apply" id="leave_apply" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Leave Management Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="leave_management" id="leave_management" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">HR Management Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="hr" id="hr" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Assets Management Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="assets" id="assets" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Website Management Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="website_date" id="website_data" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Accounts Management Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="accounts" id="accounts" value="1">
                </label>
              </span>
            </label>
          </div>
          <div>
            <label class="row">
              <span class="col">Attendance Module</span>
              <span class="col-auto">
                <label class="form-check form-check-single form-switch">
                  <input class="form-check-input" type="checkbox" name="attendance" id="attendance" value="1">
                </label>
              </span>
            </label>
          </div>
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

  // Open add students popup
  $("#add_student").on('click',function(){
    $("#form_student").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
    document.getElementById("login_per").value = '';
    document.getElementById("leave_management").value = '';
    document.getElementById("leave_apply").value = '';
    document.getElementById("hr").value = '';
    document.getElementById("accounts").value = '';
    document.getElementById("assets").value = '';
    document.getElementById("website_data").value = '';
    document.getElementById("attendance").value = '';
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_student").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
    document.getElementById("login_per").value = '';
    document.getElementById("leave_management").value = '';
    document.getElementById("leave_apply").value = '';
    document.getElementById("hr").value = '';
    document.getElementById("accounts").value = '';
    document.getElementById("assets").value = '';
    document.getElementById("website_data").value = '';
    document.getElementById("attendance").value = '';
  });

  // Delete Student
  $("body").on('click','#delete_student',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-students/" + seq_no
      }).done(function(res){
        $("#row_student_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Active/Inactive Student
  $("body").on('click','#active_student',function(){
    var seq_no = $(this).data('id');
    $.ajax({
      type:'GET',
      url: "admin-students/active/" + seq_no
    }).done(function(res){
      $("#row_student_" + seq_no).remove();
    });
  });

  // Update Students
  $("body").on('click','#edit_student',function(){
    var seq_no = $(this).data('id');
    $.get('admin-students/'+seq_no,function(res){
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
        $("#pan").val(res[0].pan);
        $("#aadhar").val(res[0].aadhar);
        $("#passbook").val(res[0].passbook);
        $("#hr").val(res[0].hr);
        $("#website_data").val(res[0].website_data);
        $("#login_per").val(res[0].login_per);
        $("#attendance").val(res[0].attendance);
        $("#leave_apply").val(res[0].leave_apply);
        $("#leave_management").val(res[0].leave_management);
        $("#assets").val(res[0].assets);
        $("#accounts").val(res[0].accounts);
    });
  });

  //Add students
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    var file_data1 = $('#photo').prop('files')[0];
    if(file_data1)
    {
      var file_name1 = file_data1.name;
      var file_extension1 = file_name1.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension1,['png','jpg','jpeg','gif']) == -1){
        alert("Invalid file type");
      }
    }

    var file_data2 = $('#pan').prop('files')[0];
    if(file_data2)
    {
      var file_name2 = file_data2.name;
      var file_extension2 = file_name2.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension2,['png','jpg','jpeg','gif','pdf','doc']) == -1){
        alert("Invalid file type");
      }
    }

    var file_data3 = $('#passbook').prop('files')[0];
    if(file_data3)
    {
      var file_name3 = file_data3.name;
      var file_extension3 = file_name3.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension3,['png','jpg','jpeg','gif','pdf','doc']) == -1){
        alert("Invalid file type");
      }
    }

    var file_data4 = $('#aadhar').prop('files')[0];
    if(file_data4)
    {
      var file_name4 = file_data4.name;
      var file_extension4 = file_name4.split('.').pop().toLowerCase();
      if(jQuery.inArray(file_extension4,['png','jpg','jpeg','gif','pdf','doc']) == -1){
        alert("Invalid file type");
      }
    }


    $.ajax({
        url:"admin-students/add",
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
        var row = '<tr id="row_student_'+ res.seq_no + '">';
        row += '<td class="text-muted">' + res.roll_no + '</td>';
        row += '<td class="text-muted">' + res.full_name + '</td>';
        row += '<td class="text-muted">' + res.date_of_joining + '</td>';
        row += '<td class="text-muted">' + res.phone + '</td>';
        row += '<td class="text-muted">' + res.program + '</td>';
        row += '<td class="text-muted">' + res.tenure + '</td>';
        row += '<td class="text-muted">' + res.stipend + '</td>';
        if(res.photo_url){
          row += '<td class="text-muted"><a target="_blank" href=' + res.photo_url + '>view</a></td>';  
        }
        else{
          row += '<td class="text-muted">None</td>';
        }
        if(res.aadhar_url){
          row += '<td class="text-muted"><a target="_blank" href=' + res.aadhar_url + '>view</a></td>';  
        }
        else{
          row += '<td class="text-muted">None</td>';
        }
        if(res.pan_url){
          row += '<td class="text-muted"><a target="_blank" href=' + res.pan_url + '>view</a></td>';  
        }
        else{
          row += '<td class="text-muted">None</td>';
        }
        if(res.passbook_url){
          row += '<td class="text-muted"><a target="_blank" href=' + res.passbook_url + '>view</a></td>';  
        }
        else{
          row += '<td class="text-muted">None</td>';
        }
        row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_student" id="edit_student" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_student" data-id="' + res.seq_no +'">Delete</a> <a class="dropdown-item" id="active_student" data-id="'+res.seq_no +'">Inactive</a> </div></span> </td>';

        if($("#seq_no").val()){
            $("#row_student_" + res.seq_no).replaceWith(row);
        }else{
            $("#list_student").prepend(row);
        }
      }
      document.getElementById("seq_no").value = '';
      document.getElementById("active").value = '';
      document.getElementById("login_per").value = '';
      document.getElementById("leave_management").value = '';
      document.getElementById("leave_apply").value = '';
      document.getElementById("hr").value = '';
      document.getElementById("accounts").value = '';
      document.getElementById("assets").value = '';
      document.getElementById("website_data").value = '';
      document.getElementById("attendance").value = '';
      $("#form_student").trigger('reset');
      window.location.href = "#";
    });
  });

</script>


@endsection