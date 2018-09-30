<?php

namespace App\Http\Controllers;

use App\CarData;
use Illuminate\Http\Request;

class DisplayDataController extends Controller
{
    const DISPLAY_PER_PAGE = 50;
    //
    public function display()
    {
        $list = CarData::paginate(self::DISPLAY_PER_PAGE);

        return view('display', compact('list'));
    }
}
