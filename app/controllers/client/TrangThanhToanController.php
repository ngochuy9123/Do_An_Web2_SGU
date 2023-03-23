<?php
    class TrangThanhToanController extends Controller{
        public $model;
        public $view = 'clients/bill';
        public $data=[];
        public function __construct(){
            $this->model = $this->model('ThanhToanModel');
        }
        
        public function index(){
            
            $title = "Thanh Toan San Pham"; 
            $h = $this->model->index();
            $this->data["title"] = $title; 
            $this->data['sub_content']["h"] = $h; 
            $this->data['gd'] = $this->view;
            $this->renderClient("layouts/client_layout",$this->data);
        }
    }
?>