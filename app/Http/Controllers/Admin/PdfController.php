<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Barryvdh\Snappy\Facades\SnappyPdf ;
use DB;
use App\Models\User;
use PDF;
use App\Models\companyaccount;
class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
      
        $products = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice','pr.name as pname')
        ->leftjoin('products as pr', 'pr.id', '=', 'buyer.product_id')
        ->leftjoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
        ->orderBy('pr.created_at', 'desc')
        ->where('buyer.catalog_id', $request->catId)
        ->where('buyer.securitycode', $request->cat_token)
        ->get();
        $userdetails  = DB::table('buyer_prod_show_permissions as buyer')
        ->select('buyer.*')
        ->where('buyer.catalog_id', $request->catId)
        ->where('buyer.securitycode', $request->cat_token)
        ->first();

        $user = User::find($userdetails->buyer_id);
  
        $companyaccount = companyaccount::where('status','1')->first();
      
        $data =  compact('products','user','companyaccount');
        $filename = time() . 'quotation.pdf';

        $pdf = SnappyPdf::loadView('admin.pages.catalogue.pdf', $data);
        
        // Save the PDF to a file
        $pdf->save(public_path('path/to/save/'.$filename));

      
        
        $downloadLink = url('path/to/save/' . $filename);
        
        // Return as response
         return response()->json(['success' => true, 'download_link' => $downloadLink]);
        // return $pdf->download('quotation.pdf');


    }
}
