@extends('admin/admin-master')
@section('admin-content')

<p>Admin students</p>

<form action="admin-students" method="post" enctype="multipart/form-data">
	@csrf
	<label for="roll_no">Enrollment No:</label>
    <input type="text" id="roll_no" name="roll_no" placeholder="Enrollment No" required><br>
    <input type="text" id="full_name" name="full_name" placeholder="Full Name" required><br>
    <input type="text" id="phone" name="phone" placeholder="Phone"><br>
    <input type="text" id="email" name="email" placeholder="Personal Email"><br>
    <input type="text" id="institute" name="institute" placeholder="Institute" required><br>
    <input type="text" id="department" name="department" placeholder="Department" required><br>
    <label for="program">Program:</label>
    <select name="program" id="program" placeholder="Program">
		<option value="mtech_TA">Mtech TA(2 years)</option>
		<option value="mtech_RA">Mtech RA(3 years)</option>
		<option value="phd">PHD</option>
		<option value="pdf">Post Doc</option>
	</select><br>
    <input type="text" id="first_guide" name="first_guide" placeholder="First Guide"><br>
    <input type="text" id="second_guide" name="second_guide" placeholder="Second Guide"><br>
    <input type="text" id="research" name="research" placeholder="Research Domain"><br>
    <input type="text" id="project_title" name="project_title" placeholder="Project Title"><br>
    <input type="date" id="date_of_joining" name="date_of_joining" required><br>
    <input type="text" id="tenure" name="tenure" placeholder="Tenure (In Months)" required><br>
    <input type="text" id="stipend" name="stipend" placeholder="Stipend (Per Month)" required><br>
    <input type="text" id="profile_id" name="profile_id" placeholder="Profile URL"><br>
    <input type="file" id="photo" name="photo">
    
    <input type="submit" value="Save">
</form>

@endsection