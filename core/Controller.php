<?php
    class Controller{
        public function model($model){
            if(file_exists(_DIR_ROOT."/app/models/".$model.".php")){
                require_once(_DIR_ROOT."/app/models/".$model.".php");
                if(class_exists($model)){
                    $model = new $model();
                    return $model;
                }
                
            }
            return false;
            
        }
        public function renderClient($view,$data=[]){
            extract($data);
            if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
                // echo _DIR_ROOT.'/app/views/'.$view.'.php </br>';
                require_once _DIR_ROOT.'/app/views/'.$view.'.php';
            }
        }
    }

?>