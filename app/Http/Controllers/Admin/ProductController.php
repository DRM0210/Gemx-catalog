<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\ProductVariants;
use Yajra\DataTables\DataTables;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // $products = Product::with(['brand', 'category', 'group', 'productImages']);
       
        if ($request->ajax()) { 
            $products = Product::query()
                ->select('products.*', 'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('groups', 'products.group_id', '=', 'groups.id')
                ->orderBy('products.created_at', 'desc')
                ->get();
        
            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $img = '<img class="img-thumbnail w-50" src="' . asset('product_images/'.$row->product_themlin) . '" alt="">';
                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $editurl = route('product.edit', $row->id);
                    $updateUrl = route('product.update', $row->id);
                    $delurl = route('product.delete', $row->id);
        
                    $edit = '<a href="#addprod" target="_modal" class="editProduct" data-edit="' . $editurl . '" data-update="' . $updateUrl . '"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = '<a href="javascript:void(' . $row->id . ');" class="delete-product" data-url="' . $delurl . '"><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
        
                    $btns = $edit . $delete;
                    return $btns;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        
    
        return view('admin.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   //  DD($request->all());
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'unit_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'group_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        // Conditional validation based on gridRadios
        if ($request->input('gridRadios') == 'standard') {
            $standardValidator = Validator::make($request->all(), [
                'purchase_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
            ]);
            if ($standardValidator->fails()) {
                return response()->json(['errors' => $standardValidator->errors()]);
            }
        } 
        $newImagePath = null;
        if ($request->file('productImg')) {
                $originalImage = $request->file('productImg');
                $newFileName = $originalImage->getClientOriginalName(); // Get the original file name
                $newFileName = pathinfo($newFileName, PATHINFO_FILENAME); // Get the file name without extension
                $newFileName = $newFileName . '.png'; // Change the extension to .png
                // $newImagePath = $originalImage->storeAs('product_images', $newFileName , 'public');
                $newImagePath = $originalImage->move(public_path().'/product_images/', $newFileName);  

        }
        // Create a new product
        $product = new Product;// Assuming 'id' is the primary key
        if ($product) {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->unit_id = $request->input('unit_id');
            $product->brand_id = $request->input('brand_id');
            $product->category_id = $request->input('category_id');
            $product->group_id = $request->input('group_id');
            $product->product_type = $request->input('gridRadios');
            $product->quantity = $request->input('quantity');
            $product->tax = $request->input('tax');
            $product->product_themlin = $newFileName;
        
            $product->save();
        }
        if ($request->input('price_details')) {
            foreach (json_decode($request->input('price_details')) as $row) {
                $qty = new Quantity;
                $qty->product_id = $product->id;
                $qty->qty = $row->qty;
                $qty->selling_price = $row->selling_price;
                $qty->price = $row->price;
                $qty->save();
            }
        }
        if ($request->input('variant_details') !== null) {
            foreach (json_decode($request->input('variant_details'), true) as $key => $row) {
                $variant = new ProductVariants;
                $variant->product_id = $product->id;
                $variant->color_id = $row['colorId'];
                $variant->size_id = $row['sizeId'];
                $variant->varian_1 = $row['variant_val1'];
                $variant->varian_2 = $row['variant_val2'];
                $variant->purchase_price = $row['purchase_price'];
                $variant->selling_price = $row['selling_price'];
                $variant->sku = $row['var_sku'];
                if($row['var_img'] != null){
                    $originalImage = $request['var_img'][$key];
                    $newFileName = time() .'_' .$originalImage->getClientOriginalName(); // Get the original file name
                    $newFileName = pathinfo($newFileName, PATHINFO_FILENAME); // Get the file name without extension
                    $newFileName = $newFileName . '.png'; // Change the extension to .png
                    $newImagePath = $originalImage->storeAs('product_images', $newFileName, 'public');
                    
                    $variant->image = $newFileName;
               }
                $variant->save();
            }
        }
    
        // Redirect to a success page or return a response
        return response()->json(['success' => 'Product has been created successfully']);
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
        // $product = Product::find($id);
        // $qty = Quantity::where('product_id', $id)->get();
        // $productVariant = ProductVariants::where('product_id', $id)->get();
        // $prod = compact('product','qty','productVariant');
    public function edit(string $id)
    {
      $product = Product::with(['quantity', 'variants'])->find($id);
       // $product = Product::with(['quantity', 'variants.color', 'variants.size'])->find($id);
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      // DD($request->all());
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'unit_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'group_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        // Conditional validation based on gridRadios
        if ($request->input('gridRadios') == 'standard') {
            $standardValidator = Validator::make($request->all(), [
                'purchase_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
            ]);
            if ($standardValidator->fails()) {
                return response()->json(['errors' => $standardValidator->errors()]);
            }
        } 
        $newImagePath = null;
        if ($request->file('productImg')) {
                $originalImage = $request->file('productImg');
                $newFileName = $originalImage->getClientOriginalName(); // Get the original file name
                $newFileName = pathinfo($newFileName, PATHINFO_FILENAME); // Get the file name without extension
                $newFileName = $newFileName . '.png'; // Change the extension to .png
                // $newImagePath = $originalImage->storeAs('product_images', $newFileName ,'public');
                $newImagePath = $originalImage->move(public_path().'/product_images/', $newFileName);  
            
        }else{
            $newFileName =  $request->productImg_hidden;
        }
        // Create a new product
        $product = Product::where('id', $id)->first(); // Assuming 'id' is the primary key
        if ($product) {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->unit_id = $request->input('unit_id');
            $product->brand_id = $request->input('brand_id');
            $product->category_id = $request->input('category_id');
            $product->group_id = $request->input('group_id');
            $product->product_type = $request->input('gridRadios');
            $product->quantity = $request->input('quantity');
            $product->tax = $request->input('tax');
            $product->product_themlin = $newFileName;
        
            $product->save();
        } else {
            return response()->json(['success' =>'data not stored!']);
        }
        if ($request->input('price_details')) {
            Quantity::where('product_id', $product->id)->delete();
            foreach (json_decode($request->input('price_details')) as $row) {
                $qty = new Quantity;
                $qty->product_id = $product->id;
                $qty->qty = $row->qty;
                $qty->selling_price = $row->selling_price;
                $qty->price = $row->price;
                $qty->save();
            }
        }
        if ($request->input('variant_details') !== null) {
            ProductVariants::where('product_id', $product->id)->delete();
           // DD($request->input('variant_details'));
            foreach (json_decode($request->input('variant_details'), true) as $key => $row) {
                
                $variant = new ProductVariants;
                $variant->product_id = $product->id;
                $variant->color_id = $row['colorId'];
                $variant->size_id = $row['sizeId'];
                $variant->varian_1 = $row['variant_val1'];
                $variant->varian_2 = $row['variant_val2'];
                $variant->purchase_price = $row['purchase_price'];
                $variant->selling_price = $row['selling_price'];
                $variant->sku = $row['var_sku'];
               if($row['var_img'] != null){
                    $originalImage = $request['var_img'][$key];
                    $newFileName = time() .'_' .$originalImage->getClientOriginalName(); // Get the original file name
                    $newFileName = pathinfo($newFileName, PATHINFO_FILENAME); // Get the file name without extension
                    $newFileName = $newFileName . '.png'; // Change the extension to .png
                    $newImagePath = $originalImage->storeAs('product_images', $newFileName, 'public');
                    $variant->image = $newFileName;
               }else{
                    if($row['img_hidden'] != null){
                       
                        $variant->image = $row['img_hidden'];
                }
               }
               
               
                $variant->save();
            }
           
        }

        // Redirect to a success page or return a response
        return response()->json(['update' => 'Product has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Product::find($id);
       $product->delete();
       return response()->json(['success' => 'Product deleted successfuly!']);
    }
}