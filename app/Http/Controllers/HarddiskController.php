<?php

namespace App\Http\Controllers;

use App\Models\Harddisk;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HarddiskController extends Controller
{
    public function index()
    {
        $harddisks = Harddisk::all();
        return view('harddisks.index', compact('harddisks'));
    }

    public function create()
    {
        return view('harddisks.create');
    }

    public function store(Request $request)
    {
        Harddisk::create($request->all());

        return redirect()->route('harddisks.index')->with('success', 'Harddisk created successfully');
    }

    public function show(Harddisk $harddisk)
    {
        return view('harddisks.show', compact('harddisk'));
    }

    public function edit(Harddisk $harddisk)
    {
        return view('harddisks.edit', compact('harddisk'));
    }

    public function update(Request $request, Harddisk $harddisk)
    {
        // Validation may be added here based on your requirements

        $harddisk->update($request->all());

        return redirect()->route('harddisks.index')->with('success', 'Harddisk updated successfully');
    }

    public function destroy(Harddisk $harddisk)
    {
        $harddisk->delete();

        return redirect()->route('harddisks.index')->with('success', 'Harddisk deleted successfully');
    }

    public function export($id)
    {
        $harddisk = Harddisk::find($id);

        if (!$harddisk) {
            abort(404); // Or handle the case when the harddisk is not found
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
        $sheet->setCellValue('G1', 'Storage Size (TB)');
        $sheet->setCellValue('H1', 'Supplier');
        $sheet->setCellValue('I1', 'PO Number');
        $sheet->setCellValue('J1', 'Invoice Number');
        $sheet->setCellValue('K1', 'Price');
        $sheet->setCellValue('L1', 'Purchase Date');
        $sheet->setCellValue('M1', 'Purchase Date Account');
        $sheet->setCellValue('N1', 'Warranty');
        $sheet->setCellValue('O1', 'Notes');
        $sheet->setCellValue('P1', 'Status');

        // ... (rest of the header definitions remain similar)

        // Set headers' font style and background color
        $sheet->getStyle('A1:P1')->getFont()->setBold(true);
        $sheet->getStyle('A1:P1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:P2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:P2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('L2:N2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'Z');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond P, and break the loop if true
                if ($column > 'P') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $harddisk->location);
        $sheet->setCellValue('B2', $harddisk->branches);
        $sheet->setCellValue('C2', $harddisk->department);
        $sheet->setCellValue('D2', $harddisk->staffname);
        $sheet->setCellValue('E2', $harddisk->model);
        $sheet->setCellValue('F2', $harddisk->serialnumber);
        $sheet->setCellValue('G2', $harddisk->storagesize);
        $sheet->setCellValue('H2', $harddisk->supplier);
        $sheet->setCellValue('I2', $harddisk->ponumber);
        $sheet->setCellValue('J2', $harddisk->invoicenumber);
        $sheet->setCellValue('K2', $harddisk->price);
        $sheet->setCellValue('L2', $harddisk->purchasedate); // Format date as needed
        $sheet->setCellValue('M2', $harddisk->purchasedateaccount);
        $sheet->setCellValue('N2', $harddisk->warranty);
        $sheet->setCellValue('O2', $harddisk->notes);
        $sheet->setCellValue('P2', $harddisk->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "harddisk_report_{$harddisk->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

}
