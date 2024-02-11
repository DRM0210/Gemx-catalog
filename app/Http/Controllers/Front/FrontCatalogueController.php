<?php

namespace App\Http\Controllers\Front;

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
use App\Models\Orders;
use App\Models\Orderinvoice;
use App\Models\Buyerquotation;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserQuotationEmail;
use App\Mail\UserInvoiceEmail;
use Illuminate\Support\Facades\Mail;
use Hash;
use Auth;
use DB;

class FrontCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id,$code)
    {
        return view('front.catalogue.index');
    }

    /**
  
     * Display a listing of the resource.
     */
    public function deshbored()
    {
        $user_id = Auth::user()->id;
        $user = Auth::user()->first();
      
      
        $products = DB::table('orders')
        ->select('orders.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname','catalogs.name as catname','orders.created_at as orderdate')
        ->leftjoin('products as pr', 'pr.id', '=', 'orders.product_id')
        ->leftjoin('catalogs', 'orders.buyer_id', '=', 'catalogs.id')
        ->orderBy('orders.created_at', 'desc')
        ->where('orders.buyer_id', $user_id)
        ->get();
    
        return view('front.catalogue.deshbored',compact('products','user'));
    }

    /**
     * Show the form for edit a new resource.
     */
    public function editprofile(Request $request)
    {
        $user_id = Auth::user()->id;
        $update = User::where('id', $user_id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if ($update) {
            return response('Edit Successfully');  // Corrected response function
        } else {
            return response('Something Went Wrong');  // Corrected response function
        }
    }
    /**
     * Show the form for editpassword a new resource.
     */
    public function editpassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $update = User::where('id', $user_id)->update([
            'password' => Hash::make($request->confirm_pass)
        ]);
        if ($update) {
            return response('Edit Successfully');  // Corrected response function
        } else {
            return response('Something Went Wrong');  // Corrected response function
        }
    }

 /**
     * Show the view catalogue.
     */
    public function viewcatalogue()
    {  
        
        return view('front.catalogue.viewcatalogue');
    }

    /**
     * Show the view catalogue.
     */
    public function emailverification(Request $request)
    {
     
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Log in the user
            return response()->json([
                'msg' => 1,
                'catid' => $request->catid,
                'userid' => $user->id
        ]);
         //  return redirect()->route('user.allproduct', ['catid' => $request->catid, 'userid' => $user->id]);
        } else {
            // Password does not match
            return  response()->json(['error' => 'These credentials do not match our records.']);
        }
    }

    /**
     * all catalogue show.
     */
    public function allproduct($securitycode,$userid)
    {
        $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname','brands.name as bname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('brands', 'pr.brand_id', '=', 'brands.id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.buyer_id', $userid)
        ->where('buyer.securitycode', $securitycode)
        ->get();
        $catids = DB::table('buyer_prod_show_permissions')->where('securitycode',$securitycode)->first();
        $catid = $catids->catalog_id;
        $companyaccount = companyaccount::where('status','1')->first();
        return view('front.catalogue.allproduct',compact('products','userid','companyaccount','catid'));
    }

    /**
     * Display the quotation.
     */
    public function quotation($pid,$userid,$catid)
    {    
        $ids=explode(',',$pid);

        
        $products = Product::query()
        ->select('products.*', 'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('groups', 'products.group_id', '=', 'groups.id')
        ->join('units', 'products.unit_id', '=', 'units.id')
        ->whereIn('products.id', $ids)
        ->orderBy('products.created_at', 'desc')
        ->get();
 
        $companyaccount = companyaccount::where('status','1')->first();

        $users = User::find($userid);
     
        return view('front.catalogue.quotation',compact('products','pid','users','companyaccount','catid'));
       
    }



    /**
     * price graf.
     */
    public function pricegraf(Request $request)
    {
      
        $prices = Quantity::where('product_id',$request->pid)->get();
        echo $prices;
    }

    //addamount
    public function addamount(Request $request)
    {  
        $qty_1 = intval($request->qty1);
        $prices = Quantity::where('product_id', $request->pid)
        ->where('qty', '>=', $qty_1)
        ->orderBy('qty', 'asc')->first();
            
                
       if($prices != null){
       $data = $prices->price * $qty_1; 
       }else{
        $prices = Quantity::where('product_id', $request->pid)->orderBy('qty','desc')->first();
        $data = $prices->price * $qty_1;
       }
       
   
       $oldprice = $request->sellprice * $qty_1;
       $discountprice = $oldprice - $data;
       
       $discount = round(($discountprice / $oldprice) * 100 , 0);
 return response()->json(['data' => $data,'discount' => $discount]);
    }


    /**
     * order send.
     */
    public function quotationsend(Request $request)
    {
        $buyer_id = Auth::user()->id;
    
        function random_strings($length_of_string) {
            return substr(md5(time()), 0, $length_of_string); }
        $securitytoken=random_strings(8);
    
        foreach ($request->product_id as $key => $value) {
            $qty_1 = intval($request->prod_qty[$key]);
            $sellprice = Product::where('id',$value)->first();
            $prices = Quantity::where('product_id', $value)
                ->where('qty', '>=', $qty_1)
                ->orderBy('qty', 'asc')
                ->first();
    
            if ($prices === null) {
                $prices = Quantity::where('product_id', $value)
                    ->orderBy('qty', 'desc')
                    ->first();
            }
    
            $total_amount = $prices->price * $qty_1;
    
            $oldprice = $sellprice ->selling_price * $qty_1; // Assuming you have 'sellprice' in your request data
            $discountprice = $oldprice - $total_amount;
    
            $discount = round(($discountprice / $oldprice) * 100 , 0);
           
            $adddata = new Buyerquotation;
            $adddata->buyer_id = $buyer_id;
            $adddata->catalog_id = $request->catid;
            $adddata->company_id = $request->company_id;
            $adddata->product_id = $value;
            $adddata->quantity = $qty_1; // Corrected to use $qty_1 instead of $request->quantity[$key]
            $adddata->total_amount = $total_amount;
            $adddata->discount = $discount;
            $adddata->token = $securitytoken;
            $adddata->notes = $request->notes;
            $adddata->save();
        }
        
        $products = $request->tabledata;
       $notes= $request->notes;
        $users = User::find($buyer_id);
        $companyaccount = companyaccount::where('status','1')->first();
        $mailData = compact('products','companyaccount','users','notes');
 
        $subject = 'Gemx Jeweller Jaipur';
         try {
             Mail::to($companyaccount->company_email)->send(new UserQuotationEmail($mailData,$subject));
             return response()->json(['success' => 'Email sent successfully'], 200);
         } catch (\Exception $e) {
             return response()->json(['error' => 'Error sending email', 'error' => $e->getMessage()], 500);
         }

        return response()->json(['success' => 'Quotation Enquiry Sent Successfully!']);
    }

    /**
     * Display the sendinvoice resource.
     */
    public function sendinvoice($token,$catid)
    {
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
        ->where('catalog_id',$catid)
        ->where('token',$token)
        ->get();
        $notedata = DB::table('buyer_quotations')->where('catalog_id',$catid)->where('token',$token)->where('grandtotal','!=',"")->first();
    
        $companyaccount = companyaccount::where('id',$notedata->company_id)->first();

        $user = User::find($notedata->buyer_id);
        return view('front.catalogue.sendinvoice',compact('products','notedata','companyaccount','user','catid'));
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function doneinvoice(Request $request)
    {
        $ids = $request->product_id;
        $data = DB::table('buyer_quotations')->whereIn('product_id',$ids)->where('catalog_id',$request->catid)->first();
        
        foreach($ids as $key => $pid){
            DB::table('buyer_quotations')->where('product_id',$pid)->where('catalog_id',$request->catid)->update(['status' => $request->status]);
            $adddata =new Orderinvoice ;
            $adddata->buyer_id = $data->buyer_id;
            $adddata->catalog_id = $request->catid;
            $adddata->company_id = $request->company_id;
            $adddata->product_id = $pid;
            $adddata->quantity = $request->quantity[$key]; // Corrected to use $qty_1 instead of $request->quantity[$key]
            $adddata->total_amount = $request->total;
            $adddata->grandtotal = $request->grandtotal;
            $adddata->discount = $request->alldiscount;
            $adddata->notes = $request->notes;
            $adddata->save();
        }
       

     
        $products = $request->tabledata;
        $notes= $request->notes;
         $user = User::find($data->buyer_id);
        $grandtotal=$request->grandtotal;
        $total=$request->total;
        $discount =$request->alldiscount;
         $companyaccount = companyaccount::where('status','1')->first();
         
         $mailData = compact('products','companyaccount','user','notes','grandtotal','total','discount');
  
         $subject = 'Gemx Jeweller Jaipur';
          try {
              Mail::to($companyaccount->company_email)->send(new UserInvoiceEmail($mailData,$subject));
              return response()->json(['success' => 'Invoice sent successfully'], 200);
          } catch (\Exception $e) {
              return response()->json(['error' => 'Error sending Invoice', 'error' => $e->getMessage()], 500);
          }

         
 
         return response()->json(['success' => 'Quotation Invoice Sent Successfully!']);
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