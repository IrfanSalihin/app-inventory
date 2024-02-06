<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::all();
        return view('notebooks.index', compact('notebooks'));
    }

    public function create()
    {
        return view('notebooks.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Notebook::create($request->all());

        return redirect()->route('notebooks.index')->with('success', 'Notebook created successfully');
    }

    public function show(Notebook $notebook)
    {
        return view('notebooks.show', compact('notebook'));
    }

    public function edit(Notebook $notebook)
    {
        return view('notebooks.edit', compact('notebook'));
    }

    public function update(Request $request, Notebook $notebook)
    {
        // Validation may be added here based on your requirements

        $notebook->update($request->all());

        return redirect()->route('notebooks.index')->with('success', 'Notebook updated successfully');
    }

    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return redirect()->route('notebooks.index')->with('success', 'Notebook deleted successfully');
    }

    public function export($id)
    {
        $notebook = Notebook::find($id);

        if (!$notebook) {
            abort(404); // Or handle the case when the notebook is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Staff Name');
        $sheet->setCellValue('B1', 'Staff Number');
        $sheet->setCellValue('C1', 'Location');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'PC Name');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'Charger Model');
        $sheet->setCellValue('H1', 'Charger Serial Number');
        $sheet->setCellValue('I1', 'Power Cable Quantity');
        $sheet->setCellValue('J1', 'Operating System');
        $sheet->setCellValue('K1', 'Windows Product Key');
        $sheet->setCellValue('L1', 'Operating System Bit');
        $sheet->setCellValue('M1', 'Processor');
        $sheet->setCellValue('N1', 'Device ID');
        $sheet->setCellValue('O1', 'Product ID');
        $sheet->setCellValue('P1', 'Storage Drives');
        $sheet->setCellValue('Q1', 'Storage Size');
        $sheet->setCellValue('R1', 'RAM Size');
        $sheet->setCellValue('S1', 'Graphic Card');
        $sheet->setCellValue('T1', 'Microsoft Office Version');
        $sheet->setCellValue('U1', 'Microsoft Office License Key');
        $sheet->setCellValue('V1', 'Microsoft Office Outlook ID');
        $sheet->setCellValue('W1', 'Microsoft Office Outlook Password');
        $sheet->setCellValue('X1', 'Antivirus Present');
        $sheet->setCellValue('Y1', 'Antivirus Expired Date');
        $sheet->setCellValue('Z1', 'Antivirus License Key');
        $sheet->setCellValue('AA1', 'Antivirus Purchasing Date');
        $sheet->setCellValue('AB1', 'Antivirus Renewal Price (RM)');
        $sheet->setCellValue('AC1', 'Warranty');
        $sheet->setCellValue('AD1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:AD1')->getFont()->setBold(true);
        $sheet->getStyle('A1:AD1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:AD2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:AD2')->getFont()->setBold(false);

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
        $sheet->setCellValue('A2', $notebook->staff_name);
        $sheet->setCellValue('B2', $notebook->staff_number);
        $sheet->setCellValue('C2', $notebook->location);
        $sheet->setCellValue('D2', $notebook->notebook_details_model);
        $sheet->setCellValue('E2', $notebook->notebook_details_pc_name);
        $sheet->setCellValue('F2', $notebook->notebook_details_serial_number);
        $sheet->setCellValue('G2', $notebook->charger_model);
        $sheet->setCellValue('H2', $notebook->charger_serial_number);
        $sheet->setCellValue('I2', $notebook->power_cable_quantity);
        $sheet->setCellValue('J2', $notebook->operating_system);
        $sheet->setCellValue('K2', $notebook->windows_product_key);
        $sheet->setCellValue('L2', $notebook->operating_system_bit);
        $sheet->setCellValue('M2', $notebook->processor);
        $sheet->setCellValue('N2', $notebook->device_id);
        $sheet->setCellValue('O2', $notebook->product_id);
        $sheet->setCellValue('P2', $notebook->storage_drives);
        $sheet->setCellValue('Q2', $notebook->storage_size);
        $sheet->setCellValue('R2', $notebook->ram_size);
        $sheet->setCellValue('S2', $notebook->graphic_card);
        $sheet->setCellValue('T2', $notebook->microsoft_office_version);
        $sheet->setCellValue('U2', $notebook->microsoft_office_license_key);
        $sheet->setCellValue('V2', $notebook->microsoft_office_outlook_id);
        $sheet->setCellValue('W2', $notebook->microsoft_office_outlook_password);
        $sheet->setCellValue('X2', $notebook->antivirus_present ? 'Yes' : 'No');
        $sheet->setCellValue('Y2', $notebook->antivirus_expired_date);
        $sheet->setCellValue('Z2', $notebook->antivirus_license_key);
        $sheet->setCellValue('AA2', $notebook->antivirus_purchasing_date);
        $sheet->setCellValue('AB2', $notebook->antivirus_renewal_price);
        $sheet->setCellValue('AC2', $notebook->notebook_warranty);
        $sheet->setCellValue('AD2', $notebook->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "notebook_report_{$notebook->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}

