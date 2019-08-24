<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Message\FailMessage;
use App\Http\Controllers\Message\SuccessMessage;
use App\Http\Requests\TodoListRequest;
use App\TodoList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use PhpParser\Error;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->successMessage = new SuccessMessage();
        $this->failedMessage = new FailMessage();
    }

    public function view(){
        $todolist = TodoList::orderBy('priority_level', 'asc')->get();
        return view('home', compact('todolist'));
    }

    public function store(TodoListRequest $request){
        try{
            $todoList = new TodoList();
            $todoList->name = $request->get('name');
            $todoList->type = $request->get('type');
            $todoList->status = $request->get('status');
            $todoList->save();
            Flash::success($this->successMessage->todoCreateSuccess);
            return back();
        }catch (Error $e){
            Flash::error($this->failedMessage->todoCreateFiled);
            return back()->withInput();
        }

    }
    public function modify(Request $request){
      return $request;
    }
    public function delete(Request $request){
      return $request;
    }
    public function todoListUpdate(Request $request){
        try{
            if(isset($request->all()['dataState'])){
                $data = $request->all()['dataState'];

                $table = 'todolist';

                $ids = [];
                $cases = [];

                foreach ($data as $id => $value) {

                    $id = (int) $value['id'];
                    $cases[] = "WHEN {$id} then ?";
                    $params[] = $value['status'];
                    $ids[] = $id;
                }

                $ids = implode(',', $ids);
                $cases = implode(' ', $cases);
                //]$params[] = Carbon::now();

                DB::update("UPDATE `{$table}` SET `status` = CASE `id` {$cases} END WHERE `id` in ({$ids})", $params);

            }

            if(isset($request->all()['dataPosition'])){
                $data = $request->all()['dataPosition'];

                $table = 'todolist';

                $ids = [];
                $cases = [];


                foreach ($data as $id => $value) {

                    $id = (int) $value['id'];

                    $cases[] = "WHEN {$id} then ?";
                    $params[] = $value['position'];

                    $ids[] = $id;
                }

                $ids = implode(',', $ids);
                $cases = implode(' ', $cases);
                //$params[] = Carbon::now();

                DB::update("UPDATE `{$table}` SET `priority_level` =  CASE `id` {$cases} END  WHERE `id` in ({$ids})", $params);
                Flash::success($this->successMessage->todoListUpdateSuccess);
                return json_encode(['status'=>1]);
            }
        }catch(Error $e){
            Flash::error($this->failedMessage->todoCreateFiled);
            return json_encode(['status'=>1]);
        }


    }

}
