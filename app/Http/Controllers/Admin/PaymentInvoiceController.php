<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyaccount;
use Validator;
class PaymentInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
       $accounts = companyaccount::get();
        return view('admin.pages.payment.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required',
            'bank_account' => 'required',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'country_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if($request->ajax()){
            $adddata = new companyaccount;
            $adddata->company_name=$request->company_name;
            $adddata->company_email=$request->company_email;
            $adddata->company_address=$request->company_address;
            $adddata->company_phone=$request->company_phone;
            $adddata->bank_account=$request->bank_account;
            $adddata->bank_name=$request->bank_name;
            $adddata->ifsc_code=$request->ifsc_code;
            $adddata->country_name=$request->country_name;
            $adddata->save();
            $accounts = companyaccount::get();
            $success = view('admin.pages.payment.accounts', compact('accounts'))->render();
            return response()->json(['success' => $success]);
        }
    }

    /**
     *  activ account.
     */
    public function activaccount(Request $request)
    {  
        $upadateold = companyaccount::where('status','1')->update(['status'=>0]);
        $upadatenew = companyaccount::where('id',$request->id)->where('status','0')->update(['status'=>1]);
       
         $accounts = companyaccount::all();
        $filterView = view('admin.pages.payment.accounts', compact('accounts'))->render();
        return response()->json(['filterView' => $filterView]);

    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $data=companyaccount::find($id);
        echo $data;
    }

    /**
     *  Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required',
            'bank_account' => 'required',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'country_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if($request->ajax()){
            $adddata = companyaccount::find($request->customerid);
            $adddata->company_name=$request->company_name;
            $adddata->company_email=$request->company_email;
            $adddata->company_address=$request->company_address;
            $adddata->company_phone=$request->company_phone;
            $adddata->bank_account=$request->bank_account;
            $adddata->bank_name=$request->bank_name;
            $adddata->ifsc_code=$request->ifsc_code;
            $adddata->country_name=$request->country_name;
            $adddata->save();
            $accounts = companyaccount::all();
            $success = view('admin.pages.payment.accounts', compact('accounts'))->render();
            return response()->json(['update' => 'Account updated successfuly!','success' => $success]);
    }

}
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $accountdelete = companyaccount::find($id);
        $accountdelete->delete();
        $accounts = companyaccount::all();
        $outputdata = view('admin.pages.payment.accounts', compact('accounts'))->render();
      
        return response()->json(['success' => 'Account deleted successfuly!','outputdata'=>$outputdata]);
    }
}
