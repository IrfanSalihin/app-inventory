<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desktops;
use App\Models\Notebook;
use App\Models\Printer;
use App\Models\smartphone;
use App\Models\Camera;
use App\Models\Ipad;
use App\Models\Voicerecorder;
use App\Models\Projector;
use App\Models\Mycardreader;
use App\Models\Barcodescanner;
use App\Models\Walkietalkie;
use App\Models\Upowersupp;
use App\Models\Harddisk;
use App\Models\Cafeteria;
use App\Models\Other;

class ReserveditemController extends Controller
{
    //
    public function index()
    {
        $desktops = Desktops::where('status', 'Reserved')->get();
        $notebooks = Notebook::where('status', 'Reserved')->get();
        $printers = Printer::where('status', 'Reserved')->get();
        $smartphones = Smartphone::where('status', 'Reserved')->get();
        $cameras = Camera::where('status', 'Reserved')->get();
        $ipads = Ipad::where('status', 'Reserved')->get();
        $voicerecorders = Voicerecorder::where('status', 'Reserved')->get();
        $projectors = Projector::where('status', 'Reserved')->get();
        $mycardreaders = Mycardreader::where('status', 'Reserved')->get();
        $barcodescanners = Barcodescanner::where('status', 'Reserved')->get();
        $walkietalkies = Walkietalkie::where('status', 'Reserved')->get();
        $upowersupps = Upowersupp::where('status', 'Reserved')->get();
        $harddisks = Harddisk::where('status', 'Reserved')->get();
        $cafeterias = Cafeteria::where('status', 'Reserved')->get();
        $others = Other::where('status', 'Reserved')->get();
      

        return view('reserveditems.index', compact('desktops', 'notebooks', 'printers', 'smartphones', 'cameras', 'ipads', 'voicerecorders', 'projectors', 'mycardreaders', 'barcodescanners', 'walkietalkies', 'upowersupps', 'harddisks', 'cafeterias', 'others'));
    }
}
