<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Latestevent;
class LatesteventsController extends Controller
{
    public function index(Request $request)
	{
		$events = $this->listEvents($request);
		return view('admin/admin-latestevent',['events'=>$events]); 
	}

    public function indexEvents(Request $request)
    {
        $events = $this->listEvents($request);
        return view('welcome',['events'=>$events]); 
    }

	public function listEvents(Request $request)
    {
    	$query = Latestevent::query();
    	$query->orderBy('seq_no','ASC');
        $events = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
    	if($perPage = $request->get('perPage'))
    	{
    		$events = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$events = $query->get();
    	}

        return $events;
    }

    public function getEvents($seq_no)
    {
        return Latestevent::where('seq_no',$seq_no)->get();
    }

    public function saveEvents(Request $request)
    {
        $path = null;

        // Store file in app/public/assets
        if ($request->file_name) 
        {
            $imagePath = $request->file_name;
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file(key: 'file_name')->store(path:'events', options:'s3');
            Storage::disk('s3')->setVisibility($path, visibility: 'public');
        }
        
        $data = [
        	"title" => $request->get('title'),
            "event_date" => $request->get('event_date'),
            "doc" => $request->get('doc'),
            "file" => $path ? basename($path) : $path,
            "url" => $path ? Storage::disk(name:'s3')->url($path) : $path,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $events = new Latestevent($data);
        if($seq_no = $request->get('seq_no'))
    	{
    		$old = Latestevent::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['file_name']) && !empty($path))
    		{
    			Storage::disk('s3')->delete('events/'.$old[0]['file_name']);
    		}
            
            if(!$path)
            {
                $data['url'] = $old[0]['url'];
                $data['file'] = $old[0]['file'];
            }
    		$events->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$events->save();
            $data['seq_no'] = $events->id;
    	}
        return response()->json($data);
    }

    public function deleteEvents($seq_no)
    {
        $events = Latestevent::where('seq_no',$seq_no)->get();
        Latestevent::where('seq_no',$seq_no)->delete();
        if(!empty($events[0]['file_name']))
        {
            Storage::disk('s3')->delete('events/'.$events[0]['file_name']);    
        }
        return response()->json('Deleted Successfully');
    }
}
