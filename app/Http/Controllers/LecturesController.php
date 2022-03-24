<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Lecture;
class LecturesController extends Controller
{
    public function index(Request $request)
	{
		$lecture = $this->listLecture($request);
		return view('admin/admin-lecture',['lectures'=>$lecture]); 
	}

    public function indexLectures(Request $request)
    {
        $lecture = $this->listLecture($request);
        return view('office-lecture',['lectures'=>$lecture]); 
    }

    public function getLecture($seq_no)
    {
        return Lecture::where('seq_no',$seq_no)->get();
    }

	public function listLecture(Request $request)
    {
    	$query = Lecture::query();
    	$query->orderBy('seq_no','ASC');
        $lecture = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
        $type = $request->get('type');
        
    	if($perPage = $request->get('perPage'))
    	{
    		$lecture = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$lecture = $query->get();
    	}
        return $lecture;
    }

    function saveLecture(Request $request)
    {
        $data = [
        	"title" => $request->get('title'),
            "lecture_date" => $request->get('lecture_date'),
            "speaker" => $request->get('speaker'),
            "designation" => $request->get('designation'),
            "org" => $request->get('org'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $lecture = new Lecture($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$lecture->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$lecture->save();
            $data['seq_no'] = $lecture->id;
    	}

        return response()->json($data);
    }

    public function deleteLecture($seq_no)
    {
        Lecture::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
