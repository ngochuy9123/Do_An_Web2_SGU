<?php
    class QuangCaoModel extends Model {
        private $id;
        private $title;
        private $topic;
        private $desc;
        private $image;
    
        
    
        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getTitle() {
            return $this->title;
        }
    
        public function setTitle($title) {
            $this->title = $title;
        }
    
        public function getTopic() {
            return $this->topic;
        }
    
        public function setTopic($topic) {
            $this->topic = $topic;
        }
    
        public function getDesc() {
            return $this->desc;
        }
    
        public function setDesc($desc) {
            $this->desc = $desc;
        }
    
        public function getImage() {
            return $this->image;
        }
    
        public function setImage($image) {
            $this->image = $image;
        }
        
        public function test(){
            return "Day la chi tiet San Pham";
        }
    	
        public function tableFill() {
            return "advertise";
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
            return 'id';
        }
        public function vd(){
            return "Day la Quang Cao";
        }
        public function index(){
            $data = $this->all();
            
            return $data;
        }
}
    
?>