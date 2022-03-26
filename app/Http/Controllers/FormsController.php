<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Form;
class FormsController extends Controller
{
    public function index(Request $request)
	{
		$forms = $this->listForms($request);
		return view('admin/admin-forms',['forms'=>$forms]); 
	}

    public function indexForms(Request $request)
    {
        $forms = $this->listForms($request);
        return view('office-forms',['forms'=>$forms]); 
    }

	public function listForms(Request $request)
    {
    	$query = Form::query();
    	$query->orderBy('seq_no','ASC');
        $forms = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
    	if($perPage = $request->get('perPage'))
    	{
    		$forms = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$forms = $query->get();
    	}

        return $forms;
    }

    function saveForms(Request $request)
    {
        $path = null;

        // Store file in app/public/assets
        if ($request->file) 
        {
            $imagePath = $request->file;
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file(key: 'file')->store(path:'forms', options:'s3');
            Storage::disk('s3')->setVisibility($path, visibility: 'public');
        }
        
        $data = [
        	"title" => $request->get('title'),
            "file" => basename($path),
            "url" => Storage::disk(name:'s3')->url($path),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $form = new form($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$old = form::where('seq_no',$seq_no)->get();
    		if(!empty($old[0]['file']))
    		{
    			Storage::disk('s3')->delete('forms/'.$form[0]['file']);
    		}
    		$form->where('seq_no',$seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$form->save();
            $data['seq_no'] = $form->id;
    	}
        return response()->json($data);
    }

    public function deleteForm($seq_no)
    {
        $form = form::where('seq_no',$seq_no)->get();
        form::where('seq_no',$seq_no)->delete();
        Storage::disk('s3')->delete('forms/'.$form[0]['file']);
        return response()->json('Deleted Successfully');
    }
}
