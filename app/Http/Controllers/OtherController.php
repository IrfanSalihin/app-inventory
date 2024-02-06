<?php

namespace App\Http\Controllers;

use App\Models\Other;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OtherController extends Controller
{
    public function index()
    {
        $others = Other::all();
        return view('others.index', compact('others'));
    }

    public function create()
    {
        return view('others.create');
    }

    public function store(Request $request)
    {
        Other::create($request->all());

        return redirect()->route('others.index')->with('success', 'Other created successfully');
    }

    public function show(other $other)
    {
        return view('others.show', compact('other'));
    }

    public function edit(other $other)
    {
        return view('others.edit', compact('other'));
    }

    public function update(Request $request, other $other)
    {
        // Validation may be added here based on your requirements

        $other->update($request->all());

        return redirect()->route('others.index')->with('success', 'Other updated successfully');
    }

    public function destroy(other $other)
    {
        $other->delete();

        return redirect()->route('others.index')->with('success', 'Other deleted successfully');
    }

    public function export($id)
    {
        $other = other::find($id);

        if (!$other) {
            abort(404); // Or handle the case when the model is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Place');
        $sheet->setCellValue('C1', 'Model');
        $sheet->setCellValue('D1', 'Item');
        $sheet->setCellValue('E1', 'Unit');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'Supplier');
        $sheet->setCellValue('H1', 'Purchase Date');
        $sheet->setCellValue('I1', 'Price');
        $sheet->setCellValue('J1', 'Status');

        // ... (rest of the header definitions remain similar)

        // Set headers' font style and background color
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $sheet->getStyle('A1:J1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:J2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:J2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('H2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

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
        $sheet->setCellValue('A2', $other->location);
        $sheet->setCellValue('B2', $other->place);
        $sheet->setCellValue('C2', $other->model);
        $sheet->setCellValue('D2', $other->item);
        $sheet->setCellValue('E2', $other->unit);
        $sheet->setCellValue('F2', $other->serialnumber);
        $sheet->setCellValue('G2', $other->supplier);
        $sheet->setCellValue('H2', $other->purchasedate); // Format date as needed
        $sheet->setCellValue('I2', $other->price);
        $sheet->setCellValue('J2', $other->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "other_model_report_{$other->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
