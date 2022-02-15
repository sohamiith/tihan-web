@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Researcher Data</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_staff" class="btn btn-info w-100" id="add_staff">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Researcher
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
                            <th>Emp ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Date of joining</th>
                            <th>Date of Exit</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Reporting Incharge</th>
                            <th>Qualification</th>
                            <th>Tenure</th>
                            <th>Salary</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_staff">
                          @foreach($staffs as $staff)
                            <tr id="row_staff_{{ $staff->seq_no}}">
                              <td>{{$staff->emp_id}}</td>
                              <td class="text-muted">{{$staff->full_name}}</td>
                              <td class="text-muted">{{$staff->designation}}</td>
                              <td class="text-muted">{{$staff->date_of_joining}}</td>
                              <td class="text-muted">{{$staff->date_of_exit}}</td>
                              <td class="text-muted">{{$staff->email}}</td>
                              <td class="text-muted">{{$staff->phone}}</td>
                              <td class="text-muted">{{$staff->reporting}}</td>
                              <td class="text-muted">{{$staff->qualification}}</td>
                              <td class="text-muted">{{$staff->tenure}}</td>
                              <td class="text-muted">{{$staff->salary}}</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_staff" id="edit_staff" data-id="{{ $staff->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_staff" data-id="{{ $staff->seq_no }}">Delete</a>
                                    <a class="dropdown-item" id="active_staff" data-id="{{ $staff->seq_no }}">Inactive</a>
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

<div id="div_staff" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2 id = "modal_title"></h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_staff">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <input type="hidden" class = "form-control" id="active" name="active">
      <input type="hidden" class = "form-control" id="type" name="type" value=3>
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Emp ID:</label>
          <input type="text" class = "form-control" id="emp_id" name="emp_id" placeholder="Emp ID" required><br>
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
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Designation:</label>
          <input type="text" class = "form-control" id="designation" name="designation" placeholder="Designation" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Qualification:</label>
          <input type="text" class = "form-control" id="qualification" name="qualification" placeholder="Qualification"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label">Reporting Incharge:</label>
          <input type="text" class = "form-control" id="reporting" name="reporting" placeholder="Reporting Incharge"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Date Of joining:</label>
          <input type="date" class = "form-control" id="date_of_joining" name="date_of_joining" class="form-control mb-2" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Date Of Exit:</label>
          <input type="date" class = "form-control" id="date_of_exit" name="date_of_exit" class="form-control mb-2"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Tenure (In Months):</label>
          <input type="text" class = "form-control" id="tenure" name="tenure" placeholder="Tenure (In Months)"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Salary (Per Month):</label>
          <input type="text" class = "form-control" id="salary" name="salary" placeholder="Stipend (Per Month)" required><br>
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

  // Open add staff popup
  $("#add_staff").on('click',function(){
    $("#form_staff").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
    $("#modal_title").html('Add New Member');
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_staff").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
  });

  // Delete Student
  $("body").on('click','#delete_staff',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-staff/" + seq_no
      }).done(function(res){
        $("#row_staff_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Active/Inactive Student
  $("body").on('click','#active_staff',function(){
    var seq_no = $(this).data('id');
    $.ajax({
      type:'GET',
      url: "admin-staff/active/" + seq_no
    }).done(function(res){
      $("#row_staff_" + seq_no).remove();
    });
  });

  // Update Students
  $("body").on('click','#edit_staff',function(){
    var seq_no = $(this).data('id');
    $.get('admin-staff/'+seq_no,function(res){
        $("#modal_title").html('Edit Researcher Data');
        $("#seq_no").val(res[0].seq_no);
        $("#emp_id").val(res[0].emp_id);
        $("#phone").val(res[0].phone);
        $("#full_name").val(res[0].full_name);
        $("#email").val(res[0].email);
        $("#qualification").val(res[0].qualification);
        $("#designation").val(res[0].designation);
        $("#reporting").val(res[0].reporting);
        $("#date_of_exit").val(res[0].date_of_exit);
        $("#date_of_joining").val(res[0].date_of_joining);
        $("#tenure").val(res[0].tenure);
        $("#salary").val(res[0].salary);
    });
  });

  //Add staff
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-staff/add",
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
          var row = '<tr id="row_staff_'+ res.seq_no + '">';
          row += '<td class="text-muted">' + res.emp_id + '</td>';
          row += '<td class="text-muted">' + res.full_name + '</td>';
          row += '<td class="text-muted">' + res.designation + '</td>';
          row += '<td class="text-muted">' + res.date_of_joining + '</td>';
          row += '<td class="text-muted">' + res.date_of_exit + '</td>';
          row += '<td class="text-muted">' + res.email + '</td>';
          row += '<td class="text-muted">' + res.phone + '</td>';
          row += '<td class="text-muted">' + res.reporting + '</td>';
          row += '<td class="text-muted">' + res.qualification + '</td>';
          row += '<td class="text-muted">' + res.tenure + '</td>';
          row += '<td class="text-muted">' + res.salary + '</td>';
          row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_staff" id="edit_staff" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_staff" data-id="' + res.seq_no +'">Delete</a> <a class="dropdown-item" id="active_staff" data-id="'+res.seq_no +'">Inactive</a> </div></span> </td>';

          if(res.active == 0)
          {
            $("#row_staff_" + res.seq_no).remove();
          }
          else if($("#seq_no").val()){
              $("#row_staff_" + res.seq_no).replaceWith(row);
          }else{
              $("#list_staff").prepend(row);
          }
        }
        
        document.getElementById("seq_no").value = '';
        document.getElementById("active").value = '';
        $("#form_staff").trigger('reset');
        window.location.href = "#";
    });
  });

</script>


@endsection