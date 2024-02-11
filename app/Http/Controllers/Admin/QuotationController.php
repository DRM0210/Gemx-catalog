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
use App\Mail\AdminCatalogueEmail;
use App\Mail\AdminCancelQuotationEmail;
use Illuminate\Support\Facades\Mail;
use DB;
class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
      
    
        $quotations = DB::table('buyer_quotations as buyer')
        ->join('products as pr', 'buyer.product_id', '=', 'pr.id')
        ->join('brands', 'brands.id', '=', 'pr.brand_id')
        ->join('users', 'buyer.buyer_id', '=', 'users.id')
        ->join('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->select(
            'token',
            'buyer.catalog_id',
            DB::raw('MAX(buyer.status) as status'),
            DB::raw('MAX(buyer.company_id) as company_id'),
            DB::raw('GROUP_CONCAT(buyer.id) as buyer_id'), // Use GROUP_CONCAT
            DB::raw('COUNT(buyer.id) AS record_count'),
            DB::raw('MAX(buyer.id) as qutationid'),     
            DB::raw('MAX(catalogs.name) as catname'),
            DB::raw('MAX(users.email) as email'),
            DB::raw('MAX(users.name) as buyer_name'),
            DB::raw('MAX(buyer.buyer_id) as userid')
        )
        ->groupBy('token', 'buyer.catalog_id')
        ->get();
    


    
       
        $users = User::all();
        return view('admin.pages.quotation.index',compact('quotations','users'));
    }

    /**
     * Show the quotation.
     */
    public function view($catid,$companyid,$buyerid,$userid)
    {
         $ids = explode(',',$buyerid);
        $products  = DB::table('buyer_quotations as buyer')
        ->join('products as pr', 'buyer.product_id', '=', 'pr.id')
        ->join('brands', 'brands.id', '=', 'pr.brand_id') // Removed extra comma
        ->join('catalogs', 'catalogs.id', '=', 'buyer.catalog_id') // Removed extra comma
        ->select(
            'pr.*',
            'pr.id as prod_id',
            'buyer.*',
            'buyer.id as qutationid',
            'catalogs.name as catname'
        )
        ->where('buyer.catalog_id',$catid)
        ->whereIn('buyer.id',$ids)
        ->where('buyer.company_id',$companyid)
        ->get();
        $notedata = DB::table('buyer_quotations')->where('catalog_id',$catid)->first();
      $notes = $notedata->notes;
        $companyaccount = companyaccount::where('id',$companyid)->first();

        $user = User::find($userid);
        return view('admin.pages.quotation.view',compact('products','user','companyaccount','catid','notes'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function send(Request $request)
    {  
       
        $ids = $request->product_id;
        foreach($ids as $pid){
            DB::table('buyer_quotations')->where('id',$pid)->where('catalog_id',$request->catid)->update(['status'=>$request->status, 'grandtotal'=>$request->grandtotal,'notes'=>$request->notes,'totaldiscount'=>$request->discount]);
        }
        $data = DB::table('buyer_quotations')->whereIn('id',$ids)->where('catalog_id',$request->catid)->first();
       
        $link = route('user.sendinvoice',['token'=>$data->token,'catid'=>$request->catid]);
        $products = $request->tabledata;
        $notes= $request->notes;
         $user = User::find($data->buyer_id);
        
         $companyaccount = companyaccount::where('status','1')->first();
         
         $mailData = compact('products','companyaccount','user','notes','link');
  
         $subject = 'Gemx Jeweller Jaipur';
          try {
              Mail::to($user->email)->send(new AdminCatalogueEmail($mailData,$subject));
              return response()->json(['success' => 'Enquiry sent successfully'], 200);
          } catch (\Exception $e) {
              return response()->json(['error' => 'Error sending Enquiry', 'error' => $e->getMessage()], 500);
          }

         
 
         return response()->json(['success' => 'Quotation Enquiry Sent Successfully!']);
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
