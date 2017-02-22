<?php
/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 21/02/17
 * Time: 00:35
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelSamplesController
{
    public function export() {
        $download = Excel::create('Sample File', function($excel) {

            // Set the title
            $excel->setTitle('Spreadsheet Example');

            // Chain the setters
            $excel->setCreator('MariliaCK')
                ->setCompany('LASAC/UFMS');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

            // Define the Excel spreadsheet headers
            $labelsArray[] = ['id', 'customer','email','total','created_at'];

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('Sample Sheet 1', function($sheet) use ($labelsArray) {
                $sheet->fromArray($labelsArray, null, 'A1', false, false);
            });

        })->download('xls');
        return $download;
    }

    public function tableExport($class) {
        $class = 'App\\'.$class;
        $result = $class::all();
        Excel::create('output', function($excel) use($result) {
            $excel->sheet('Sheet 1', function($sheet) use($result) {
                $sheet->fromArray($result);
            });
        })->download('xls');
    }
}