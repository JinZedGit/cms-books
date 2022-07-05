<?php 

if(count($request) >= 2){
    switch ($request[1]) {
        case 'view' :
          require __DIR__ . '/resource_read.php';
          break;
        
        case 'new' :
          require __DIR__ . '/resource_create.php';
          break;
    
        case 'delete' :
          require __DIR__ . '/resource_delete.php';
          break;

        case 'edit' :
          require __DIR__ . '/resource_update.php';
          break;
    
        default:
          require __DIR__ . '/resource_read.php';
          break;
    }
}


?>