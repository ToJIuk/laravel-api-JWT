<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordsWebController extends Controller
{
    public function index()
    {
        $records = Record::paginate(9);

        return view('myTest.index', [
            'records' => $records,
        ]);
    }

    public function delete($id)
    {

    }
}
