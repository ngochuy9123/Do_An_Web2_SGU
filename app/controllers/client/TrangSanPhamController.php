<?php
    class TrangSanPhamController extends Controller{
        public $model_sp;
        public $view = 'clients/shop';
        public $data=[];
        public function __construct(){
            $this->model_sp = $this->model('SanPhamModel');
            $dsLoai = $this->model_sp->danhSachLoai();
            $dsThuongHieu = $this->model_sp->danhSachThuongHieu();
            $dsSize = $this->model_sp->getSize();
            $this->data['sub_content']['dsLoai'] = $this->model_sp->categories;
            $this->data['sub_content']['dsThuongHieu'] = $this->model_sp->brands;
            $this->data['sub_content']['dsSize'] = $this->model_sp->sizes;
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
                $size = $data['size'];
                $vtt =0;
                if(isset($data['trang'])){
                    $vtt = $data['trang'];
                }
                $text = "";
                if(isset($data['text'])){
                    $text = $data['text'];
                }
                $this->model_sp->category = $category;
                $this->model_sp->brand = $brand;
                $this->model_sp->size = $size;   
                $ds = $this->model_sp->filter($text,$vtt);
                // $dssp  =$this->model_sp->getFilterAll();
                $soTrang = $this->model_sp->tongSoTrang($this->model_sp->dsspFull);
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
        
       
        public function search(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = json_decode(file_get_contents('php://input'), true);
                $category = $data['category'];
                $brand = $data['brand'];
                $size = $data['size'];
                $text = '';
                $vtt =0;
                if(isset($data['trang'])){
                    $vtt = $data['trang'];
                }
                
                $this->model_sp->category = $category;
                $this->model_sp->brand = $brand;
                $this->model_sp->size = $size;
                $this->model_sp->search($text,$vtt);
                
                $soTrang = $this->model_sp->tongSoTrang($this->model_sp->dsspFull);
                // Encode both arrays as a JSON object
                $data = array(
                    'ds' => $this->model_sp->dssp,
                    'soTrang' => $soTrang
                );
                $data = json_encode($data);

                // Output the JSON object
                echo $data;
                
            }
        }
        
    }
        
        
    
    
    

?>