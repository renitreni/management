<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Inventory\Vendor;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index()
    {
        return view('inventory::vendor');
    }

    public function table()
    {
        $vendors = Vendor::query()
            ->selectRaw('vendors.id, vendors.phone,
            vendors.name, vendors.email, users.name as username')
            ->join('users', 'users.id','=','vendors.assigned_to');
        
        return DataTables::of($vendors)->make(true);
    }

    public function destroy(Request $request)
    {
        DB::table('vendors')->where('id', $request->id)->delete();

        return ['success' => true];
    }
    
    public function show($id)
    {
        $vendor = Vendor::find($id);

        return view('inventory::vendor_form', compact('vendor'));
    }

    public function create()
    {
        $vendor = collect(array(
            "id" => "",
            "name" => "",
            "acct_no" => "",
            "phone" => "",
            "other_phone" => "",
            "email" => "",
            "fax" => "",
            "website" => "",
            "assigned_to" => "",
            "parent_company" => "",
            "credit_limit" => "",
            "credit_available" => "",
            "payment_method" => "",
            "tax" => "",
            "tac" => "",
            "shipping_method" => "",
            "address" => "",
        ));

        return view('inventory::vendor_form', compact('vendor'));
    }
}
