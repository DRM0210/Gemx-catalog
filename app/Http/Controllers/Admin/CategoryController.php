<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resourrrrrrce.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Category::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('category.edit',$row->id);
                    $updateUrl = Route('category.update',$row->id);
                    $delurl = Route('category.delete',$row->id);
                    $edit = ' <a  class="editCategory" href="#addCategory"  target="_modal" data-name="'.$row->cat_name.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="catDelete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
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
    public function getCategory()
    {
       $category = Category::all();
       echo $category;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|unique:categories,cat_name'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }


        $cat = new Category;
        $cat->cat_name = $request->cat_name;
        $cat->save();
        return response()->json(['success' => 'Category added successfuly!']);
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
            'cat_name' => 'required|unique:categories,cat_name,'.$id,
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }


        $cat =  Category::find($id);
        $cat->cat_name = $request->cat_name;
        $cat->save();
        return response()->json(['success' => 'Category update successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return response()->json(['success' => 'Category deleted successfuly!']);
    }
}
