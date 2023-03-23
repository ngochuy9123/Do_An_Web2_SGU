<?php
    class Home extends Controller {
        public $model_home;
        public $data=[];
        public function __construct(){
            $this->model_home = $this->model('HomeModel');
        }
        public function index(){
            // $data = $this->model_home->getList();
            echo 'Trang Chu';
        }
        public function test(){
            $h = $this->model_home->test();
            $title = "huynha"; 
            $this->data['sub_content']['hehe'] = [
                "hello","hi"
            ] ;
            $this->data['sub_content']["tieuDe"] = $title; 
            $this->renderClient("layouts/client_layout",$this->data);
        }
        
    }
?>