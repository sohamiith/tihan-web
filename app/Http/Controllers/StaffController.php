<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffs;
class StaffController extends Controller
{
    public function index(Request $request)
	{
        $request['type'] = 1;
		$staff = $this->listStaff($request);
		return view('admin/admin-staff',['staffs'=>$staff]); 
	}
    
    public function indexConsultant(Request $request)
    {
        $request['type'] = 2;
        $staff = $this->listStaff($request);
        return view('admin/admin-consultant',['staffs'=>$staff]); 
    }

    public function indexResearcher(Request $request)
    {
        $request['type'] = 3;
        $staff = $this->listStaff($request);
        return view('admin/admin-researcher',['staffs'=>$staff]); 
    }

	public function getStaff($seq_no)
	{
		return Staffs::where('seq_no',$seq_no)->get();
	}

	public function activeStaff($seq_no)
	{
		$staff = Staffs::where('seq_no',$seq_no)->get();
		$update = ['active'=>0];
		if($staff[0]->active == 0)
		{
			$update = ['active'=>1];
		}
		return Staffs::where('seq_no',$seq_no)->update($update);
	}

	public function listStaff(Request $request)
    {
    	$query = Staffs::query();
        $query->where('type', $request['type']);
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
    		$staff = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$staff = $query->get();
    	}

        return $staff;
    }

    function saveStaff(Request $request)
    {
        $count = Staffs::where('emp_id',$request->get('emp_id'))
                ->where('type',$request['type'])
                ->count();
        if($count && empty($request->get('seq_no')))
        {
            return response()->json(['error' => 'Duplicate Emp ID']);
        }

        $data = [
        	"emp_id" => $request->get('emp_id'),
        	"full_name" => $request->get('full_name'),
        	"email" => $request->get('email'),
        	"designation" => $request->get('designation'),
        	"phone" => $request->get('phone'),
        	"reporting" => $request->get('reporting'),
        	"date_of_joining" => $request->get('date_of_joining'),
        	"date_of_exit" => $request->get('date_of_exit'),
        	"qualification" => $request->get('qualification'),
        	"tenure" => $request->get('tenure'),
        	"salary" => $request->get('salary'),
            "type" => $request->get('type'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];
        if(!empty($request->get('date_of_exit')) && $request->get('date_of_exit') <= date("Y-m-d"))
        {
            $data['active'] = 0;
        }

        $staff = new Staffs($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$staff->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$staff->save();
    		$data['seq_no'] = $staff->id;
    	}
        return response()->json($data);
    }

    public function deleteStaff($seq_no)
    {
        Staffs::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
