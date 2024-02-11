<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Color::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('color.edit',$row->id);
                    $updateUrl = Route('color.update',$row->id);
                    $delurl = Route('color.delete',$row->id);
                    $edit = ' <a  href="#addColor"  target="_modal" class="editColor" data-name="'.$row->name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="colorDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
    public function getColor()
    {
        $color = Color::all();
        echo $color;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'required|unique:colors,name',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $color = new Color;
        $color->name = $request->color;
        $color->save();

        return response()->json(['success' => 'Color added successfuly!']);
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
            'color' => 'required|unique:colors,name,'.$id,
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $color =  Color::find($id);
        $color->name = $request->color;
        $color->save();

        return response()->json(['success' => 'Color updated successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();
        return response()->json(['success' => 'Color delete successfuly!']);
    }
}
