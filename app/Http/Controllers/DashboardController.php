<?php

namespace App\Http\Controllers;

use App\Models\DocumentModel;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = DocumentModel::count();
        $FileSize = DocumentModel::sum('DocumentFileSize');

        if ($FileSize > 1000000000) {
            $FileSize = $FileSize / 1000000000;
            $FileSize = round($FileSize, 2);
            $FileSize = $FileSize . ' GB';
        } else if ($FileSize > 1000000) {
            $FileSize = $FileSize / 1000000;
            $FileSize = round($FileSize, 2);
            $FileSize = $FileSize . ' MB';
        } elseif ($FileSize > 1000) {
            $FileSize = $FileSize / 1000;
            $FileSize = round($FileSize, 2);
            $FileSize = $FileSize . ' KB';
        } else {
            $FileSize = $FileSize . ' Bytes';
        } 
        
        // get free space
        $freeSpace = disk_free_space("/");
        // check if free space is tb
        if ($freeSpace > 1000000000) {
            $freeSpace = $freeSpace / 1000000000;
            $freeSpace = round($freeSpace, 2);
            $freeSpace = $freeSpace . ' TB';
        } else if ($freeSpace > 1000000) {
            $freeSpace = $freeSpace / 1000000;
            $freeSpace = round($freeSpace, 2);
            $freeSpace = $freeSpace . ' GB';
        } elseif ($freeSpace > 1000) {
            $freeSpace = $freeSpace / 1000;
            $freeSpace = round($freeSpace, 2);
            $freeSpace = $freeSpace . ' MB';
        } else {
            $freeSpace = $freeSpace . ' Bytes';
        }

        // prevent reloading the page when the user 
        if (auth()->check()) {
            return view('dashboard')->with('FileCount', $count)->with('FileSize', $FileSize)->with('freeSpace', $freeSpace);
        } else {
            return redirect()->route('login');
        }
    }
}
