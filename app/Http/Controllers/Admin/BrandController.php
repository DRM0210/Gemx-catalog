<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Validator;
use DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Brand::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('brand.edit',$row->id);
                    $updateUrl = Route('brand.update',$row->id);
                    $delurl = Route('brand.delete',$row->id);
                    $edit = ' <a  href="#addBrand"  target="_modal" class="editBrand" data-name="'.$row->name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="branDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
                    $btns = $edit . $delete;
                    return $btns;
                })
                ->rawColumns(['sr_number','action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getBrand()
    {
        $brand = Brand::all();
        echo $brand;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'brand' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $brand = new Brand;
        $brand->name = $request->brand;
        $brand->save();
        return response()->json(['success' => 'Brand added successfuly!']);
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
        $validator = Validator::make($request->all(),[
            'brand' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $brand =  Brand::find($id);
        $brand->name = $request->brand;
        $brand->save();
        return response()->json(['success' => 'Brand added successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return response()->json(['success' => 'Brand deleted successfuly!']);
    }
}
