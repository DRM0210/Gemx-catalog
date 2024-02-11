<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
use App\Mail\AdminCatalogueEmail;
use App\Mail\AdminCancelQuotationEmail;
use Illuminate\Support\Facades\Mail;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
      $quotations = DB::table('order_invoices as invoic')
      ->join('products as pr', 'invoic.product_id', '=', 'pr.id')
      ->join('brands', 'brands.id', '=', 'pr.brand_id')
      ->join('users', 'invoic.buyer_id', '=', 'users.id')
      ->join('catalogs', 'invoic.catalog_id', '=', 'catalogs.id')
      ->select(
          'invoic.catalog_id',
          DB::raw('MAX(invoic.status) as status'),
          DB::raw('MAX(invoic.company_id) as company_id'),
          DB::raw('MAX(invoic.buyer_id) as buyer_id'),
          DB::raw('COUNT(invoic.id) AS record_count'),
          DB::raw('MAX(invoic.id) as qutationid'),     
          DB::raw('MAX(catalogs.name) as catname'),
          DB::raw('MAX(users.email) as email'),
          DB::raw('MAX(users.name) as buyer_name'),
          DB::raw('MAX(users.id) as userid')
      )
      ->groupBy('invoic.catalog_id')
      ->get();
      
         
          $users = User::all();
          return view('admin.pages.invoice.index',compact('quotations','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
