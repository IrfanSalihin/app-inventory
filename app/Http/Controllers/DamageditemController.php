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

class DamageditemController extends Controller
{
    //
    public function index()
    {
    $desktops = Desktops::where('status', 'Damage')->get();
    $notebooks = Notebook::where('status', 'Damage')->get();
    $printers = Printer::where('status', 'Damage')->get();
    $smartphones = Smartphone::where('status', 'Damage')->get();
    $cameras = Camera::where('status', 'Damage')->get();
    $ipads = Ipad::where('status', 'Damage')->get();
    $voicerecorders = Voicerecorder::where('status', 'Damage')->get();
    $projectors = Projector::where('status', 'Damage')->get();
    $mycardreaders = Mycardreader::where('status', 'Damage')->get();
    $barcodescanners = Barcodescanner::where('status', 'Damage')->get();
    $walkietalkies = Walkietalkie::where('status', 'Damage')->get();
    $upowersupps = Upowersupp::where('status', 'Damage')->get();
    $harddisks = Harddisk::where('status', 'Damage')->get();
    $cafeterias = Cafeteria::where('status', 'Damage')->get();
    $others = Other::where('status', 'Damage')->get();
  

    return view('damageditems.index', compact('desktops', 'notebooks', 'printers', 'smartphones', 'cameras', 'ipads', 'voicerecorders', 'projectors', 'mycardreaders', 'barcodescanners', 'walkietalkies', 'upowersupps', 'harddisks', 'cafeterias', 'others'));
    }
}
