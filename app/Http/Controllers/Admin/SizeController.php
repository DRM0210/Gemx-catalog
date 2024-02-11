<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Size::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('size.edit',$row->id);
                    $updateUrl = Route('size.update',$row->id);
                    $delurl = Route('size.delete',$row->id);
                    $edit = ' <a  href="#addSize"  target="_modal" class="editSize" data-name="'.$row->name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="sizeDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
    public function getSize()
    {
        $size = Size::all();
        echo $size;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required|unique:sizes,name',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $size = new Size;
        $size->name = $request->size;
        $size->save();

        return response()->json(['success' => 'Size added successfuly!']);
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
        $validator = Validator::make($request->all(), [
            'size' => 'required|unique:sizes,name,'.$id,
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $size =  Size::find($id);
        $size->name = $request->size;
        $size->save();

        return response()->json(['success' => 'Size updated successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();
        return response()->json(['success' => 'Size delete successfuly!']);
    }
}
