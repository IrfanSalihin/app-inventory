<?php

namespace App\Http\Controllers;

use App\Models\Barcodescanner;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BarcodescannerController extends Controller
{
    public function index()
    {
        $barcodescanners = Barcodescanner::all();
        return view('barcodescanners.index', compact('barcodescanners'));
    }

    public function create()
    {
        return view('barcodescanners.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Barcodescanner::create($request->all());

        return redirect()->route('barcodescanners.index')->with('success', 'Barcodescanner created successfully');
    }

    public function show(Barcodescanner $barcodescanner)
    {
        return view('barcodescanners.show', compact('barcodescanner'));
    }

    public function edit(Barcodescanner $barcodescanner)
    {
        return view('barcodescanners.edit', compact('barcodescanner'));
    }

    public function update(Request $request, Barcodescanner $barcodescanner)
    {
        // Validation may be added here based on your requirements

        $barcodescanner->update($request->all());

        return redirect()->route('barcodescanners.index')->with('success', 'Barcodescanner updated successfully');
    }

    public function destroy(Barcodescanner $barcodescanner)
    {
        $barcodescanner->delete();

        return redirect()->route('barcodescanners.index')->with('success', 'Barcodescanner deleted successfully');
    }

    public function export($id)
    {
        $barcodescanner = Barcodescanner::find($id);

        if (!$barcodescanner) {
            abort(404); // Or handle the case when the barcodescanner is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Branches');
        $sheet->setCellValue('C1', 'Department');
        $sheet->setCellValue('D1', 'Staff Name');
        $sheet->setCellValue('E1', 'Model');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'Purchase Date');
        $sheet->setCellValue('H1', 'Price');
        $sheet->setCellValue('I1', 'Notes');
        $sheet->setCellValue('J1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $sheet->getStyle('A1:J1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:J2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:J2')->getFont()->setBold(false);

        // Format date cell
        $sheet->getStyle('G2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'J');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond J, and break the loop if true
                if ($column > 'J') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $barcodescanner->location);
        $sheet->setCellValue('B2', $barcodescanner->branches);
        $sheet->setCellValue('C2', $barcodescanner->department);
        $sheet->setCellValue('D2', $barcodescanner->staffname);
        $sheet->setCellValue('E2', $barcodescanner->model);
        $sheet->setCellValue('F2', $barcodescanner->serialnumber);
        $sheet->setCellValue('G2', $barcodescanner->purchasedate);
        $sheet->setCellValue('H2', $barcodescanner->price);
        $sheet->setCellValue('I2', $barcodescanner->notes);
        $sheet->setCellValue('J2', $barcodescanner->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "barcodescanner_report_{$barcodescanner->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
