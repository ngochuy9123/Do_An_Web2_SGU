<?php
    class ChiTietSanPhamModel extends Model{
        public function vd(){
            return "Day la trang chi tiet san pham";
        }
        public function timSanPhamTheoId($id){
            // $data = $this->find($id);
			$data = $this->db->table('products')->where('id', '=', $id)->first();
			
            return $data;
        }
    	/**
	 * @return mixed
	 */
	public function tableFill() {
		return "products";
	}
	
	/**
	 * @return mixed
	 */
	public function fieldFill() {
		return "*";
	}
	
	/**
	 * @return mixed
	 */
	public function primaryKey() {
		return "id";
	}
}
?>