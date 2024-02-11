<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Slide\SlideLayout;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Shape\RichText;
use DB;
class PPTController extends Controller
{
    public function exportPpt($catid, $token)
    {
        // Create a presentation object
        $presentation = new PhpPresentation();
    
        // Create a blank slide
        $slide = $presentation->createSlide();
    
        // Add a shape to the slide
        $shape = $slide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(10)
            ->setOffsetY(10);
    
        // Retrieve your table data (replace this with your actual data retrieval logic)
        $tableData = DB::table('buyer_prod_show_permissions as buyer')
            ->select('buyer.*', 'pr.*', 'pr.selling_price as sellprice', 'pr.name as pname')
            ->leftJoin('products as pr', 'pr.id', '=', 'buyer.product_id')
            ->leftJoin('catalogs', 'buyer.catalog_id', '=', 'catalogs.id')
            ->orderBy('pr.created_at', 'desc')
            ->where('buyer.catalog_id', $catid)
            ->where('buyer.securitycode', $token)
            ->get();
    
        // Build a table in the shape
        $this->buildTable($shape, $tableData);
    
        // Set the response headers for PowerPoint download
        $filename = 'table_data.pptx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');
    
        // Save the presentation to the output stream
        $writer = new \PhpOffice\PhpPresentation\Writer\PowerPoint2007($presentation);
        $writer->save("php://output");
        exit;
    }
    
    private function buildTable(RichText $shape, $tableData)
    {
        // Add table headers
        $shape->createTextRun('Image')->getFont()->setBold(true);
        $shape->createTextRun('Product name')->getFont()->setBold(true);
        $shape->createTextRun("\tProduct Selling Price")->getFont()->setBold(true);
    
        // Add table rows
        foreach ($tableData as $row) {
            $imagePath = asset('product_images/' . $row->product_themlin);
            $shape->createTextRun("\r\r{$imagePath}\t{$row->pname}\t{$row->sellprice}");
        }
    }
    
}
