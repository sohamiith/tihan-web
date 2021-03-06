@extends('admin/admin-master')
@section('admin-content')

<div class="page-wrapper">
	<div class="page-body">
         <div class="container-xl">
            <div class="row row-cards">
            	<div class="col-md-6 col-lg-4">
            	</div>
            	<div class="col-md-6 col-lg-4">
                	<div class="card">
	                    <div class="card-body p-4 text-center">
	                    <span class="avatar avatar-xl mb-3 avatar-rounded">AD</span>
	                    <h3 class="m-0 mb-1">{{Session::get('person')->full_name}}</h3>
	                    <div class="text-muted">Tihan Staff</div>
	                    <div class="mt-3">
	                        <span class="badge bg-green-lt">Admin</span>
	                    </div>
	                    </div>
	                    <div class="d-flex">
	                    <a href="#" class="card-btn">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.823 19.824a2 2 0 0 1 -1.823 1.176h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 1.175 -1.823m3.825 -.177h9a2 2 0 0 1 2 2v9" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="4" /><path d="M4 11h7m4 0h5" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /><line x1="3" y1="3" x2="21" y2="21" /></svg>
	                        Apply Leave</a>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection