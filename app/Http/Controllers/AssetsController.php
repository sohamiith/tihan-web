<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assets;
class AssetsController extends Controller
{
    public function index(Request $request)
	{
		$assets = $this->listAssets($request);
		return view('admin/admin-assets',['assets'=>$assets]); 
	}

	public function getAsset($seq_no)
	{
		return Assets::where('seq_no',$seq_no)->get();
	}

	public function activeAssets($seq_no)
	{
		$asset = Assets::where('seq_no',$seq_no)->get();
		$update = ['active'=>0];
		if($asset[0]->active == 0)
		{
			$update = ['active'=>1];
		}
		return Assets::where('seq_no',$seq_no)->update($update);
	}

	public function listAssets(Request $request)
    {
    	$query = Assets::query();

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
    		$assets = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
    		$last_page = ceil($total / $perPage);
    	}
    	else
    	{
    		$assets = $query->get();
    	}

        return $assets;
    }

    function saveAssets(Request $request)
    {
		$count = Assets::where('asset_id',$request->get('asset_id'))->count();
        if($count && empty($request->get('seq_no')))
        {
            return response()->json(['error' => 'Duplicate Roll No']);
        }

        $data = [
            "seq_no" => $request->get('seq_no'),
            "asset_id" => $request->get('asset_id'),
            "name" => $request->get('name'),
            "category_book" => $request->get('category_book'),
            "category_fin" => $request->get('category_fin'),
            "identification" => $request->get('identification'),
            "life" => $request->get('life'),
            "user" => $request->get('user'),
            "order_date" => $request->get('order_date'),
            "supplier_name" => $request->get('supplier_name'),
            "voucher" => $request->get('voucher'),
            "cost" => $request->get('cost'),
            "discount" => $request->get('discount'),
            "receive_date" => $request->get('receive_date'),
            "remaining" => $request->get('remaining'),
            "days" => $request->get('days'),
            "rate_as_par" => $request->get('rate_as_par'),
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => $request->get('created_at') ?? date("Y-m-d h:i:s"),
        ];

        $assets = new Assets($data);
        if($seq_no = $request->get('seq_no'))
        {
            $assets->where('seq_no',$seq_no)->update($data);
            $data['seq_no'] = $seq_no;
        }
        else
        {
            $assets->save();
            $data['seq_no'] = $assets->id;
        }
        return response()->json($data);
    }

    public function deleteAsset($seq_no)
    {
        Assets::where('seq_no',$seq_no)->delete();
        return response()->json('Deleted Successfully');
    }
}
