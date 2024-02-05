<?php

namespace App\Http\Controllers;

use App\Models\Photostatemac;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PhotostatemacController extends Controller
{
    public function index()
    {
        $photostatemacs = Photostatemac::all();
        return view('photostatemacs.index', compact('photostatemacs'));
    }

    public function create()
    {
        return view('photostatemacs.create');
    }

    public function store(Request $request)
    {
        Photostatemac::create($request->all());

        return redirect()->route('photostatemacs.index')->with('success', 'Photostate Machine created successfully');
    }

    public function show(Photostatemac $photostatemac)
    {
        return view('photostatemacs.show', compact('photostatemac'));
    }

    public function edit(Photostatemac $photostatemac)
    {
        return view('photostatemacs.edit', compact('photostatemac'));
    }

    public function update(Request $request, Photostatemac $photostatemac)
    {
        // Validation may be added here based on your requirements

        $photostatemac->update($request->all());

        return redirect()->route('photostatemacs.index')->with('success', 'Photostate Machine updated successfully');
    }

    public function destroy(Photostatemac $photostatemac)
    {
        $photostatemac->delete();

        return redirect()->route('photostatemacs.index')->with('success', 'Photostate Machine deleted successfully');
    }

    public function export($id)
    {
        $photostatemac = Photostatemac::find($id);

        if (!$photostatemac) {
            abort(404); // Or handle the case when the photostatemac is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Level');
        $sheet->setCellValue('C1', 'Model');
        $sheet->setCellValue('D1', 'Type');
        $sheet->setCellValue('E1', 'Serial Number');
        $sheet->setCellValue('F1', 'Ownership');
        $sheet->setCellValue('G1', 'Status');

        // ... (rest of the header definitions remain similar)

        // Set headers' font style and background color
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:G2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:G2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        // You may need to adjust this based on the actual data types in your model
        // $sheet->getStyle('M2:N2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond G, and break the loop if true
                if ($column > 'G') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $photostatemac->location);
        $sheet->setCellValue('B2', $photostatemac->level);
        $sheet->setCellValue('C2', $photostatemac->model);
        $sheet->setCellValue('D2', $photostatemac->type);
        $sheet->setCellValue('E2', $photostatemac->serialnumber);
        $sheet->setCellValue('F2', $photostatemac->ownership);
        $sheet->setCellValue('G2', $photostatemac->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "photostatemac_report_{$photostatemac->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
