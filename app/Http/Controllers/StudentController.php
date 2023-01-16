<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class StudentController extends Controller
{
    //

    public function index()
    {
        return view('students.index');
    }

    public function register()
    {

        return view('students.register');

    }

    public function show($id)
    {
        return view('students.edit',compact('id'));

    }

    public function delete($id)
    {
        return view('students.delete',compact('id'));

    }

}
