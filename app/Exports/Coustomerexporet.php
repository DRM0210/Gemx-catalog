<?php 
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Coustomerexporet implements FromCollection
{
    protected $cid;



    public function __construct($cid)
    {
        $this->cid = $cid;
    }

   /**
     * @return \Illuminate\Support\Collection
    */
 
    public function collection()
    {
        $customers = User::select('id','name','email','mobile','address','pinno','company')->whereIn('id', $this->cid)->get();
         
        return collect($customers);
    }

}   

