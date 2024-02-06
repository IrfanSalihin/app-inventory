<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PrinterController extends Controller
{
    public function index()
    {
        $printers = Printer::all();
        return view('printers.index', compact('printers'));
    }

    public function create()
    {
        return view('printers.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Printer::create($request->all());

        return redirect()->route('printers.index')->with('success', 'Printer created successfully');
    }

    public function show(Printer $printer)
    {
        return view('printers.show', compact('printer'));
    }

    public function edit(Printer $printer)
    {
        return view('printers.edit', compact('printer'));
    }

    public function update(Request $request, Printer $printer)
    {
        // Validation may be added here based on your requirements

        $printer->update($request->all());

        return redirect()->route('printers.index')->with('success', 'Printer updated successfully');
    }

    public function destroy(Printer $printer)
    {
        $printer->delete();

        return redirect()->route('printers.index')->with('success', 'Printer deleted successfully');
    }

    public function export($id)
    {
        $printer = Printer::find($id);

        if (!$printer) {
            abort(404); // Or handle the case when the printer is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Level');
        $sheet->setCellValue('C1', 'Staff Name');
        $sheet->setCellValue('D1', 'Brand');
        $sheet->setCellValue('E1', 'Model');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'Supplier');
        $sheet->setCellValue('H1', 'PO Number');
        $sheet->setCellValue('I1', 'Invoice Number');
        $sheet->setCellValue('J1', 'Price');
        $sheet->setCellValue('K1', 'Purchasing Date');
        $sheet->setCellValue('L1', 'Purchasing Date for Account');
        $sheet->setCellValue('M1', 'Warranty');
        $sheet->setCellValue('N1', 'Remarks');
        $sheet->setCellValue('O1', 'Status');


        // Set headers' font style and background color
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:O2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:O2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('K2:L2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'N');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond N, and break the loop if true
                if ($column > 'N') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $printer->location);
        $sheet->setCellValue('B2', $printer->level);
        $sheet->setCellValue('C2', $printer->staff_name);
        $sheet->setCellValue('D2', $printer->brand);
        $sheet->setCellValue('E2', $printer->model);
        $sheet->setCellValue('F2', $printer->serial_number);
        $sheet->setCellValue('G2', $printer->supplier);
        $sheet->setCellValue('H2', $printer->po_number);
        $sheet->setCellValue('I2', $printer->invoice_number);
        $sheet->setCellValue('J2', $printer->price);
        $sheet->setCellValue('K2', $printer->purchasing_date);
        $sheet->setCellValue('L2', $printer->purchasing_date_for_account);
        $sheet->setCellValue('M2', $printer->warranty);
        $sheet->setCellValue('N2', $printer->remarks);
        $sheet->setCellValue('O2', $printer->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "printer_report_{$printer->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
