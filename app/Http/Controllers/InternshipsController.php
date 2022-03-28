<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Internship;
class InternshipsController extends Controller
{
    public function index(Request $request)
	{
		$internship = $this->listInternship($request);
		return view('admin/admin-internship',['internships'=>$internship]); 
	}

    public function indexInternships(Request $request)
    {
        $internship = $this->listInternship($request);
        return view('internship',['internships'=>$internship]); 
    }

    public function getInternship($seq_no)
    {
        return Internship::where('seq_no',$seq_no)->get();
    }

	public function listInternship(Request $request)
    {
    	$query = Internship::query();
    	$query->orderBy('seq_no','ASC');
        $internship = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
        $type = $request->get('type');
        
    	if($perPage = $request->get('perPage'))
    	{
    		$internship = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$internship = $query->get();
    	}
        return $internship;
    }

    function saveInternship(Request $request)
    {
        $data = [
        	"title" => $request->get('title'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "document" => $request->get('document'),
            "link" => $request->get('link'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $internship = new Internship($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$internship->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$internship->save();
            $data['seq_no'] = $internship->id;
    	}

        return response()->json($data);
    }

    public function deleteInternship($seq_no)
    {
        Internship::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
