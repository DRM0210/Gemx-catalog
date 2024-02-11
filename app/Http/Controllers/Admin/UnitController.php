<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Unit;
use DataTables;
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Unit::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('unit.edit',$row->id);
                    $updateUrl = Route('unit.update',$row->id);
                    $delurl = Route('unit.delete',$row->id);
                    $edit = ' <a href="#addUnit"  target="_modal" class="editUnit" data-name="'.$row->name.'" data-sort="'.$row->sort_name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="unitDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
       $validator = Validator::make($request->all(), [
            'unit_name' => 'required|unique:units,name',
            'sort_name' => 'required'
       ]);

       if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
       }

       $unit = new Unit;
       $unit->name = $request->unit_name;
       $unit->sort_name = $request->sort_name;
       $unit->save();

       return response()->json(['success' => 'Unit added successfuly!']);
    
    }

    /**
     * Display the specified resource.
     */
    public function getUnit()
    {
        $unit = Unit::all();
        echo $unit;
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
            'unit_name' => 'required|unique:units,name,'.$id,
            'sort_name' => 'required'
       ]);

       if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
       }

       $unit =  Unit::find($id);
       $unit->name = $request->unit_name;
       $unit->sort_name = $request->sort_name;
       $unit->save();

       return response()->json(['success' => 'Unit update successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return response()->json(['success' => 'Unit deleted successfuly!']);
    }
}
