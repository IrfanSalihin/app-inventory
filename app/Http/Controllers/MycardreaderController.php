<?php

namespace App\Http\Controllers;

use App\Models\Mycardreader;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MycardreaderController extends Controller
{
    public function index()
    {
        $mycardreaders = Mycardreader::all();
        return view('mycardreaders.index', compact('mycardreaders'));
    }

    public function create()
    {
        return view('mycardreaders.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Mycardreader::create($request->all());

        return redirect()->route('mycardreaders.index')->with('success', 'Mycardreader created successfully');
    }

    public function show(Mycardreader $mycardreader)
    {
        return view('mycardreaders.show', compact('mycardreader'));
    }

    public function edit(Mycardreader $mycardreader)
    {
        return view('mycardreaders.edit', compact('mycardreader'));
    }

    public function update(Request $request, Mycardreader $mycardreader)
    {
        // Validation may be added here based on your requirements

        $mycardreader->update($request->all());

        return redirect()->route('mycardreaders.index')->with('success', 'Mycardreader updated successfully');
    }

    public function destroy(Mycardreader $mycardreader)
    {
        $mycardreader->delete();

        return redirect()->route('mycardreaders.index')->with('success', 'Mycardreader deleted successfully');
    }

    public function export($id)
    {
        $mycardreader = Mycardreader::find($id);

        if (!$mycardreader) {
            abort(404); // Or handle the case when the mycardreader is not found
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
        $sheet->setCellValue('A2', $mycardreader->location);
        $sheet->setCellValue('B2', $mycardreader->branches);
        $sheet->setCellValue('C2', $mycardreader->department);
        $sheet->setCellValue('D2', $mycardreader->staffname);
        $sheet->setCellValue('E2', $mycardreader->model);
        $sheet->setCellValue('F2', $mycardreader->serialnumber);
        $sheet->setCellValue('G2', $mycardreader->purchasedate);
        $sheet->setCellValue('H2', $mycardreader->price);
        $sheet->setCellValue('I2', $mycardreader->notes);
        $sheet->setCellValue('J2', $mycardreader->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "mycardreader_report_{$mycardreader->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
