<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Group::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('group.edit',$row->id);
                    $updateUrl = Route('group.update',$row->id);
                    $delurl = Route('group.delete',$row->id);
                    $edit = ' <a href="#addGroup"  target="_modal" class="editGroup" data-name="'.$row->name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="groupDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
    public function getGroup()
    {
        $group = Group::all();
        echo $group;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'group' => 'required|unique:groups,name'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $group = new Group;
        $group->name = $request->group;
        $group->save();
        return response()->json(['success' => 'Group added successfuly!']);
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
            'group' => 'required|unique:groups,name,'.$id,
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $group = Group::find($id);
        $group->name = $request->group;
        $group->save();
        return response()->json(['success' => 'Group added successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        $group->delete();

        return response()->json(['success' => 'Group deleted successfuly!']);
    }
}
