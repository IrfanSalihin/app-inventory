<?php

namespace App\Http\Controllers;

use App\Models\Walkietalkie;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WalkietalkieController extends Controller
{
    public function index()
    {
        $walkietalkies = Walkietalkie::all();
        return view('walkietalkies.index', compact('walkietalkies'));
    }


    public function create()
    {
        return view('walkietalkies.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Walkietalkie::create($request->all());

        return redirect()->route('walkietalkies.index')->with('success', 'Walkietalkie created successfully');
    }

    public function show($id)
    {
        $d['walkietalkie'] = Walkietalkie::where('id',$id)->first();
    //    dd( $d['walkietalkie'] );
        return view('walkietalkies.show',$d);
    }

    public function edit($id)
    {
        $d['walkietalkie'] = Walkietalkie::where('id',$id)->first();
        return view('walkietalkies.edit', $d);
    }
    

    public function update(Request $request)
    {
        
        $id=$request->input('id');
        $validate = $request->validate([
            'location' => 'required',
            'item' => 'required',
            'model' => 'required',
            'serialnumber' => 'required',
            'ponumber' => 'required',
            'invoicenumber' => 'required',
            'price' => 'required',
            'purchasedate' => 'required',
            'purchasedateaccount' => 'required',
            'warranty' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);
        $test = Walkietalkie::find($id);
 
        $test->update([
            "location" =>  $validate['location'],
            "item" =>  $validate['item'],
            "model" =>  $validate['model'],
            "serialnumber" =>  $validate['serialnumber'],
            "ponumber" =>  $validate['ponumber'],
            "invoicenumber" =>  $validate['invoicenumber'],
            "price" =>  $validate['price'],
            "purchasedate" =>  $validate['purchasedate'],
            "purchasedateaccount" =>  $validate['purchasedateaccount'],
            "warranty" =>  $validate['warranty'],
            "notes" =>  $validate['notes'],
            "status" => $validate['status'],   
        ]);

        // Validation may be added here based on your requirements
        return redirect()->route('walkietalkies.index')->with('success', 'Walkietalkie updated successfully');
    }

    public function destroy($id)
    {
        $walkietalkie = Walkietalkie::find($id);
        $walkietalkie->delete();
  

        return redirect()->route('walkietalkies.index')->with('success', 'Walkietalkie deleted successfully');
    }

    public function export($id)
    {
        $walkietalkie = Walkietalkie::find($id);

        if (!$walkietalkie) {
            abort(404); // Or handle the case when the Walkietalkie is not found
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Location');
        $sheet->setCellValue('B1', 'Item');
        $sheet->setCellValue('C1', 'Model');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'PO Number');
        $sheet->setCellValue('F1', 'Invoice Number');
        $sheet->setCellValue('G1', 'Price');
        $sheet->setCellValue('H1', 'Purchase Date');
        $sheet->setCellValue('I1', 'Purchase Date for Account');
        $sheet->setCellValue('J1', 'Warranty');
        $sheet->setCellValue('K1', 'Notes');
        $sheet->setCellValue('L1', 'Status');

        // Set headers' font style and background color
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');

        // Apply borders to the entire table
        $sheet->getStyle('A1:L2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Set data font style
        $sheet->getStyle('A2:L2')->getFont()->setBold(false);

        // Format date cells (assuming they are DateTime objects)
        $sheet->getStyle('H2:I2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $sheet->getStyle('J2')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

        $columnWidth = 30;

        $columnLetters = range('A', 'L');

        // Iterate over single-letter columns
        foreach ($columnLetters as $firstLetter) {
            $sheet->getColumnDimension($firstLetter)->setWidth($columnWidth);

            // Iterate over second-letter columns
            foreach ($columnLetters as $secondLetter) {
                $column = $firstLetter . $secondLetter;

                // Check if the current column is beyond L, and break the loop if true
                if ($column > 'L') {
                    break;
                }

                $sheet->getColumnDimension($column)->setWidth($columnWidth);
            }
        }

        // Add data
        $sheet->setCellValue('A2', $walkietalkie->location);
        $sheet->setCellValue('B2', $walkietalkie->item);
        $sheet->setCellValue('C2', $walkietalkie->model);
        $sheet->setCellValue('D2', $walkietalkie->serialnumber);
        $sheet->setCellValue('E2', $walkietalkie->ponumber);
        $sheet->setCellValue('F2', $walkietalkie->invoicenumber);
        $sheet->setCellValue('G2', $walkietalkie->price);
        $sheet->setCellValue('H2', $walkietalkie->purchasedate);
        $sheet->setCellValue('I2', $walkietalkie->purchasedateaccount);
        $sheet->setCellValue('J2', $walkietalkie->warranty);
        $sheet->setCellValue('K2', $walkietalkie->notes);
        $sheet->setCellValue('L2', $walkietalkie->status);

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = "walkietalkie_report_{$walkietalkie->id}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
