<?php
    class TrangChuController extends Controller{
        
        public $data=[];
        public $model_home = [];
        public $views = ['advertise','advertiseCategory','productHome','productHome'];// Chua Cac view
        public $models =['QuangCaoModel','QuangCaoLoai','SanPham'];// Chua Cac model
        public $model_instances=[];
        public function __construct() {
            // $this->model_sp = $this->model('SanPham');
            for($i=0;$i<count($this->models);$i++){
                $this->model_instances[$i] = $this->model($this->models[$i]);
            }

            
        }
        
        
        public function test(){
            $title = "Trang Chu"; 
             // Call the vd() method on the first model instance
            $h = [];
            $content = $this->model_instances[0]->testVd();
            for($i=0;$i<count($this->model_instances) ;$i++){
                $h[$i] = $this->model_instances[$i]->vd();
            }
            $this->data["title"] = $title;
            $this->data['sub_content']['h'] = $h;
            $this->data['sub_content']['content'] = $content;
            $this->data['views']=$this->views;
            $this->renderClient("layouts/trang_chu_layout",$this->data);
        }
        public function testHello(){
            $this->views = ['hello'];
            $title = "Trang Chu"; 
             // Call the vd() method on the first model instance
            $h = [];
            $content = $this->model_instances[0]->testVd();
            for($i=0;$i<count($this->model_instances) ;$i++){
                $h[$i] = $this->model_instances[$i]->vd();
            }
            $this->data["title"] = $title;
            $this->data['sub_content']['h'] = $h;
            $this->data['sub_content']['content'] = $content;
            $this->data['views']=$this->views;
            $this->renderClient("layouts/trang_chu_layout",$this->data);
        }
        public function A(){
            $this->testHello();
        }
        
    }

?>