<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariantAttribute;
use Validator;
use Yajra\DataTables\DataTables;
class VariantAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $sr = 1;
            $query = VariantAttribute::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row) use (&$sr) {
                    // Increment the serial number for each row.
                    return $sr++;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('variantAttr.edit',$row->id);
                    $updateUrl = Route('variantAttr.update',$row->id);
                    $delurl = Route('variantAttr.delete',$row->id);
                    $edit = ' <a href="#addvariantAttr"  target="_modal" class="editvariantAttr" data-name="'.$row->variant_name.'"  data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="variantAttrDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'variantAttrName' => 'required|unique:variant_attributes,variant_name'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
       $variant = new VariantAttribute;
       $variant->variant_name = $request->variantAttrName;
       $variant->Save();

       return response()->json(['success' => 'Variant has been created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function getVariantAttr()
    {
        $variant = VariantAttribute::all();
        echo $variant;
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
            'variantAttrName' => 'required|unique:variant_attributes,variant_name,'.$id
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $variant = VariantAttribute::find($id);
        $variant->variant_name = $request->variantAttrName;
        $variant->Save();
 
        return response()->json(['update' => 'Variant has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = VariantAttribute::find($id);
        $variant->delete();
        return response()->json(['success' => 'Variant has been deleted successfully']);
    }
}