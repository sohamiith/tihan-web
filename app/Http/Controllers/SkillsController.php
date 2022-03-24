<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Skill;
class SkillsController extends Controller
{
    public function index(Request $request)
	{
		$skills = $this->listSkill($request);
		return view('admin/admin-skill',['skills'=>$skills]); 
	}

    public function indexSkills(Request $request)
    {
        $skills = $this->listSkill($request);
        return view('office-skills',['skills'=>$skills]); 
    }

    public function getSkill($seq_no)
    {
        return Skill::where('seq_no',$seq_no)->get();
    }

	public function listSkill(Request $request)
    {
    	$query = Skill::query();
    	$query->orderBy('seq_no','ASC');
        $skills = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
        $type = $request->get('type');
        
    	if($perPage = $request->get('perPage'))
    	{
    		$skills = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$skills = $query->get();
    	}
        return $skills;
    }

    function saveSkill(Request $request)
    {
        $data = [
        	"title" => $request->get('title'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "document" => $request->get('document'),
            "reg_link" => $request->get('reg_link'),
            "participants" => $request->get('participants') ?? 0,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $skills = new Skill($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$skills->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$skills->save();
            $data['seq_no'] = $skills->id;
    	}

        return response()->json($data);
    }

    public function deleteSkill($seq_no)
    {
        Skill::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
