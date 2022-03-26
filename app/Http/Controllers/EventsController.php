<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
class EventsController extends Controller
{
    public function index(Request $request)
	{
		$events = $this->listEvents($request);
		return view('admin/admin-event',['events'=>$events]); 
	}

    public function indexEvents(Request $request)
    {
        $events = $this->listEvents($request);
        return view('office-events',['events'=>$events]); 
    }

	public function listEvents(Request $request)
    {
    	$query = Event::query();
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

    function saveEvents(Request $request)
    {
        $path1 = null;
        $path2 = null;
        $path3 = null;
        $path4 = null;

        if ($request->file1) 
        {
            $imagePath = $request->file1;
            $imageName = $imagePath->getClientOriginalName();
            $path1 = $request->file(key: 'file1')->store(path:'events', options:'s3');
            Storage::disk('s3')->setVisibility($path1, visibility: 'public');
        }

        if ($request->file2) 
        {
            $imagePath = $request->file2;
            $imageName = $imagePath->getClientOriginalName();
            $path2 = $request->file(key: 'file2')->store(path:'events', options:'s3');
            Storage::disk('s3')->setVisibility($path2, visibility: 'public');
        }

        if ($request->file3) 
        {
            $imagePath = $request->file1;
            $imageName = $imagePath->getClientOriginalName();
            $path3 = $request->file(key: 'file3')->store(path:'events', options:'s3');
            Storage::disk('s3')->setVisibility($path3, visibility: 'public');
        }

        if ($request->file4) 
        {
            $imagePath = $request->file1;
            $imageName = $imagePath->getClientOriginalName();
            $path4 = $request->file(key: 'file4')->store(path:'events', options:'s3');
            Storage::disk('s3')->setVisibility($path4, visibility: 'public');
        }
        
        $data = [
        	"title" => $request->get('title'),
            "event_date" => $request->get('event_date'),
            "file1" => $path1 ? basename($path1) : $path1,
            "url1" => $path1 ? Storage::disk(name:'s3')->url($path1) : $path1,
            "file2" => $path2 ? basename($path2) : $path2,
            "url2" => $path2 ? Storage::disk(name:'s3')->url($path2) : $path2,
            "file3" => $path3 ? basename($path3) : $path3,
            "url3" => $path3 ? Storage::disk(name:'s3')->url($path3) : $path3,
            "file4" => $path4 ? basename($path4) : $path4,
            "url4" => $path4 ? Storage::disk(name:'s3')->url($path4) : $path4,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $event = new Event($data);
    	$event->save();
        $data['seq_no'] = $event->id;
        return response()->json($data);
    }

    public function deleteEvent($seq_no)
    {
        $event = Event::where('seq_no',$seq_no)->get();
        Event::where('seq_no',$seq_no)->delete();
        if(!empty($event[0]['file1']))
        {
            Storage::disk('s3')->delete('events/'.$event[0]['file1']);  
        }
        if(!empty($event[0]['file2']))
        {
            Storage::disk('s3')->delete('events/'.$event[0]['file2']);  
        }
        if(!empty($event[0]['file3']))
        {
            Storage::disk('s3')->delete('events/'.$event[0]['file3']);  
        }
        if(!empty($event[0]['file4']))
        {
            Storage::disk('s3')->delete('events/'.$event[0]['file4']);  
        }
        return response()->json('Deleted Successfully');
    }
}
