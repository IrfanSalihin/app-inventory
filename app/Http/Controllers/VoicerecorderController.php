<?php

namespace App\Http\Controllers;

use App\Models\Voicerecorder; // Make sure to import the correct model
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VoicerecorderController extends Controller
{
    public function index()
    {
        $voicerecorders = Voicerecorder::all();
        return view('voicerecorders.index', compact('voicerecorders'));
    }

    public function create()
    {
        return view('voicerecorders.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Voicerecorder::create($request->all());

        return redirect()->route('voicerecorders.index')->with('success', 'Voicerecorder created successfully');
    }

    public function show(Voicerecorder $voicerecorder)
    {
        return view('voicerecorders.show', compact('voicerecorder'));
    }

    public function edit(Voicerecorder $voicerecorder)
    {
        return view('voicerecorders.edit', compact('voicerecorder'));
    }

    public function update(Request $request, Voicerecorder $voicerecorder)
    {
        // Validation may be added here based on your requirements

        $voicerecorder->update($request->all());

        return redirect()->route('voicerecorders.index')->with('success', 'Voicerecorder updated successfully');
    }

    public function destroy(Voicerecorder $voicerecorder)
    {
        $voicerecorder->delete();

        return redirect()->route('voicerecorders.index')->with('success', 'Voicerecorder deleted successfully');
    }

    public function export($id)
    {
        $voicerecorder = Voicerecorder::find($id);

        if (!$voicerecorder) {
            abort(404); // Or handle the case when the Voicerecorder is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Place');
        $sheet->setCellValue('C1', 'Level');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'Serial Number');
        $sheet->setCellValue('F1', 'Memory Card');
        $sheet->setCellValue('G1', 'Description');
        $sheet->setCellValue('H1', 'Supplier');
        $sheet->setCellValue('I1', 'PO Number');
        $sheet->setCellValue('J1', 'Invoice Number');
        $sheet->setCellValue('K1', 'Price');
        $sheet->setCellValue('L1', 'Purchase Date');
        $sheet->setCellValue('M1', 'Purchase Date for Account');
        $sheet->setCellValue('N1', 'Warranty');
        $sheet->setCellValue('O1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:O2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:O2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('L2:M2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $sheet->getStyle('N2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'O');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond O, and break the loop if true
                if ($column > 'O') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $voicerecorder->location);
        $sheet->setCellValue('B2', $voicerecorder->place);
        $sheet->setCellValue('C2', $voicerecorder->level);
        $sheet->setCellValue('D2', $voicerecorder->model);
        $sheet->setCellValue('E2', $voicerecorder->serialnumber);
        $sheet->setCellValue('F2', $voicerecorder->memorycard);
        $sheet->setCellValue('G2', $voicerecorder->description);
        $sheet->setCellValue('H2', $voicerecorder->supplier);
        $sheet->setCellValue('I2', $voicerecorder->ponumber);
        $sheet->setCellValue('J2', $voicerecorder->invoicenumber);
        $sheet->setCellValue('K2', $voicerecorder->price);
        $sheet->setCellValue('L2', $voicerecorder->purchasedate);
        $sheet->setCellValue('M2', $voicerecorder->purchasedateaccount);
        $sheet->setCellValue('N2', $voicerecorder->warranty);
        $sheet->setCellValue('O2', $voicerecorder->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "voicerecorder_report_{$voicerecorder->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
