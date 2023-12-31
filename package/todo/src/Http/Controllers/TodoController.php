<?php

namespace Deepak0023\Todo\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Deepak0023\Todo\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        return view('todo::todo');
    }

    public function create(Request $request) {
        // dd($request->all());
        Todo::create($request->all());
        return redirect('todo');
    }
}
