<?php
namespace application\controllers;

class TodoController extends Controller{
    public function main(){
        return "index.html";
    }

    public function index(){
        switch(getMethod()){
            case _GET:
                $list = $this->model->selTodolist();
                return $list;
            case _POST:
                // $todo = $_POST["todo"];
                // $param=["todo"=> $todo];
                // return [_RESULT => $this->model->insTodo($param)];
                $json = getJson();
                return [_RESULT => $this->model->insTodo($json)];
            case _DELETE:
                // $json = getJson();
                // $param =["itodo"=> $json["itodo"]];
                // return [_RESULT => $this->model->delTodo($param)];
                $urlPath = getUrlPaths();
                $param =["itodo" => 0];
                if(isset($urlPath[2])){
                    $param["itodo"] =intval($urlPath[2]);
                }

                return [_RESULT => $this->model->delTodo($param)];
        }
    }
}

// (delete) todo/index
// (delete)