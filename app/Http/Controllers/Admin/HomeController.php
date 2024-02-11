<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Group;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\buyer_prod_show_permission;
use App\Models\User;
use App\Models\catalog;
use App\Models\companyaccount;
use App\Models\Buyerquotation;
use App\Models\Orderinvoice;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
       $products= Product::count();
       $catalogs= catalog::count();
       $quotations= Buyerquotation::groupby('token')->count();
       $invoices= Orderinvoice::groupby('catalog_id','buyer_id')->count();
       $users= User::count();
       $today = Carbon::now();
       $yesterday = Carbon::yesterday();
       $sevenDaysAgo = Carbon::now()->subDays(7);
       $thirtyDaysAgo = Carbon::now()->subDays(30);
       $oneYearAgo = $today->subYear();
        return view('admin.pages.dashboard',compact('products','catalogs','quotations','invoices','users','today','yesterday','sevenDaysAgo','thirtyDaysAgo','oneYearAgo'));
    }

    /**
     * Show the filter data.
     */
    public function filterdashbored(Request $request)
    { 
       
        if($request->filterdate != 'all_time'){
            $products = Product::where('created_at','>=', $request->filterdate)->count();
            
            $catalogs= catalog::whereDate('created_at','>=', $request->filterdate)->count();
            $quotations= Buyerquotation::whereDate('created_at','>=', $request->filterdate)->groupby('token')->count();
            $invoices= Orderinvoice::whereDate('created_at','>=', $request->filterdate)->groupby('catalog_id','buyer_id')->count();
            $users= User::whereDate('created_at','>=', $request->filterdate)->count();
            return response()->json(['products' => $products,'catalogs'=>$catalogs,'quotations'=>$quotations,'invoices'=>$invoices,'users'=>$users]);
        }
      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
