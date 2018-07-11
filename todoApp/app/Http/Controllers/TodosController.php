<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
	public function index()
	{
		$todos = Todo::all();
		return view('new')->with('todos', $todos);
	}

	public function store(Request $request)
	{
		$_todo = new Todo;

		$_todo->todo = $request->todo;
		$_todo->save();

		Session::flash('success', 'Your todo was created');
		return redirect()->back();
	}

	public function delete($id)
	{
		$_todo = Todo::find($id);
		$_todo->delete();

		Session::flash('success', 'Your todo was deleted');
		return redirect()->back();
	}

	public function update($id)
	{
		$_todo = Todo::find($id);

		Session::flash('success', 'Your todo was updated');
		return view('update')->with('todo', $_todo);
	}

	public function save(Request $request, $id)
	{

		$_todo = Todo::find($id);
		$_todo->todo = $request->todo;

		$_todo->save();

		Session::flash('success', 'Your todo was created');
		return redirect()->route('todos');
	}

	public function completed($id)
	{
		$_todo = Todo::find($id);
		$_todo->completed = 1;
		$_todo->save();

		Session::flash('success', 'Your todo was marked as readed');
		return redirect()->back();
	}
}
