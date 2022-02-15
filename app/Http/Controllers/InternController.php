<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intern;
class InternController extends Controller
{
    public function index(Request $request)
	{
		$interns = $this->listInterns($request);
		return view('admin/admin-interns',['interns'=>$interns]); 
	}

	public function getIntern($seq_no)
	{
		return Intern::where('seq_no',$seq_no)->get();
	}

	public function activeIntern($seq_no)
	{
		$intern = Intern::where('seq_no',$seq_no)->get();
		$update = ['active'=>0];
		if($intern[0]->active == 0)
		{
			$update = ['active'=>1];
		}
		return Intern::where('seq_no',$seq_no)->update($update);
	}

	public function listInterns(Request $request)
    {
    	$query = Intern::query();
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
    		$interns = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$interns = $query->get();
    	}

        return $interns;
    }

    function saveInterns(Request $request)
    {
    	/*
			Run following commands for storage link

			php artisan storage:link
    		sudo chmod -R 777 public/uploads
    		sudo chmod -R 777 storage
    	*/
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
        	"intern_no" => $request->get('intern_no'),
        	"full_name" => $request->get('full_name'),
        	"personal_email" => $request->get('email'),
        	"institute" => $request->get('institute'),
        	"phone" => $request->get('phone'),
        	"department" => $request->get('department'),
        	// "program" => $request->get('program'),
        	"guide" => $request->get('guide'),
        	"qualification" => $request->get('qualification'),
        	"date_of_joining" => $request->get('date_of_joining'),
        	"role" => $request->get('role'),
        	"work_area" => $request->get('work_area'),
        	"tenure" => $request->get('tenure'),
        	"stipend" => $request->get('stipend'),
            "profile_url" => $request->get('profile_id'),
            "photo" => $path,
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $intern = new Intern($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$old = Intern::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['photo']) && $old[0]['photo'] != $path)
    		{
    			if(file_exists(public_path($old[0]['photo'])))
    			{
					unlink(public_path($old[0]['photo']));
				}
    		}
    		$intern->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$intern->save();
    		$data['seq_no'] = $intern->id;
    	}
        return response()->json($data);
    }

    public function deleteIntern($seq_no)
    {
        Intern::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
