<?php
    class TrangGioHangController extends Controller{
        public $model_sp;
        public $view = 'clients/shoppingCart';
        public $data=[];
        public function __construct(){
            $this->model_sp = $this->model('GioHangModel');
        }
        
        public function index(){
            
            $title = "Gio Hang"; 
            $h = $this->model_sp->index();
            $this->data["title"] = $title; 
            $this->data['sub_content']["h"] = $h; 
            $this->data['gd'] = $this->view;
            $this->renderClient("layouts/client_layout",$this->data);
        }
    }
?>