<?php
    define('_DIR_ROOT', str_replace('\\', '/', __DIR__));
    // echo _DIR_ROOT;
    //xu ly http root
    
    
    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
        $web_root = 'https://'.$_SERVER['HTTP_HOST'];
    }
    else{
        $web_root = 'http://'.$_SERVER['HTTP_HOST'];
    }
    
    $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '/',strtolower(_DIR_ROOT)  );
    $folder= ltrim($folder,"/");
    
    
    $web_root= $web_root."/".$folder;
   
    define('_WEB_ROOT',$web_root);
    require_once('configs/routes.php');
    
    
    $configs_dir = scandir('configs');
    if (!empty($configs_dir)){
        foreach ($configs_dir as $item){
            if ($item!='.' && $item!='..' && file_exists('configs/'.$item)){
                require_once 'configs/'.$item;
            }
        }
    }

    require_once('core/Route.php');
    require_once('app/App.php');
    
    
    if (!empty($config['database'])){
        $db_config = array_filter($config['database']);
    
        if (!empty($db_config)){
            require_once 'core/Connection.php';
            require_once 'core/QueryBuilder.php';
            require_once 'core/Database.php';
            require_once 'core/DB.php';
            
        }
    }
    require_once('core/Model.php');
    require_once('core/Controller.php'); // Load base controller
    
?>