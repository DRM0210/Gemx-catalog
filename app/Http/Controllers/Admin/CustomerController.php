<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Hash;
use App\Models\User;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('sr_number', function($row){
                    $sr = $row->id;
                    return $sr;
                })
                ->addColumn('checkbox', function($row){
                    $checkbox = '<input type="checkbox" value="'.$row->id.'" name="checkbox[]" class="checkbox">';
                    return $checkbox;
                })
                ->addColumn('action', function($row){
                    $editurl = Route('customer.edit',$row->id); 
                    $updateUrl = Route('customer.update',$row->id);
                    $delurl = Route('customer.delete',$row->id);
                    $edit = ' <a href="javascript:void('.$row->id.');" class="edit" data-edit="'.$editurl.'" data-update="'.$updateUrl.'"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a>';
                    $delete = ' <a href="javascript:void('.$row->id.');" class="delete" data-url="'.$delurl.'" ><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a>';
                  
                    $btns = $edit . $delete;
                    return $btns;
                })
                ->rawColumns(['sr_number','action','checkbox'])
                ->make(true);
        }
        return view('admin.pages.customer.index');
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
       // DD($request->all());
        $validator = Validator::make($request->all(), [
            'fname' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $customer = new User;
        $customer->name = $request->fname .' '. $request->lname;
        $customer->email = $request->email;
        $customer->mobile = $request->phone;
        $customer->pinno = $request->tin;
        $customer->address = $request->addresh;
        $customer->company = $request->company;
        $customer->password = Hash::make('123456');
        $customer->save();

        return response()->json(['success' => 'Customer added successfuly!']);

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
      $customer = User::find($id);
      echo $customer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $customer = User::find($id);
        $customer->name = $request->fname .' '. $request->lname;
        $customer->email = $request->email;
        $customer->mobile = $request->phone;
        $customer->pinno = $request->tin;
        $customer->address = $request->addresh;
        $customer->company = $request->company;
        $customer->password = Hash::make('123456');
        $customer->save();

        return response()->json(['update' => 'Customer updated successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = User::find($id);
        $customer->delete();
        return response()->json(['success' => 'Customer deleted successfuly!']);
    }
    public function deletecheck(Request $request)
    {
       
        $customer = User::whereIn('id',$request->cid)->delete();
        return response()->json(['success' => 'Customer deleted successfuly!']);
    }
}
