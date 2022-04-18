<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tender;
use App\Models\Purchase;
class TendersController extends Controller
{
    public function index(Request $request)
	{
		$tenders = $this->listTender($request);
		return view('admin/admin-tender',['tenders'=>$tenders]); 
	}

    public function indexTenders(Request $request)
    {
        $tenders = $this->listTender($request);
        $purchase = $this->listPurchase($request);
        return view('tender',['tenders'=>$tenders,'purchases'=>$purchase]); 
    }

    public function ArchiveTenders(Request $request)
    {
        $tenders = $this->listTender($request);
        return view('tender-archives',['tenders'=>$tenders]); 
    }
    public function getTender($seq_no)
    {
        return Tender::where('seq_no',$seq_no)->get();
    }

	public function listTender(Request $request)
    {
    	$query = Tender::query();
    	$query->orderBy('seq_no','ASC');
        $tenders = [];
    	$total = $query->count();
    	$page = $request->input('page', 1);
    	$last_page = 1;
        $type = $request->get('type');
        
        // Active tenders only
        if($type == 1)
        {
            $query->where('end_date','>=',date('Y-m-d'));
        }
        // Inactive tenders only
        else if($type == 1)
        {
            $query->where('end_date','<',date('Y-m-d'));
        }
        
    	if($perPage = $request->get('perPage'))
    	{
    		$tenders = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$tenders = $query->get();
    	}
        return $tenders;
    }

    public function listPurchase(Request $request)
    {
        $query = Purchase::query();
        $query->orderBy('seq_no','ASC');
        $purchase = [];
        $total = $query->count();
        $page = $request->input('page', 1);
        $last_page = 1;
        $type = $request->get('type');
        
        if($perPage = $request->get('perPage'))
        {
            $purchase = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
            $last_page = ceil($total / $perPage);
        }
        else
        {
            $purchase = $query->get();
        }
        return $purchase;
    }

    function saveTender(Request $request)
    {
        $data = [
        	"description" => $request->get('description'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "document" => $request->get('document'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $tender = new Tender($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$tender->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
            $tender->save();
            $data['seq_no'] = $tender->id;
    	}

        return response()->json($data);
    }

    public function deleteTender($seq_no)
    {
        Tender::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
