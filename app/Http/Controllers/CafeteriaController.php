<?php

namespace App\Http\Controllers;

use App\Models\Cafeteria;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CafeteriaController extends Controller
{
    public function index()
    {
        $cafeterias = Cafeteria::all();
        return view('cafeterias.index', compact('cafeterias'));
    }

    public function create()
    {
        return view('cafeterias.create');
    }

    public function store(Request $request)
    {
        Cafeteria::create($request->all());

        return redirect()->route('cafeterias.index')->with('success', 'Cafeteria Item created successfully');
    }

    public function show(Cafeteria $cafeteria)
    {
        return view('cafeterias.show', compact('cafeteria'));
    }

    public function edit(Cafeteria $cafeteria)
    {
        return view('cafeterias.edit', compact('cafeteria'));
    }

    public function update(Request $request, Cafeteria $cafeteria)
    {
        // Validation may be added here based on your requirements

        $cafeteria->update($request->all());

        return redirect()->route('cafeterias.index')->with('success', 'Cafeteria Item updated successfully');
    }

    public function destroy(Cafeteria $cafeteria)
    {
        $cafeteria->delete();

        return redirect()->route('cafeterias.index')->with('success', 'Cafeteria Item deleted successfully');
    }

    public function export($id)
    {
        $cafeteria = Cafeteria::find($id);

        if (!$cafeteria) {
            abort(404); // Or handle the case when the cafeteria is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

         // Add headers
         $sheet->setCellValue('A1', 'Staff Name');
         $sheet->setCellValue('B1', 'Staff Number');
         $sheet->setCellValue('C1', 'Item');
         $sheet->setCellValue('D1', 'Item Description');
         $sheet->setCellValue('E1', 'Brand and Model');
         $sheet->setCellValue('F1', 'Serial Number');
         $sheet->setCellValue('G1', 'Payment Date');
         $sheet->setCellValue('H1', 'Original Value');
         $sheet->setCellValue('I1', 'Status');

         // ... (rest of the header definitions remain similar)

        // Set headers' font style and background color
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:I2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:I2')->getFont()->setBold(false);

        // Format date cell (assuming it is a DateTime object)
        $sheet->getStyle('G2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond I, and break the loop if true
                if ($column > 'I') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $cafeteria->staffname);
        $sheet->setCellValue('B2', $cafeteria->staffnumber);
        $sheet->setCellValue('C2', $cafeteria->item);
        $sheet->setCellValue('D2', $cafeteria->itemdescription);
        $sheet->setCellValue('E2', $cafeteria->brandnmodel);
        $sheet->setCellValue('F2', $cafeteria->serialnumber);
        $sheet->setCellValue('G2', $cafeteria->payment); // Format date as needed
        $sheet->setCellValue('H2', $cafeteria->originalvalue);
        $sheet->setCellValue('I2', $cafeteria->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "cafeteria_report_{$cafeteria->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}


