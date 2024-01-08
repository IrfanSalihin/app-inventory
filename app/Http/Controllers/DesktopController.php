<?php

namespace App\Http\Controllers;

use App\Models\Desktops; 
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DesktopController extends Controller
{
    public function index()
    {
        $desktops = Desktops::all();
        return view('desktops.index', compact('desktops'));
    }

    public function create()
    {
        return view('desktops.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Desktops::create($request->all());

        return redirect()->route('desktops.index')->with('success', 'Desktop created successfully');
    }

    public function show(Desktops $desktop)
    {
        return view('desktops.show', compact('desktop'));
    }

    public function edit(Desktops $desktop)
    {
        return view('desktops.edit', compact('desktop'));
    }

    public function update(Request $request, Desktops $desktop)
    {
        // Validation may be added here based on your requirements

        $desktop->update($request->all());

        return redirect()->route('desktops.index')->with('success', 'Desktop updated successfully');
    }

    public function destroy(Desktops $desktop)
    {
        $desktop->delete();

        return redirect()->route('desktops.index')->with('success', 'Desktop deleted successfully');
    }

    public function export($id)
    {
        $desktop = Desktops::find($id);

        if (!$desktop) {
            abort(404); // Or handle the case when the desktop is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Staff Name');
        $sheet->setCellValue('B1', 'Location');
        $sheet->setCellValue('C1', 'Staff Number');
        $sheet->setCellValue('D1', 'CPU Model');
        $sheet->setCellValue('E1', 'CPU Name');
        $sheet->setCellValue('F1', 'CPU Serial Number');
        $sheet->setCellValue('G1', 'Monitor Model');
        $sheet->setCellValue('H1', 'Monitor Serial Number');
        $sheet->setCellValue('I1', 'Keyboard');
        $sheet->setCellValue('J1', 'Mouse');
        $sheet->setCellValue('K1', 'PC Cable');
        $sheet->setCellValue('L1', 'VGA Cable');
        $sheet->setCellValue('M1', 'Operating System Name');
        $sheet->setCellValue('N1', 'Windows Product Key');
        $sheet->setCellValue('O1', 'Operating System bit');
        $sheet->setCellValue('P1', 'Processor');
        $sheet->setCellValue('Q1', 'Device ID');
        $sheet->setCellValue('R1', 'Product ID');
        $sheet->setCellValue('S1', 'HDD Sizes');
        $sheet->setCellValue('T1', 'SSD Sizes');
        $sheet->setCellValue('U1', 'RAM Sizes');
        $sheet->setCellValue('V1', 'Microsoft Office Year');
        $sheet->setCellValue('W1', 'Microsoft Office Lisence');
        $sheet->setCellValue('X1', 'Microsoft Office Last 5 Digit');
        $sheet->setCellValue('Y1', 'Microsoft Office ID');
        $sheet->setCellValue('Z1', 'Microsoft Office Password');
        $sheet->setCellValue('AA1', 'Antivirus');
        $sheet->setCellValue('AB1', 'Antivirus Expired Date');
        $sheet->setCellValue('AC1', 'Antivirus Lisence');
        $sheet->setCellValue('AD1', 'Year');
        $sheet->setCellValue('AE1', 'Account Purchase Date');
        $sheet->setCellValue('AF1', 'Price');
        $sheet->setCellValue('AG1', 'Status');
        // Add other headers based on your schema

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

        // ... (rest of the header definitions remain similar)

        // Add data
        $sheet->setCellValue('A2', $desktop->staff_name);
        $sheet->setCellValue('B2', $desktop->location);
        $sheet->setCellValue('C2', $desktop->staff_number);
        $sheet->setCellValue('D2', $desktop->cpu_model);
        $sheet->setCellValue('E2', $desktop->cpu_name);
        $sheet->setCellValue('F2', $desktop->cpu_serial_number);
        $sheet->setCellValue('G2', $desktop->monitor_model);
        $sheet->setCellValue('H2', $desktop->monitor_serial_number);
        $sheet->setCellValue('I2', $desktop->keyboard);
        $sheet->setCellValue('J2', $desktop->mouse);
        $sheet->setCellValue('K2', $desktop->pc_cable);
        $sheet->setCellValue('L2', $desktop->vga_cable);
        $sheet->setCellValue('M2', $desktop->operating_system_name);
        $sheet->setCellValue('N2', $desktop->windows_product_key);
        $sheet->setCellValue('O2', $desktop->operating_system_bit);
        $sheet->setCellValue('P2', $desktop->processor);
        $sheet->setCellValue('Q2', $desktop->device_id);
        $sheet->setCellValue('R2', $desktop->product_id);
        $sheet->setCellValue('S2', $desktop->hdd_sizes);
        $sheet->setCellValue('T2', $desktop->ssd_sizes);
        $sheet->setCellValue('U2', $desktop->ram_sizes);
        $sheet->setCellValue('V2', $desktop->microsoft_office_year);
        $sheet->setCellValue('W2', $desktop->microsoft_office_lisence);
        $sheet->setCellValue('X2', $desktop->microsoft_office_last_5_digit);
        $sheet->setCellValue('Y2', $desktop->microsoft_office_id);
        $sheet->setCellValue('Z2', $desktop->microsoft_office_password);
        $sheet->setCellValue('AA2', $desktop->antivirus ? 'Yes' : 'No');
        $sheet->setCellValue('AB2', $desktop->antivirus_expired_date);
        $sheet->setCellValue('AC2', $desktop->antivirus_lisence);
        $sheet->setCellValue('AD2', $desktop->year);
        $sheet->setCellValue('AE2', $desktop->account_purchase_date);
        $sheet->setCellValue('AF2', $desktop->price);
        $sheet->setCellValue('AF2', $desktop->price);
        $sheet->setCellValue('AF3', $desktop->status);
        // Add other data fields based on your schema

        // ... (rest of the data population remains similar)

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "desktop_report_{$desktop->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
