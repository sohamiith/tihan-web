<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Press;
class PresssController extends Controller
{
    public function index(Request $request)
	{
		$press = $this->listPress($request);
		return view('admin/admin-press',['presss'=>$press]); 
	}

    public function indexPress(Request $request)
    {
        $press = $this->listPress($request);
        return view('new-press-release',['presss'=>$press]); 
    }

	public function listPress(Request $request)
    {
    	$query = Press::query();
    	$query->orderBy('seq_no','ASC');
        $press = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
    	if($perPage = $request->get('perPage'))
    	{
    		$press = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$press = $query->get();
    	}

        return $press;
    }

    public function getPress($seq_no)
    {
        return Press::where('seq_no',$seq_no)->get();
    }

    function savePress(Request $request)
    {
        $path = null;

        // Store file in app/public/assets
        if ($request->file_name) 
        {
            $imagePath = $request->file_name;
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file(key: 'file_name')->store(path:'press', options:'s3');
            Storage::disk('s3')->setVisibility($path, visibility: 'public');
        }
        
        $data = [
        	"title" => $request->get('title'),
            "description" => $request->get('description'),
            "release_date" => $request->get('release_date'),
            "document" => $request->get('document'),
            "fb_link" => $request->get('fb_link'),
            "tw_link" => $request->get('tw_link'),
            "insta_link" => $request->get('insta_link'),
            "ld_link" => $request->get('ld_link'),
            "file_name" => $path ? basename($path) : $path,
            "link" => $path ? Storage::disk(name:'s3')->url($path) : $path,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $press = new Press($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$old = Press::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['file_name']))
    		{
    			Storage::disk('s3')->delete('press/'.$old[0]['file_name']);
    		}
            
            if(!$path)
            {
                $data['link'] = $old[0]['link'];
                $data['file_name'] = $old[0]['file_name'];
            }

    		$press->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$press->save();
            $data['seq_no'] = $press->id;
    	}
        return response()->json($data);
    }

    public function deletePress($seq_no)
    {
        $press = Press::where('seq_no',$seq_no)->get();
        Press::where('seq_no',$seq_no)->delete();
        if(!empty($press[0]['file_name']))
        {
            Storage::disk('s3')->delete('press/'.$press[0]['file_name']);    
        }
        return response()->json('Deleted Successfully');
    }
}
