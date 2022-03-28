@extends('admin/admin-master')
@section('admin-content')

<div class="wrapper">
  <div class="page-wrapper">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <br><h1 class="page-title">Tihan Assets Data</h1><br>
          </div>
          <div class="col-auto ms-auto d-print-none btn-list">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3">
              <a href="#div_asset" class="btn btn-info w-100" id="add_asset">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Asset
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
                            <th>Asset ID</th>
                            <th>Name</th>
                            <th>Category (Book)</th>
                            <th>Categoty (Fin)</th>
                            <th>Identification</th>
                            <th>life</th>
                            <th>Use</th>
                            <th>Order Date</th>
                            <th>Supplier Name</th>
                            <th>Voucher</th>
                            <th>Cost</th>
                            <th>Discount</th>
                            <th>Receive Date</th>
                            <th>Remaing Life</th>
                            <th>Days</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="list_asset">
                          @foreach($assets as $asset)
                            <tr id="row_asset_{{ $asset->seq_no}}">
                              <td class="text-muted">{{$asset->asset_id}}</td>
                              <td class="text-muted">{{$asset->name}}</td>
                              <td class="text-muted">{{$asset->category_book}}</td>
                              <td class="text-muted">{{$asset->category_fin}}</td>
                              <td class="text-muted">{{$asset->identification}}</td>
                              <td class="text-muted">{{$asset->life}}</td>
                              <td class="text-muted">{{$asset->user}}</td>
                              <td class="text-muted">{{$asset->order_date}}</td>
                              <td class="text-muted">{{$asset->supplier_name}}</td>
                              <td class="text-muted">{{$asset->voucher}}</td>
                              <td class="text-muted">{{$asset->cost}}</td>
                              <td class="text-muted">{{$asset->discount}}</td>
                              <td class="text-muted">{{$asset->receive_date}}</td>
                              <td class="text-muted">{{$asset->remaining}}</td>
                              <td class="text-muted">{{$asset->days}}</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#div_asset" id="edit_asset" data-id="{{ $asset->seq_no }}">View/Edit</a>
                                    <a class="dropdown-item" href="#" id="delete_asset" data-id="{{ $asset->seq_no }}">Delete</a>
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

