<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index(Request $request)
	{
		$students = $this->listStudents($request);
		return view('admin/admin-students',['students'=>$students]); 
	}

	public function getStudent($seq_no)
	{
		return Student::where('seq_no',$seq_no)->get();
	}

	public function activeStudent($seq_no)
	{
		$student = Student::where('seq_no',$seq_no)->get();
		$update = ['active'=>0];
		if($student[0]->active == 0)
		{
			$update = ['active'=>1];
		}
		return Student::where('seq_no',$seq_no)->update($update);
	}

	public function listStudents(Request $request)
    {
    	$query = Student::query();
    	if($active = $request->get('active'))
    	{
    		$query->where('active', $active);
    	}
    	else
    	{
    		$query->where('active', 1);
    	}

    	if($orderBy = $request->get('orderBy'))
    	{
    		$query->orderBy($orderBy, $request->get('order'));
    	}
    	else
    	{
    		$query->orderBy('seq_no','ASC');
    	}

    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
    	if($perPage = $request->get('perPage'))
    	{
    		$students = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$students = $query->get();
    	}

        return $students;
    }

    function saveStudents(Request $request)
    {
    	/*
			Run following commands for storage link

			php artisan storage:link
    		sudo chmod -R 777 public/uploads
    		sudo chmod -R 777 storage
    	*/
		$count = Student::where('roll_no',$request->get('roll_no'))->count();
        if($count && empty($request->get('seq_no')))
        {
            return response()->json(['error' => 'Duplicate Roll No']);
        }

    	$request->validate([
          'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = null;

        // Store image in storage/app/public/images
        if ($request->file('photo')) 
        {
            $imagePath = $request->file('photo');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $imageName, 'public');
        }
        
        $data = [
        	"roll_no" => $request->get('roll_no'),
        	"full_name" => $request->get('full_name'),
        	"personal_email" => $request->get('email'),
        	"institute" => $request->get('institute'),
        	"phone" => $request->get('phone'),
        	"department" => $request->get('department'),
        	"program" => $request->get('program'),
        	"first_guide" => $request->get('first_guide'),
        	"second_guide" => $request->get('second_guide'),
        	"date_of_joining" => $request->get('date_of_joining'),
        	"research_domain" => $request->get('research'),
        	"project_title" => $request->get('project_title'),
        	"tenure" => $request->get('tenure'),
        	"stipend" => $request->get('stipend'),
            "profile_url" => $request->get('profile_id'),
            "photo" => $path,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $student = new Student($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$old = Student::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['photo']) && $old[0]['photo'] != $path)
    		{
    			if(file_exists(public_path($old[0]['photo'])))
    			{
					unlink(public_path($old[0]['photo']));
				}
    		}
    		$student->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$student->save();
    		$data['seq_no'] = $student->id;
    	}
        return response()->json($data);
    }

    public function deleteStudent($seq_no)
    {
        Student::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
