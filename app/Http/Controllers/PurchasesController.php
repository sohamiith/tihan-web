<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Purchase;
class PurchasesController extends Controller
{
    public function index(Request $request)
	{
		$purchase = $this->listpurchase($request);
		return view('admin/admin-purchase',['Purchases'=>$purchase]); 
	}

    public function indexPurchases(Request $request)
    {
        $purchase = $this->listpurchase($request);
        return view('purchase-series',['Purchases'=>$purchase]); 
    }

    public function getPurchase($seq_no)
    {
        return Purchase::where('seq_no',$seq_no)->get();
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

    function savepurchase(Request $request)
    {
        $data = [
        	"title" => $request->get('title'),
            "purchase_date" => $request->get('purchase_date'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $purchase = new Purchase($data);

        if($seq_no = $request->get('seq_no'))
    	{
    		$purchase->where('seq_no', $seq_no)->update($data);
    		$data['seq_no'] = $seq_no;
    	}
    	else
    	{
    		$purchase->save();
            $data['seq_no'] = $purchase->id;
    	}

        return response()->json($data);
    }

    public function deletepurchase($seq_no)
    {
        Purchase::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
