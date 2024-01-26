<?php

namespace App\Http\Controllers;

use App\Models\Soft;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SoftController extends Controller
{
    public function index()
    {
        $softs = Soft::all();
        return view('softs.index', compact('softs'));
    }

    public function create()
    {
        return view('softs.create');
    }

    public function store(Request $request)
    {
        Soft::create($request->all());

        return redirect()->route('softs.index')->with('success', 'Software created successfully');
    }

    public function show(Soft $soft)
    {
        return view('softs.show', compact('soft'));
    }

    public function edit(Soft $soft)
    {
        return view('softs.edit', compact('soft'));
    }

    public function update(Request $request, Soft $soft)
    {
        // Validation may be added here based on your requirements

        $soft->update($request->all());

        return redirect()->route('softs.index')->with('success', 'Software updated successfully');
    }

    public function destroy(Soft $soft)
    {
        $soft->delete();

        return redirect()->route('softs.index')->with('success', 'Software deleted successfully');
    }

    public function export($id)
    {
        $soft = Soft::find($id);

        if (!$soft) {
            abort(404); // Or handle the case when the software is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Item');
        $sheet->setCellValue('B1', 'Vendor');
        $sheet->setCellValue('C1', 'Location');
        $sheet->setCellValue('D1', 'Payment Date');
        $sheet->setCellValue('E1', 'Original Value (RM)');
        $sheet->setCellValue('F1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:F2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:F2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('D2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond F, and break the loop if true
                if ($column > 'F') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $soft->item);
        $sheet->setCellValue('B2', $soft->vendor);
        $sheet->setCellValue('C2', $soft->location);
        $sheet->setCellValue('D2', $soft->payment); // Format date as needed
        $sheet->setCellValue('E2', $soft->originalvalue);
        $sheet->setCellValue('F2', $soft->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "software_report_{$soft->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}

