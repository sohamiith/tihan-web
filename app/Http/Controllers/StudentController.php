<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\User;
class StudentController extends Controller
{
    public function index(Request $request)
	{
		$students = $this->listStudents($request);
		return view('admin/admin-students',['students'=>$students]); 
	}

    public function studentDetails(Request $request)
    {
        $program = $request->input('program');
        $students = $this->listStudentsByGroup($program);
        return view('team-students',['students'=>$students]); 
    }

    public function listStudentsByGroup($program)
    {
        $query = Student::query();
        $query->select('roll_no','full_name','program','project_title','photo','profile_url','photo_url');
        $query->where('active', 1);
        switch ($program)
        {
            case 'phd':
                $query->where('program', 'phd');
                break;
            case 'pdf':
                $query->where('program', 'pdf');
                break;
            default:
                $query->where('program', 'mtech_TA')->orWhere('program', 'mtech_RA');
                break;
        }        

        $query->orderBy('date_of_joining', 'DESC');
        $students = $query->get();

        return $students;
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
		$count = Student::where('roll_no',$request->get('roll_no'))->count();
        if($count && empty($request->get('seq_no')))
        {
            return response()->json(['error' => 'Duplicate Roll No']);
        }

        $path1 = null;
        $path2 = null;
        $path3 = null;
        $path4 = null;

        if ($request->photo) 
        {
            $imagePath = $request->photo;
            $imageName = $imagePath->getClientOriginalName();
            $path1 = $request->file(key: 'photo')->store(path:'students', options:'s3');
            Storage::disk('s3')->setVisibility($path1, visibility: 'public');
        }

        if ($request->pan) 
        {
            $imagePath = $request->pan;
            $imageName = $imagePath->getClientOriginalName();
            $path2 = $request->file(key: 'pan')->store(path:'students', options:'s3');
            Storage::disk('s3')->setVisibility($path2, visibility: 'public');
        }

        if ($request->aadhar) 
        {
            $imagePath = $request->aadhar;
            $imageName = $imagePath->getClientOriginalName();
            $path3 = $request->file(key: 'aadhar')->store(path:'students', options:'s3');
            Storage::disk('s3')->setVisibility($path3, visibility: 'public');
        }

        if ($request->passbook) 
        {
            $imagePath = $request->passbook;
            $imageName = $imagePath->getClientOriginalName();
            $path4 = $request->file(key: 'passbook')->store(path:'students', options:'s3');
            Storage::disk('s3')->setVisibility($path4, visibility: 'public');
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
            "batch" => !empty($request->get('date_of_joining')) ? date('Y', strtotime($request->get('date_of_joining'))) : null,
        	"research_domain" => $request->get('research'),
        	"project_title" => $request->get('project_title'),
        	"tenure" => $request->get('tenure'),
        	"stipend" => $request->get('stipend'),
            "profile_url" => $request->get('profile_id'),
            "photo" => $path1 ? basename($path1) : $path1,
            "photo_url" => $path1 ? Storage::disk(name:'s3')->url($path1) : $path1,
            "pan" => $path2 ? basename($path2) : $path2,
            "pan_url" => $path2 ? Storage::disk(name:'s3')->url($path2) : $path2,
            "aadhar" => $path3 ? basename($path3) : $path3,
            "aadhar_url" => $path3 ? Storage::disk(name:'s3')->url($path3) : $path3,
            "passbook" => $path4 ? basename($path4) : $path4,
            "passbook_url" => $path4 ? Storage::disk(name:'s3')->url($path4) : $path4,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $student = new Student($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$old = Student::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['photo']) && !empty($path1))
    		{
    			Storage::disk('s3')->delete('students/'.$old[0]['photo']);
    		}
            if(!empty($old[0]['pan']) && !empty($path2))
            {
                Storage::disk('s3')->delete('students/'.$old[0]['pan']);
            }
            if(!empty($old[0]['aadhar']) && !empty($path3))
            {
                Storage::disk('s3')->delete('students/'.$old[0]['aadhar']);
            }
            if(!empty($old[0]['passbook']) && !empty($path4))
            {
                Storage::disk('s3')->delete('students/'.$old[0]['passbook']);
            }

            if(!$path1)
            {
                $data['photo'] = $old[0]['photo'];
                $data['photo_url'] = $old[0]['photo_url'];
            }
            if(!$path2)
            {
                $data['pan'] = $old[0]['pan'];
                $data['pan_url'] = $old[0]['pan_url'];
            }
            if(!$path3)
            {
                $data['aadhar'] = $old[0]['aadhar'];
                $data['aadhar_url'] = $old[0]['aadhar_url'];
            }
            if(!$path4)
            {
                $data['passbook'] = $old[0]['passbook'];
                $data['passbook_url'] = $old[0]['passbook_url'];
            }

            $student->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
            $data['user_id'] = $this->createUser(0, $request);
    	}
    	else
    	{
    		$student->save();
    		$data['seq_no'] = $student->id;
            $data['user_id'] = $this->createUser(1, $request);
    	}
        return response()->json($data);
    }

    public function createUser($create, $request)
    {
        $data = [
            "emp_id" => $request->get('roll_no'),
            "email" => $request->get('email'),
            "password" => null,
            "user_type" => 1,
            "social_id" => null,
            "login_per" => $request->get('login_per') ?? 0,
            "leave_apply" => $request->get('leave_apply') ?? 0,
            "leave_managment" => $request->get('leave_managment') ?? 0,
            "website_data" => $request->get('website_data') ?? 0,
            "accounts" => $request->get('accounts') ?? 0,
            "assets" => $request->get('assets') ?? 0,
            "hr" => $request->get('hr') ?? 0,
            "attendance" => $request->get('attendance') ?? 0,
            "leave_balance" => 0,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        //var_dump($data);exit();

        $user = new User($data);

        if($create)
        {
            $user->save();
            return $user->id;
        }

        $user->where('emp_id',$request->get('roll_no'))->update($data);
        return $user->id;
    }

    public function deleteStudent($seq_no)
    {
        $student = Student::where('seq_no',$seq_no)->get();
        Student::where('seq_no',$seq_no)->delete();
        User::where('emp_id',$student[0]->roll_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
