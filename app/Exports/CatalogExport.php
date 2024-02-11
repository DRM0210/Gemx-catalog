<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class CatalogExport implements FromCollection
{
    protected $catid;
    protected $token;

    public function __construct($catid, $token)
    {
        $this->catid = $catid;
        $this->token = $token;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $tableData = DB::table('buyer_prod_show_permissions as buyer')
            ->select('buyer.*', 'pr.id','pr.created_at', 'pr.selling_price as sellprice', 'pr.name as pname')
            ->leftJoin('products as pr', 'pr.id', '=', 'buyer.product_id')
            ->leftJoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
            ->orderBy('pr.created_at', 'desc')
            ->where('buyer.catalog_id', $this->catid)
            ->where('buyer.securitycode', $this->token)
            ->get();

        return collect($tableData);
    }
}
