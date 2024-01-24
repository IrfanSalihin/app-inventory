<?php

namespace App\Http\Controllers;

use App\Models\Projector;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProjectorController extends Controller
{
    public function index()
    {
        $projectors = Projector::all();
        return view('projectors.index', compact('projectors'));
    }

    public function create()
    {
        return view('projectors.create');
    }

    public function store(Request $request)
    {
        Projector::create($request->all());

        return redirect()->route('projectors.index')->with('success', 'Projector created successfully');
    }

    public function show(Projector $projector)
    {
        return view('projectors.show', compact('projector'));
    }

    public function edit(Projector $projector)
    {
        return view('projectors.edit', compact('projector'));
    }

    public function update(Request $request, Projector $projector)
    {
        // Validation may be added here based on your requirements

        $projector->update($request->all());

        return redirect()->route('projectors.index')->with('success', 'Projector updated successfully');
    }

    public function destroy(Projector $projector)
    {
        $projector->delete();

        return redirect()->route('projectors.index')->with('success', 'Projector deleted successfully');
    }

    public function export($id)
    {
        $projector = Projector::find($id);

        if (!$projector) {
            abort(404); // Or handle the case when the projector is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Place');
        $sheet->setCellValue('C1', 'Level');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'Model Number');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'PWD');
        $sheet->setCellValue('H1', 'SNID');
        $sheet->setCellValue('I1', 'Supplier');
        $sheet->setCellValue('J1', 'PO Number');
        $sheet->setCellValue('K1', 'Invoice Number');
        $sheet->setCellValue('L1', 'Price');
        $sheet->setCellValue('M1', 'Purchase Date');
        $sheet->setCellValue('N1', 'Purchase Date Account');
        $sheet->setCellValue('O1', 'Warranty');
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
        $sheet->getStyle('M2:N2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

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
        $sheet->setCellValue('A2', $projector->location);
        $sheet->setCellValue('B2', $projector->place);
        $sheet->setCellValue('C2', $projector->level);
        $sheet->setCellValue('D2', $projector->model);
        $sheet->setCellValue('E2', $projector->modelnumber);
        $sheet->setCellValue('F2', $projector->serialnumber);
        $sheet->setCellValue('G2', $projector->pwd);
        $sheet->setCellValue('H2', $projector->snid);
        $sheet->setCellValue('I2', $projector->supplier);
        $sheet->setCellValue('J2', $projector->ponumber);
        $sheet->setCellValue('K2', $projector->invoicenumber);
        $sheet->setCellValue('L2', $projector->price);
        $sheet->setCellValue('M2', $projector->purchasedate); // Format date as needed
        $sheet->setCellValue('N2', $projector->purchasedateaccount);
        $sheet->setCellValue('O2', $projector->warranty);
        $sheet->setCellValue('P2', $projector->status);

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "projector_report_{$projector->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
