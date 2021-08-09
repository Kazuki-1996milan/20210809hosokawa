<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClientRequest;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = DB::select('select * from Todos');
        return view('index', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $validate_rule = [
            'content' => 'required|max:20'
        ];
        $this->validate($request, $validate_rule);

        $param = [
            'content' => $request->content
        ];

        DB::insert('insert into Todos(content) values(:content)', $param);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content
        ];
        DB::update('update Todos set content=:content where id=:id', $param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $param = [
            'id' => $request->id
        ];
        DB::delete('delete from Todos where id=:id', $param);
        return redirect('/');
    }

}
