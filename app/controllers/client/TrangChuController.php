<?php

class TrangChuController extends Controller{
    public $data = [];    
    public $views = ["advertise","advertiseCategory",'productHome'];
    public $models = ["QuangCaoModel"];
    public $model_instances = [];
    
    public function __construct(){
        for($i=0;$i<count($this->models);$i++){
            $this-> model_instances[$i] = $this->model($this-> models[$i]);
        }
    }
    public function index(){
        $title = "Trang Chu";
        $dsqc = $this->model_instances[0]->index();
        $this->data['sub_content']['dsqc'] = $dsqc;
        $this->data['title'] = $title;
        $this->renderClient("layouts/trang_chu_layout",$this->data);
    }
}

?>