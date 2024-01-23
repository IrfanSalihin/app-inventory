<?php

namespace App\Http\Controllers;

use App\Models\smartphone;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::all();
        return view('smartphones.index', compact('smartphones'));
    }

    public function create()
    {
        return view('smartphones.create');
    }

    public function store(Request $request)
    {
        Smartphone::create($request->all());

        return redirect()->route('smartphones.index')->with('success', 'Smartphone created successfully');
    }
    public function show(Smartphone $smartphone)
    {
        return view('smartphones.show', compact('smartphone'));
    }

    public function edit(Smartphone $smartphone)
    {
        return view('smartphones.edit', compact('smartphone'));
    }

    public function update(Request $request, Smartphone $smartphone)
    {
        // Validation may be added here based on your requirements

        $smartphone->update($request->all());

        return redirect()->route('smartphones.index')->with('success', 'Smartphone updated successfully');
    }

    public function destroy(Smartphone $smartphone)
    {
        $smartphone->delete();

        return redirect()->route('smartphones.index')->with('success', 'Smartphone deleted successfully');
    }
    public function export($id)
    {
        $smartphone = Smartphone::find($id);

        if (!$smartphone) {
            abort(404); // Or handle the case when the smartphone is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Model');
        $sheet->setCellValue('C1', 'Type');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'RAM (GB)');
        $sheet->setCellValue('F1', 'ROM (GB)');
        $sheet->setCellValue('G1', 'Color');
        $sheet->setCellValue('H1', 'Supplier');
        $sheet->setCellValue('I1', 'Purchase Date');
        $sheet->setCellValue('J1', 'Price');
        $sheet->setCellValue('K1', 'Warranty');
        $sheet->setCellValue('L1', 'Status');

        // ... (rest of the header definitions remain similar)

         // Set headers' font style and background color
        $sheet->getStyle('A1:AC1')->getFont()->setBold(true);
        $sheet->getStyle('A1:AC1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:AC2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:AC2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('Y2:AA2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond AC, and break the loop if true
                if ($column > 'AC') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $smartphone->location);
        $sheet->setCellValue('B2', $smartphone->model);
        $sheet->setCellValue('C2', $smartphone->type);
        $sheet->setCellValue('D2', $smartphone->serialnumber);
        $sheet->setCellValue('E2', $smartphone->ram);
        $sheet->setCellValue('F2', $smartphone->rom);
        $sheet->setCellValue('G2', $smartphone->color);
        $sheet->setCellValue('H2', $smartphone->supplier);
        $sheet->setCellValue('I2', $smartphone->purchasedate); // Format date as needed
        $sheet->setCellValue('J2', $smartphone->price);
        $sheet->setCellValue('K2', $smartphone->warranty);
        $sheet->setCellValue('L2', $smartphone->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "smartphone_report_{$smartphone->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}

