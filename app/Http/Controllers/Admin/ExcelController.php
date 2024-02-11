<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Productexporet;
use App\Exports\CatalogExport;
use App\Exports\Categoryexporet;
use App\Exports\Unitsexporet;
use App\Exports\Brandexporet;
use App\Exports\Groupexporet;
use App\Exports\Colorsexporet;
use App\Exports\Variantexporet;
use App\Exports\Coustomerexporet;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use DB;
class ExcelController extends Controller
{
    public function productexporet()
    {
        return Excel::download(new Productexporet, 'table_records.xlsx');
    }
    public function categoryexporet()
    {
        return Excel::download(new Categoryexporet, 'category_data.xlsx');
    }
    public function unitsexporet()
    {
        return Excel::download(new Unitsexporet, 'unit_data.xlsx');
    }
    public function brandexporet()
    {
        return Excel::download(new Brandexporet, 'brand_data.xlsx');
    }
    public function groupsexporet()
    {
        return Excel::download(new Groupexporet, 'group_data.xlsx');
    }
    public function colorexporet()
    {
        return Excel::download(new Colorsexporet, 'color_data.xlsx');
    }
    public function variantexporet()
    {
        return Excel::download(new Variantexporet, 'variant_data.xlsx');
    }
    public function catalogexporet($catid, $token)
    {
        return Excel::download(new CatalogExport($catid, $token), 'catalog_data.xlsx');
    }

    public function exportData(Request $request)
    {
        $cid = $request->cid;
        

        return Excel::download(new Coustomerexporet($cid), 'customer_data.xlsx');
    }
  
}
