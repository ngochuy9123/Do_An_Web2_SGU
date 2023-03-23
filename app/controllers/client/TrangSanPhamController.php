<?php
    class TrangSanPhamController extends Controller{
        public $model_sp;
        public $view = 'clients/shop';
        public $data=[];
        public function __construct(){
            $this->model_sp = $this->model('SanPhamModel');
            $dsLoai = $this->model_sp->danhSachLoai();
            $dsThuongHieu = $this->model_sp->danhSachThuongHieu();
            $this->data['sub_content']['dsLoai'] = $dsLoai;
            $this->data['sub_content']['dsThuongHieu'] = $dsThuongHieu;
        }
        
        public function index(){
            
            $vtt = 0;
            if(isset($_GET["vtt"])){
                $vtt = $_GET["vtt"];
            }
            
            
            $title = "Trang San Pham"; 
            $h = $this->model_sp->dsPhanTrang($vtt);
            $dssp = $this->model_sp->docTatCa();
            $tongSoTrang = $this->model_sp->tongSoTrang($dssp);
            $this->data["title"] = $title; 
            $this->data['sub_content']["dssp"] = $h; 
            $this->data['sub_content']["tst"] = $tongSoTrang; 
            $this->data['gd'] = $this->view;
            $this->renderClient("layouts/client_layout",$this->data);
        }
        
        public function ajaxPhanTrang(){
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $vtt = $_POST["vtt"];
                $dssp = $this->model_sp->dsPhanTrang($vtt);
                
                $result = json_encode($dssp);
                echo $result;
            }
            
        }
          
        
        //Loc ajax will call getFilter in SanPhamModel to get data
        
        public function filter(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = json_decode(file_get_contents('php://input'), true);
                $category = $data['category'];
                $brand = $data['brand'];
                $vtt =0;
                if(isset($data['trang'])){
                    $vtt = $data['trang'];
                }
                
                
                $ds = $this->model_sp->getFilter($category,$brand,$vtt);
                $dssp  =$this->model_sp->getFilterAll($category,$brand);
                $soTrang = $this->model_sp->tongSoTrang($dssp);
                // Encode both arrays as a JSON object
                $data = array(
                    'ds' => $ds,
                    'soTrang' => $soTrang
                );
                $data = json_encode($data);

                // Output the JSON object
                echo $data;
                
            }
            
            
            
        }  
        
        // public function loc($dssp, $ds, $l) {
        //     $result = array();
        //     for ($i = 0; $i < count($ds); $i++) {
        //         $t = $ds[$i];
        //         $filtered_products = array_filter($dssp, function($dssp_item) use ($t, $l) {
        //             return $dssp_item[$l] === intval($t);
        //         });
        //         $result = array_merge($result, $filtered_products);
        //     }
        //     return $result;
        // }
        
        // public function xoaTrung($dssp){
        //     $temp = array();
            
        //     foreach($dssp as $sp ){
        //         if( in_array($sp['id'],$temp)){
        //             unset($dssp[$sp]);
        //         }
        //         else{
        //             array_push($temp,$sp['id']);
        //         }
        //     }
        //     return $dssp;
        // }
            
    }
        
        
    
    
    

?>