<div id="div_asset" class="overlay">
  <div class="popup">
    <div class="modal-header">
      <h2>Add Assets</h2><br>
      <a class="close" href="#">&times;</a>
    </div>
    <div class="modal-body">
    <form action="#" enctype="multipart/form-data" id="form_asset">
      <input type="hidden" class = "form-control" id="seq_no" name="seq_no">
      <input type="hidden" class = "form-control" id="active" name="active">
      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Asset ID:</label>
          <input type="text" class = "form-control" id="asset_id" name="asset_id" placeholder="Asset ID" required><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Name:</label>
          <input type="text" class = "form-control" id="name" name="name" placeholder="Name" required><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required" for="category_book">Category In Book:</label>
          <select name="category_book" id="category_book" class="form-select">
              <option value="self" class="dropdown-item">Self</option>
              <option value="plant" class="dropdown-item">Plant & Machinery</option>
              <option value="fur" class="dropdown-item">Furniture & Fixtures</option>
              <option value="office" class="dropdown-item">Office Equipment</option>
              <option value="com" class="dropdown-item">Computer & Software</option>
              <option value="ec" class="dropdown-item">Electrical Fittings</option>
          </select><br>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-12">
          <label class="form-label required" for="category_fin">Category In Financial:</label>
          <select name="category_fin" id="category_fin" class="form-select">
              <option value="self" class="dropdown-item">Self</option>
              <option value="plant" class="dropdown-item">Plant & Machinery</option>
              <option value="fur" class="dropdown-item">Furniture & Fixtures</option>
              <option value="office" class="dropdown-item">Office Equipment</option>
              <option value="com" class="dropdown-item">Computer & Software</option>
              <option value="ec" class="dropdown-item">Electrical Fittings</option>
          </select><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Identification:</label>
          <input type="text" class = "form-control" id="identification" name="identification" placeholder="Identification"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Life:</label>
          <input type="text" class = "form-control" id="life" name="life" placeholder="Life"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Use:</label>
          <input type="text" class = "form-control" id="user" name="user" class="form-control" placeholder="Use"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Order Date:</label>
          <input type="date" class = "form-control" id="order_date" name="order_date" class="form-control mb-2"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Cost:</label>
          <input type="text" class = "form-control" id="cost" name="cost" class="form-control" placeholder="Cost"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Discount:</label>
          <input type="text" class = "form-control" id="discount" name="discount" placeholder="Discount"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Supplier Name:</label>
          <input type="text" class = "form-control" id="supplier_name" name="supplier_name" class="form-control" placeholder="Supplier Name"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Voucher:</label>
          <input type="text" class = "form-control" id="voucher" name="voucher" placeholder="Voucher"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label required">Remaing Life:</label>
          <input type="text" class = "form-control" id="remaining" name="remaining" class="form-control" placeholder="Remaing Life"><br>
        </div>
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Days:</label>
          <input type="text" class = "form-control" id="days" name="days" placeholder="Days"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xl-6">
          <label class="form-label">Receive Date:</label>
          <input type="date" class = "form-control" id="receive_date" name="receive_date" class="form-control mb-2"><br>
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

  // Open add assets popup
  $("#add_asset").on('click',function(){
    $("#form_asset").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
  });

  // Clear form data
  $("#clear_data").on('click',function(){
    $("#form_asset").trigger('reset');
    document.getElementById("seq_no").value = '';
    document.getElementById("active").value = '';
  });

  // Delete Student
  $("body").on('click','#delete_asset',function(){
    var seq_no = $(this).data('id');
    if (confirm('Are you sure to delete?') == true)
    {
      $.ajax({
        type:'DELETE',
        url: "admin-assets/" + seq_no
      }).done(function(res){
        $("#row_asset_" + seq_no).remove();
        alert(res)
      });
    }
  });

  // Update Students
  $("body").on('click','#edit_asset',function(){
    var seq_no = $(this).data('id');
    $.get('admin-assets/'+seq_no,function(res){
        $("#seq_no").val(res[0].seq_no);
        $("#asste_id").val(res[0].asste_id);
        $("#name").val(res[0].name);
        $("#category_book").val(res[0].category_book);
        $("#category_fin").val(res[0].category_fin);
        $("#identification").val(res[0].identification);
        $("#life").val(res[0].life);
        $("#user").val(res[0].user);
        $("#order_date").val(res[0].order_date);
        $("#supplier_name").val(res[0].supplier_name);
        $("#voucher").val(res[0].voucher);
        $("#cost").val(res[0].cost);
        $("#discount").val(res[0].discount);
        $("#receive_date").val(res[0].receive_date);
        $("#remaining").val(res[0].remaining);
        $("#days").val(res[0].days);
    });
  });

  //Add assets
  $("form").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url:"admin-assets/add",
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
        var row = '<tr id="row_asset_'+ res.seq_no + '">';
        row += '<td class="text-muted">' + res.asset_id + '</td>';
        row += '<td class="text-muted">' + res.name + '</td>';
        row += '<td class="text-muted">' + res.category_book + '</td>';
        row += '<td class="text-muted">' + res.category_fin + '</td>';
        row += '<td class="text-muted">' + res.identification + '</td>';
        row += '<td class="text-muted">' + res.life + '</td>';
        row += '<td class="text-muted">' + res.user + '</td>';
        row += '<td class="text-muted">' + res.order_date + '</td>';
        row += '<td class="text-muted">' + res.supplier_name + '</td>';
        row += '<td class="text-muted">' + res.voucher + '</td>';
        row += '<td class="text-muted">' + res.cost + '</td>';
        row += '<td class="text-muted">' + res.discount + '</td>';
        row += '<td class="text-muted">' + res.receive_date + '</td>';
        row += '<td class="text-muted">' + res.remaining + '</td>';
        row += '<td class="text-muted">' + res.days + '</td>';
        row += '<td class="text-end"> <span class="dropdown"> <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button> <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#div_asset" id="edit_asset" data-id="' + res.seq_no + '">View/Edit</a> <a class="dropdown-item" href="#" id="delete_asset" data-id="' + res.seq_no +'">Delete</a> </div></span> </td>';

        if($("#seq_no").val()){
            $("#row_asset_" + res.seq_no).replaceWith(row);
        }else{
            $("#list_asset").prepend(row);
        }
      }
      document.getElementById("seq_no").value = '';
      document.getElementById("active").value = '';
      $("#form_asset").trigger('reset');
      window.location.href = "#";
    });
  });

</script>


@endsection