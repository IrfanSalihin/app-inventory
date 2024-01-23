<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CameraController extends Controller
{
    public function index()
    {
        $cameras = Camera::all();
        return view('cameras.index', compact('cameras'));
    }

    public function create()
    {
        return view('cameras.create');
    }

    public function store(Request $request)
    {
        Camera::create($request->all());

        return redirect()->route('cameras.index')->with('success', 'Camera created successfully');
    }

    public function show(Camera $camera)
    {
        return view('cameras.show', compact('camera'));
    }

    public function edit(Camera $camera)
    {
        return view('cameras.edit', compact('camera'));
    }

    public function update(Request $request, Camera $camera)
    {
        // Validation may be added here based on your requirements

        $camera->update($request->all());

        return redirect()->route('cameras.index')->with('success', 'Camera updated successfully');
    }

    public function destroy(Camera $camera)
    {
        $camera->delete();

        return redirect()->route('cameras.index')->with('success', 'Camera deleted successfully');
    }
    public function export($id)
    {
        $camera = Camera::find($id);

        if (!$camera) {
            abort(404); // Or handle the case when the camera is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Level');
        $sheet->setCellValue('C1', 'Staff Name');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'Model Type');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'Supplier');
        $sheet->setCellValue('H1', 'PO Number');
        $sheet->setCellValue('I1', 'Invoice Number');
        $sheet->setCellValue('J1', 'Price');
        $sheet->setCellValue('K1', 'Purchase Date');
        $sheet->setCellValue('L1', 'Purchase Date (Account)');
        $sheet->setCellValue('M1', 'Warranty');
        $sheet->setCellValue('N1', 'Status');

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
        $sheet->setCellValue('A2', $camera->location);
        $sheet->setCellValue('B2', $camera->level);
        $sheet->setCellValue('C2', $camera->staffname);
        $sheet->setCellValue('D2', $camera->model);
        $sheet->setCellValue('E2', $camera->modeltype);
        $sheet->setCellValue('F2', $camera->serialnumber);
        $sheet->setCellValue('G2', $camera->supplier);
        $sheet->setCellValue('H2', $camera->ponumber);
        $sheet->setCellValue('I2', $camera->invoicenumber);
        $sheet->setCellValue('J2', $camera->price);
        $sheet->setCellValue('K2', $camera->purchasedate);
        $sheet->setCellValue('L2', $camera->purchasedateaccount);
        $sheet->setCellValue('M2', $camera->warranty);
        $sheet->setCellValue('N2', $camera->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "camera_report_{$camera->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
