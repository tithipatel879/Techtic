<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeOccupied;

class EmployeeController extends Controller
{
    public function index(){
    	return view('employee');
    }

    public function checkAvailablity(Request $request)
    {
    	$model = new EmployeeOccupied();
    	$result = $model->checkEmployeeAvailability($request);
    	return view('result', ['result' => $result]);
    }
}
