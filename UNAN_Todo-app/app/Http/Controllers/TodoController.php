<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('home', compact('todos'));
    }
    public function store(Request $request) {
        $data = json_decode($request->getContent(),true);
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->status = $data['status'];
        $todo->priority = $data['priority'];
        $todo->date_f = $data['date_f'];
        $todo->save();
        return response()->json(['message' => 'Todo create successfully!'], 200);
    }
    public function edit($id) {
        $todo = Todo::find($id);
        return view('edit', compact('todo'));
    }
    public function update(Request $request) {
        $data = json_decode($request->getContent(),true);
        $todo = Todo::find($data['id']);
        $todo->name = $data['name'];
        $todo->status = $data['status'];
        $todo->priority = $data['priority'];
        $todo->date_f = $data['date_f'];
        $todo->save();
        return response()->json(['message' => 'Todo updated successfully!'], 200);    
    }
    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();   
        return $this->index();
    }
    public function check($id) {
        $todo = Todo::find($id);
        if ($todo->status === "done") {
            $todo->status = "pending";   
        } else {
            $todo->status = "done";
        }
        $todo->save();   
        return $this->index();
    }
}
