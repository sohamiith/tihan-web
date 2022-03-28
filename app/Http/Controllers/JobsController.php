<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Job;
class JobsController extends Controller
{
    public function index(Request $request)
	{
		$job = $this->listJob($request);
		return view('admin/admin-job',['jobs'=>$job]); 
	}

    public function indexJobs(Request $request)
    {
        $job = $this->listJob($request);
        return view('careers',['jobs'=>$job]); 
    }

    public function getJob($seq_no)
    {
        return Job::where('seq_no',$seq_no)->get();
    }

	public function listJob(Request $request)
    {
    	$query = Job::query();
    	$query->orderBy('seq_no','ASC');
        $job = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
        $type = $request->get('type');
        
    	if($perPage = $request->get('perPage'))
    	{
    		$job = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$job = $query->get();
    	}
        return $job;
    }

    function saveJob(Request $request)
    {
        $data = [
        	"title" => $request->get('title'),
            "description" => $request->get('description'),
            "document" => $request->get('document'),
            "link" => $request->get('link'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $job = new Job($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$job->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$job->save();
            $data['seq_no'] = $job->id;
    	}

        return response()->json($data);
    }

    public function deleteJob($seq_no)
    {
        Job::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
