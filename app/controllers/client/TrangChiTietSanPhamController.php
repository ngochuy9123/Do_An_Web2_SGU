<?php
    class TrangChiTietSanPhamController extends Controller{
        public $model;
        public $view = 'clients/detailProduct';
        public $data=[];
        public function __construct(){
            $this->model = $this->model('ChiTietSanPhamModel');
        }
        
        public function index(){
            $id =1;
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            $title = "Chi Tiet San Pham"; 
            $h = $this->model->timSanPhamTheoId($id);
            $this->data["title"] = $title; 
            $this->data['sub_content']["h"] = $h; 
            $this->data['gd'] = $this->view;
            $this->renderClient("layouts/client_layout",$this->data);
        }
        
    }
    
?>