<?php

namespace App\Http\Controllers;

use App\Models\Upowersupp;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UpowersuppController extends Controller
{
    public function index()
    {
        $upowersupps = Upowersupp::all();
        return view('upowersupps.index', compact('upowersupps'));
    }

    public function create()
    {
        return view('upowersupps.create');
    }

    public function store(Request $request)
    {
        Upowersupp::create($request->all());

        return redirect()->route('upowersupps.index')->with('success', 'UPS created successfully');
    }

    public function show(Upowersupp $upowersupp)
    {
        return view('upowersupps.show', compact('upowersupp'));
    }

    public function edit(Upowersupp $upowersupp)
    {
        return view('upowersupps.edit', compact('upowersupp'));
    }

    public function update(Request $request, Upowersupp $upowersupp)
    {
        // Validation may be added here based on your requirements

        $upowersupp->update($request->all());

        return redirect()->route('upowersupps.index')->with('success', 'UPS updated successfully');
    }

    public function destroy(Upowersupp $upowersupp)
    {
        $upowersupp->delete();

        return redirect()->route('upowersupps.index')->with('success', 'UPS deleted successfully');
    }

        public function export($id)
    {
        $upowersupp = Upowersupp::find($id);

        if (!$upowersupp) {
            abort(404); // Or handle the case when the UPS is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        if (!$upowersupps) {
            abort(404); // Or handle the case when the projector is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Place');
        $sheet->setCellValue('C1', 'Level');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'Model Number');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'PWD');
        $sheet->setCellValue('H1', 'SNID');
        $sheet->setCellValue('I1', 'Supplier');
        $sheet->setCellValue('J1', 'PO Number');
        $sheet->setCellValue('K1', 'Invoice Number');
        $sheet->setCellValue('L1', 'Price');
        $sheet->setCellValue('M1', 'Purchase Date');
        $sheet->setCellValue('N1', 'Purchase Date Account');
        $sheet->setCellValue('O1', 'Warranty');
        $sheet->setCellValue('P1', 'Status');

        // ... (rest of the header definitions remain similar)

        // Set headers' font style and background color
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:L2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:L2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('I2:J2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond L, and break the loop if true
                if ($column > 'L') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

         // Add data
         $sheet->setCellValue('A2', $upowersupp->location);
         $sheet->setCellValue('B2', $upowersupp->model);
         $sheet->setCellValue('C2', $upowersupp->modeltype);
         $sheet->setCellValue('D2', $upowersupp->serialnumber);
         $sheet->setCellValue('E2', $upowersupp->supplier);
         $sheet->setCellValue('F2', $upowersupp->ponumber);
         $sheet->setCellValue('G2', $upowersupp->invoicenumber);
         $sheet->setCellValue('H2', $upowersupp->price);
         $sheet->setCellValue('I2', $upowersupp->purchasedate); // Format date as needed
         $sheet->setCellValue('J2', $upowersupp->purchasedateaccount); // Format date as needed
         $sheet->setCellValue('K2', $upowersupp->warranty);
         $sheet->setCellValue('L2', $upowersupp->status);
 
         // ... (rest of the data population remains similar)
 
         // Save the Excel file
         $writer = new Xlsx($spreadsheet);
         $filename = "ups_report_{$upowersupp->id}.xlsx";
 
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header("Content-Disposition: attachment;filename=\"$filename\"");
         header('Cache-Control: max-age=0');
 
         $writer->save('php://output');
         exit;
    
    
    }

} 

