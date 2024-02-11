<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\Models\User; // Replace with your actual model
use App\Models\companyaccount;
class NewPdfController extends Controller
{
    public function generatePdf(Request $request ,$catid,$token)
    {
        $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.catalog_id', $catid)
        ->where('buyer.securitycode', $token)
        ->get();
        $userdetails  = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*')
        ->where('buyer.catalog_id', $catid)
        ->where('buyer.securitycode', $token)
        ->first();

        $user = User::find($userdetails->buyer_id);
  
        $companyaccount = companyaccount::where('status','1')->first();



        $data = compact('products', 'user', 'companyaccount');
        $pdf = PDF::loadView('admin.pages.catalogue.pdf', $data);
        
        // Get the PDF as a string
        $pdfContent = $pdf->output();
        
        // Save the PDF content to the desired location
        file_put_contents('public/path/to/table_records.pdf', $pdfContent);
        
        // OR use shell_exec to directly execute wkhtmltopdf
     
        
        // Handle the result or return a response based on your needs
        
    }
}
