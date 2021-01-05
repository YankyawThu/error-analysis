<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Error;
use Inertia\Inertia;

class errorController extends Controller
{
    public $error;

    public function __construct() {
        $this->error = new Error();
    }
    public function addData(Request $req) {
        $messages = [
            'type.required' => '* Please select error type',
            'date.required' => '* Please pick a date',
            'count.numeric' => '* Number only',
            'messages.required' => '* Error detail is empty'
        ];
        Validator::make($req->all(),[
            'type' => 'required',
            'date' => 'required',
            'count' => 'numeric',
            'messages' => 'required',
        ],$messages)->validate();
        $result = $this->error->addData($req);
        return back()->with('success',$result);
    }

    public function showData() {
        $pieChart = $this->error->pieChart();
        $barChart = $this->error->barChart();
        $overallData = $this->error->overallData();
        return Inertia::render('Overview' , ['array' => $pieChart , 'date' => $barChart , 'data' => $overallData]);
    }

    public function detail($type) {
        $result = $this->error->detail($type);
        $date = $this->error->barChart();
        return Inertia::render('DetailError' , ['date' => $date , 'all' => $result]);
    }
}
