<?php
    class App{
        private $__controller,$__action,$__params,$__routes, $__db;
        static public $app;
        public function __construct(){
            global $routes,$config;
            self::$app = $this;
            //xu ly route
            $this->__routes = new Route(); 
            //
            if(!empty($routes['default_controller'])){
                $this->__controller = $routes['default_controller'];
            }
            $__controller = "home";
            $__action = "index";
            $__params = [];
            
            if (class_exists('DB')){
                $dbObject = new DB();
                $this->__db = $dbObject->db;
            }
            
            $this->handleUrl();
            
            
        }
        
        public function getUrl(){
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            }
            else{
                $url = '/';
            }
            return $url;
        }
        
        public function handleUrl(){
            $url = $this->getUrl();
            
            //Xu ly handle route khi co url
            $url= $this->__routes->handleRoute($url);
            
            
            $urlArr = array_filter(explode('/',$url));
            $urlArr = array_values($urlArr);
            
            $urlCheck = '';
            if (!empty($urlArr)){
                foreach ($urlArr as $key=>$item){
                    $urlCheck.=$item.'/';
                    $fileCheck = rtrim($urlCheck, '/');
                    $fileArr = explode('/', $fileCheck);
                    $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                    $fileCheck = implode('/', $fileArr);
    
                    if (!empty($urlArr[$key-1])){
                        unset($urlArr[$key-1]);
                    }
    
                    if (file_exists('app/controllers/'.($fileCheck).'.php')){
                        $urlCheck = $fileCheck;
                        break;
                    }
                }
    
                $urlArr = array_values($urlArr);
            }

             
            $urlArr = array_values($urlArr);
            
            // Xu ly Controller
            if(!empty($urlArr[0])){
                $this->__controller = ucfirst($urlArr[0]);
            }
            else{
                $this->__controller = ucfirst($this->__controller);
            }
            if(file_exists('app/controllers/'.$urlCheck.".php")){
                require_once('controllers/'.$urlCheck.".php");
                if(class_exists($this->__controller)){
                    $this->__controller = new $this->__controller();
                    unset($urlArr[0]);
                    
                }
                else{
                    $this->loadError("404");
                    echo "CÓ LỖI KHI LOAD LỚP TỒN TẠI Ở XỬ LÝ CONTROLLER </br>";
                }
                
            }
            else{
                $this->loadError("404");
                echo "CÓ LỖI KHI LOAD FILE TỒN TẠI Ở XỬ LÝ CONTROLLER </br>";
            }
            //Xu ly Action
            if(!empty($urlArr[1])){
                $this->__action = $urlArr[1];
                unset($urlArr[0]);
            }
            
            $this->__params = array_values($urlArr);
            if(method_exists($this->__controller,$this->__action)){
                call_user_func_array([$this->__controller,$this->__action],$this->__params); 
            }
            else{
                $this->loadError('404');
                echo "CÓ LỖI KHI LOAD ACTION TỒN TẠI Ở XỬ LÝ CONTROLLER </br>";
            }
            
        }
        
        
        public function loadError($name = '404', $data = [] ){
            extract($data);
            require_once('errors/'.$name.".php");
        }
    }

?>