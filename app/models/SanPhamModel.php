<?php
    class SanPhamModel extends Model {
        private $table = 'products';
        public function vd(){
            $data = $this->all();
            return $data;
        }
    	public function index(){
            $data = $this->table('products');
            return $data;
        }
        
        public function docTatCa(){
            $data = $this->all();
            return $data;
        }
        
        public function dsPhanTrang($vtbd){
            $so = ($vtbd)*6;
            
            $data = $this->db->table('products')->select("*")->limit(6,$so)->get();
            return $data;
        }
        
        public function tongSoTrang($dssp){
            
            $soSp = count($dssp);
            return (int)($soSp%6==0?$soSp/6:($soSp/6)+1);
        }
        
        public function loc(){
            
        }
        
        public function danhSachLoai(){
            $dsLoai = $this->db->table('categories')->select("*")->get();
            return $dsLoai;
        }
        public function danhSachThuongHieu(){
            $dsThuongHieu = $this->db->table('brands')->select("*")->get();
            return $dsThuongHieu;
        }
        public function getCategory($category){
            $ds = $this->db->table('products')->select('*')->where(1,"=",1)->andIn("id_category",$category) ; 
            
            $dssp= $ds->get();
            // echo"<pre>";
            // print_r($ds);
            // echo"</pre>";
            return $dssp;
        }
        public function getBrand(){
            
        }
        public function getProductSize(){
            
        }
        public function tableFill() {
            return 'products';
        }
        public function fieldFill(){
            return '*';
        }
        public function primaryKey(){
            return "id";
        }
        public function getFilter($category,$brand,$vtbd){
            $ds = $this->db->table('products')->select('*')->where(1,"=",1);
            if(!empty($category)){
                $ds->andIn("id_category",$category) ; 
            
                
            }
            if(!empty($brand)){
                $ds->andIn("id_brand",$brand);
            }
            $so = ($vtbd)*6;
            $dssp= $ds->limit(6,$so)->get();
            return $dssp;
        }
        public function getFilterAll($category,$brand){
            $ds = $this->db->table('products')->select('*')->where(1,"=",1);
            if(!empty($category)){
                $ds->andIn("id_category",$category) ; 
            
                
            }
            if(!empty($brand)){
                $ds->andIn("id_brand",$brand);
            }
            
            $dssp= $ds->get();
            return $dssp;
        }
        public function search($text){
            
        }
    }
?>