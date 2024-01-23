<?php

namespace App\Http\Controllers;

use App\Models\Ipad;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IpadController extends Controller
{
    public function index()
    {
        $ipads = Ipad::all();
        return view('ipads.index', compact('ipads'));
    }

    public function create()
    {
        return view('ipads.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Ipad::create($request->all());

        return redirect()->route('ipads.index')->with('success', 'iPad created successfully');
    }

    public function show(Ipad $ipad)
    {
        return view('ipads.show', compact('ipad'));
    }

    public function edit(Ipad $ipad)
    {
        return view('ipads.edit', compact('ipad'));
    }

    public function update(Request $request, Ipad $ipad)
    {
        // Validation may be added here based on your requirements

        $ipad->update($request->all());

        return redirect()->route('ipads.index')->with('success', 'iPad updated successfully');
    }

    public function destroy(Ipad $ipad)
    {
        $ipad->delete();

        return redirect()->route('ipads.index')->with('success', 'iPad deleted successfully');
    }

    public function export($id)
    {
        $ipad = Ipad::find($id);

        if (!$ipad) {
            abort(404); // Or handle the case when the iPad is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Department');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Serial Number');
        $sheet->setCellValue('D1', 'Storage Size');
        $sheet->setCellValue('E1', 'Supplier');
        $sheet->setCellValue('F1', 'PO Number');
        $sheet->setCellValue('G1', 'Invoice Number');
        $sheet->setCellValue('H1', 'Price');
        $sheet->setCellValue('I1', 'Purchase Date');
        $sheet->setCellValue('J1', 'Purchase Date for Account');
        $sheet->setCellValue('K1', 'Warranty');
        $sheet->setCellValue('L1', 'Notes');
        $sheet->setCellValue('M1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        $sheet->getStyle('A1:M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:M2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:M2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('I2:J2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $sheet->getStyle('K2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'M');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond M, and break the loop if true
                if ($column > 'M') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $ipad->department);
        $sheet->setCellValue('B2', $ipad->name);
        $sheet->setCellValue('C2', $ipad->serialnumber);
        $sheet->setCellValue('D2', $ipad->storagesize);
        $sheet->setCellValue('E2', $ipad->supplier);
        $sheet->setCellValue('F2', $ipad->ponumber);
        $sheet->setCellValue('G2', $ipad->invoicenumber);
        $sheet->setCellValue('H2', $ipad->price);
        $sheet->setCellValue('I2', $ipad->purchasedate);
        $sheet->setCellValue('J2', $ipad->purchasedateaccount);
        $sheet->setCellValue('K2', $ipad->warranty);
        $sheet->setCellValue('L2', $ipad->notes);
        $sheet->setCellValue('M2', $ipad->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "ipad_report_{$ipad->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
