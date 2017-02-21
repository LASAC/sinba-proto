<?php

/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 20/02/17
 * Time: 22:29
 */

namespace App\Excel;

use Maatwebsite\Excel\Facades\Excel;

class ExcelCreator
{
    protected $excelFile;
    protected $creator;

    const XLS_FORMAT = 'xls';
    const XLSX_FORMAT = 'xlsx';
    const CSV_FORMAT = 'csv';

    function __construct($creator)
    {
        $this->creator;
    }

    public function create(SingleSheet $sheet) {
        $this->excelFile = Excel::create($sheet->fileName(), function($excel) use ($sheet) {
            // Set the title
            $excel->setTitle($sheet->title());

            // Chain the setters
            $excel->setCreator($this->creator)
                  ->setCompany($sheet->company());

            // Call them separately
            $excel->setDescription($sheet->description());

            // Define the Excel spreadsheet headers
            $labels = $sheet->labels();

            // Build the spreadsheet, passing in the payments array
            $excel->sheet($sheet->title(), function($sheet) use ($labels) {
                $sheet->fromArray($labels, null, 'A1', false, false);
            });
        });
        return $this;
    }

    public function download($format) {
        if ($this->excelFile && $this->validFormat($format)) {
            return $this->excelFile->download($format);
        }
        return null;
    }

    private function validFormat($format) {
        switch ($format) {
            case 'csv':
            case 'xls':
            case 'xlsx':
            case 'pdf':
                return true;
        }
        return false;
    }
}