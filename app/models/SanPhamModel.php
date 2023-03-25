<?php
    class SanPhamModel extends Model {
        private $table = 'products';
        public $categories = null;
        public $brands = null;
        public $sizes = null;
        public $category = null;
        public $brand = null;
        public $soSPMoiTrang = 6;
        public $size = null;
        public $dsspFull = null;// Là danh sách tất cả sản phẩm dùng để xác định số trang
        public $dssp = null;//Là danh sách sản phẩm được phân theo trang
        
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
        
        //Hàm dsPhanTrang dùng để phân trang toàn bộ sản phẩm 
        public function dsPhanTrang($vtbd){
            $so = ($vtbd)*$this->soSPMoiTrang;
            
            $data = $this->db->table('products')->select("*")->limit($this->soSPMoiTrang,$so)->get();
            return $data;
        }
        
        public function tongSoTrang($dssp){
            $soSp = count($dssp);
            //Trả về số trang nếu chia kh hết thì cộng thêm 1 vd 13/6
            return (int)($soSp%$this->soSPMoiTrang==0?$soSp/$this->soSPMoiTrang:($soSp/$this->soSPMoiTrang)+1);
        }
        
        public function danhSachLoai(){
            $dsLoai = $this->db->table('categories')->select("*")->get();
            $this->categories = $dsLoai;
            return $this;
        }
        public function danhSachThuongHieu(){
            $dsThuongHieu = $this->db->table('brands')->select("*")->get();
            $this->brands = $dsThuongHieu;
            return $this;
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
        // public function getFilter($category,$brand,$vtbd){
        //     //Câu lênh sql này sẽ nối với bảng product_size để lấy nhg sản phẩm có số lượng lớn hơn 0 và group by id để in ra đúng 1 sản phẩm
        //     $ds = $this->db->table('products')->select('*')->where(1,"=",1)->join("products_size","id=id_product")
        //     ->where("quantity",">",0)->groupBy("id");
        //     if(!empty($this->category)){
        //         $ds->andIn("id_category",$this->category) ; 
        //     }
        //     if(!empty($this->brand)){
        //         $ds->andIn("id_brand",$this->brand);
        //     }
        //     if(!empty($this->size)){
        //         $ds->andIn("id_size",$this->size);
        //     }
        //     $so = ($vtbd)*$this->soSPMoiTrang;
        //     $dssp= $ds->limit($this->soSPMoiTrang,$so)->getNotReset();//Lấy giới hạn 6 sản phẩm cho mỗi trang
        //     $this->dsspFull=$ds->get();
        //     return $dssp;
        // }
        
        public function getSize(){
            //Câu lệnh này sẽ nối đến bảng size để lấy tất cả các size về
            $ds = $this->db->table("sizes")->select('*')->get();
            $this->sizes = $ds;
            return $this;
        }
        
        // public function search($text,$vtbd){
        //     // Co loi o day
        //     $ds = $this->db->table('products')->select("*")->join("categories","products.id_category=categories.id")
        //     ->join("brands","products.id_brand=brands.id")->customWhereOr("( name LIKE '%$text%' OR  name_category LIKE '%$text%' OR  name_brand LIKE '%$text%' )");
        //     if(!empty($this->category)){
        //         $ds->andIn("id_category",$this->category);
        //     }
        //     if(!empty($this->brand)){
        //         $ds->andIn("id_brand",$this->brand);
        //     }
        //     if(!empty($this->size)){
        //         $ds->andIn("id_size",$this->size);
        //     }
        //     $so = ($vtbd)*$this->soSPMoiTrang;
            
            
        //     //vì có resetQuery nên làm xong 1 lần là bị mất hết dữ liệu
            
        //     $this->dsspFull = $ds->getNotReset();
        //     $this->dssp = $ds->limit($this->soSPMoiTrang,$so)->getNotReset();
        //     $this->resetQuery();
            
        //     return $this;
        // }
        
        public function filter($text,$vtbd,$priceMin,$priceMax){
            //Câu lênh sql này sẽ nối với bảng product_size để lấy nhg sản phẩm có số lượng lớn hơn 0 và group by id để in ra đúng 1 sản phẩm
            $ds = $this->db->table('products')->select('*')->where(1,"=",1)->join("products_size","id=id_product")
            ->join("categories","products.id_category=categories.id")->join("brands","products.id_brand=brands.id")
            
            ->where("quantity",">",0)->where("products.price",">",$priceMin)->where("products.price","<",$priceMax)->groupBy("products.id");
            if($text!=""){
                $ds=$ds->customWhereAnd("( name LIKE '%$text%' OR  name_category LIKE '%$text%' OR  name_brand LIKE '%$text%' )");
            }
            if(!empty($this->category)){
                $ds->andIn("id_category",$this->category); 
            }
            if(!empty($this->brand)){
                $ds->andIn("id_brand",$this->brand);
            }
            if(!empty($this->size)){
                $ds->andIn("id_size",$this->size);
            }
            $so = ($vtbd)*$this->soSPMoiTrang;
            $this->dsspFull=$ds->getNotReset();
            $dssp= $ds->limit($this->soSPMoiTrang,$so)->get();//Lấy giới hạn 6 sản phẩm cho mỗi trang
            
            return $dssp;
        }
    }
?>