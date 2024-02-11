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
use App\Models\ProductVariants;
use App\Mail\AdminCatalogueEmail;
use App\Mail\VariantAttribute;
use Illuminate\Support\Facades\Mail;
use Validator;
use Hash;
use DB;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
        $category = Category::all();
        $units = Unit::all();
        $groups = Group::all();
        $brands = Brand::all();
        $users = User::all();
    
    $colors = DB::table('product_variants')->select(DB::raw('MAX(id) as cid'),'varian_1')
        ->groupBy('varian_1')
        ->get();
    
    // Assuming 'length' is unique, use first() instead of toArray()
    
    $lengths = DB::table('product_variants')->select(DB::raw('MAX(id) as lid'),'varian_2')->groupBy('varian_2')->get();

   
        if ($request->ajax()) {      
            $filters = $request->only(['catid', 'unitid', 'groupid', 'brandid','colorid','lengthid','serach','min','max']);
           
            $products = Product::select('products.*', 'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('groups', 'products.group_id', '=', 'groups.id')
                ->join('units', 'products.unit_id', '=', 'units.id')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->orderBy('products.created_at', 'desc');
            
            if (isset($filters['catid'])) {
                $products->whereIn('products.category_id', $filters['catid']);
            }
            
            if (isset($filters['unitid'])) {
                $products->whereIn('products.unit_id', $filters['unitid']);
            }
            
            if (isset($filters['groupid'])) {
                $products->whereIn('products.group_id', $filters['groupid']);
            }
            
            if (isset($filters['brandid'])) {
                $products->whereIn('products.brand_id', $filters['brandid']);
            }
           
            if (isset($filters['serach'])) {
                $products->where('products.name', $filters['search'] )
                ->orWhere('product_variants.varian_1', $filters['search'])
                ->orWhere('product_variants.varian_2', $filters['search']);
            }
            if (isset($filters['colorid'])) {
                $products->where('product_variants.id', $filters['colorid']);
            }
            if (isset($filters['length'])) {
                $products->where('product_variants.id', $filters['colorid']);
            }
            if (isset($filters['min'])) {
                $products->where('products.selling_price', '>=', $filters['min']);
            }
            
            if (isset($filters['max'])) {
                $products->where('products.selling_price', '<=', $filters['max']);
            }
            
            
            $products = $products->get(); 
        
                $filterView = view('admin.pages.catalogue.filter', compact('products'))->render();
                return response()->json(['filterView' => $filterView]);
        } else {
            $products = Product::query()
                ->select('products.*', 'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('groups', 'products.group_id', '=', 'groups.id')
                ->orderBy('products.created_at', 'desc')
                ->get();

                $catalogues = DB::table('buyer_prod_show_permissions as buyer')
                ->Join('products as pr', 'buyer.product_id', '=', 'pr.id')
                ->Join('brands', 'brands.id','=','pr.brand_id',)
                ->Join('users', 'buyer.buyer_id', '=', 'users.id')
                ->Join('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
                ->select(
                    'buyer.securitycode',
                    'buyer.catalog_id',
                    'catalogs.name as catname',
                    'users.email',
                    'users.name as buyer_name',
                    'catalogs.status',
                    DB::raw('GROUP_CONCAT(buyer.id) as buyer_id'),
                    DB::raw('MAX(users.id) as userid'),
                    DB::raw('COUNT(buyer.product_id) AS record_count')        
                    )
                ->distinct('securitycode')
                ->groupBy('buyer.catalog_id', 'buyer.securitycode', 'users.email', 'users.name', 'catalogs.name', 'catalogs.status')
                ->get();
             
            return view('admin.pages.catalogue.index', compact('category', 'units', 'groups', 'brands', 'products','catalogues','users','colors','lengths'));
        }
    }

    /**
     * Show the Select Product Catlogs.
     */
    public function catloglisting($id)
    {
         $idArray = explode(',', $id);
        // $products = Product::whereIn('id', $idArray)->get();

        $products = Product::query()
        ->select('products.*',  'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('groups', 'products.group_id', '=', 'groups.id')
        ->join('units', 'products.unit_id', '=', 'units.id')
        ->whereIn('products.id', $idArray)
        ->distinct()
        ->get();
        
        $buyers = User::get();
        $product=''; 
        foreach($products as $prod){
            $product.=$prod->category_name . ',';
        }
        $tprod=rtrim($product,',');
        $totalproduct=$tprod.'('.count($products).')';
        return view('admin.pages.catalogue.catloglisting',compact('products','totalproduct','buyers'));
    }
   
    /**
     * productvariaint view
     */
    public function productvariaint(Request $request){
        $products = ProductVariants::where('product_id', $request->pid)
        ->get();
        echo $products;
    }
    /**
     * Add Buyer Detail
     */

     public function add_buyer(Request $request){
        $validator = Validator::make($request->all(), [
            'catlog_name' => 'required',
            'buyer_email' => 'required',
            'buyername' => 'required',
        ]);
      
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $request->session()->put('catlog_name',$request->input('catlog_name'));
        $user = User::where('email',$request->buyer_email)->first();
        $cataname = catalog::where('name',$request->catlog_name)->first();
        if(!$cataname){
            
            $catalog=new catalog;
            $catalog->name=$request->input('catlog_name');
            $catalog->save();  
           

        }
        if(!$user){
           
            $buyer = new User;// Assuming 'id' is the primary key
            $buyer->name = $request->input('buyername');
            $buyer->email = $request->input('buyer_email');
            $buyer->password = Hash::make('123456');
            $buyer->save();
        }
        return response()->json(['success' => 'Buyer Add Successfully']);

      
     }

    //eamil send 
    public function emailSend(Request $request){

       $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.catalog_id', $request->id)
        ->where('buyer.securitycode', $request->cat_token)
        ->get();
       $userdetails  = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*')
        ->where('buyer.catalog_id', $request->id)
        ->where('buyer.securitycode', $request->cat_token)
        ->first();

       $user = User::find($userdetails->buyer_id);
       $companyaccount = companyaccount::where('status','1')->first();
       $mailData = compact('products','companyaccount','user');

       $subject = 'Gemx Jeweller Jaipur';
        try {
            Mail::to($user->email)->send(new AdminCatalogueEmail($mailData,$subject));
            return response()->json(['success' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error sending email', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * show buyer data.
     */
    public function buyerdata(Request $request)
    {
        $buyer = User::where('id', $request->buyerid)->first();
        $catalog = catalog::where('name', session('catlog_name'))->first();
    
        return response()->json([
            'buyer' => $buyer,
            'catlogname' => $catalog->name
        ]);
    }
    /**
     * genrate catalogue.
     */
    public function genratecatalogue(Request $request){
    

        $checkuser=User::where('email','=',$request->buyeremail)->first();
        $checkcatalog=catalog::where('name','=',$request->catalogueName)->first();
        if(!$checkcatalog){
            $catalogadd= new User;
            $catalogadd->name = $request->catalogueName;
            $catalogadd->save();
            $catelogid=catalog::max('id');
        }else{
            $catelogid=$checkcatalog->id ?? '';
        }
        if(!$checkuser){
            $buyeradd= new User;
            $buyeradd->name = $request->buyername;
            $buyeradd->email = $request->buyeremail;
            $buyeradd->password = Hash::make('123456');
            $buyeradd->save();
            $buyerid = User::max('id');
        }else{
            $buyerid=$checkuser->id ?? '';
        }
   
            // Assuming 'id' is the primary key
              function random_strings($length_of_string) {
                  return substr(md5(time()), 0, $length_of_string); }
              $securitycode=random_strings(8);
       
        $productIds = $request->pid;


        // Create an array to hold the data for each record
        $records = [];
        // Populate the array with data for each product ID
        foreach ($productIds as $productId) {
            $record = [
                'buyer_id' => $buyerid,
                'product_id' => $productId,
                'catalog_id' => $catelogid,
                'securitycode' => $securitycode,
                'selling_price' => $request->selling_price,
                'prod_name' => $request->name,
                'descripation' => $request->descripation,
                'color' => $request->color,
                'production_technique' => $request->production_technique,
                'material' => $request->material,
                'size' => $request->size,
                'shape' => $request->shape,
                'sampling_time' => $request->sampling_time,
                'production_time' => $request->production_time,
                'moq' => $request->moq,
                'remarks' => $request->remarks,
            ];

            // Add the record to the array
            $records[] = $record;
        }

        // Insert multiple records into the database
        buyer_prod_show_permission::insert($records);

          
            $showdata = $buyerid;
            return response()->json(['max_id' => $showdata,'securitycode' => $securitycode]);
      
    }
    /**
     *send buyer link ready.
     */
    public function sendbuyerlinkready($maxId,$code)
    {
        $ids=$maxId;
        $scode=$code;
        return view('admin.pages.catalogue.sendbuyerlinkready',compact('ids','scode'));

    }
    /**
     * Show the view catalogue.
     */
    public function viewcatalogue($catid)
    {
        $buyerdetail=catalog::where('id','=',$catid)->first();
        $qutation = view('admin.pages.catalogue.quotation', compact('catid','buyerdetail'))->render();
        return response()->json(['filterView' => $qutation]);
       
    }

    /**
     * Show the view catalogue.
     */
    public function emailverification(Request $request)
    {
       
        $userdata = User::where('email',$request->email)->first();
        if ($userdata) {
          return response()->json([
            'msg' => 1,
            'catids' => $request->catid,
            'userids' => $userdata->id
        ]);
        }else{
            return response(2);
        }
       
    }

    /**
     * all catalogue show.
     */
    public function allproduct($catid,$token,$userid)
    {
        $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.catalog_id', $catid)
        ->where('buyer.securitycode', $token)
        ->get();

        return view('admin.pages.catalogue.allproduct',compact('products','userid','catid','token'));
    }

    /**
     * Display the quotation.
     */
    public function quotation($catid,$token)
    {   
      
        $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.catalog_id', $catid)
        ->where('buyer.securitycode', $token)
        ->get();
        $userdetails  = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*')
        ->where('buyer.catalog_id', $catid)
        ->where('buyer.securitycode', $token)
        ->first();

       $user = User::find($userdetails->buyer_id);
  
        $companyaccount = companyaccount::where('status','1')->first();
       
        return view('admin.pages.catalogue.quotation',compact('products','companyaccount','user'));
       
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
       
       $discount = ($discountprice / $oldprice) * 100;
        return response()->json(['data' => $data,'discount' => $discount]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}