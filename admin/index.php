<?php 
session_start();
require('header_footer/connection.php');
include('header_footer/admin-header.php');
include('header_footer/admin-side-bar.php');

if($_SESSION['user_role'] == 3){

$request = $_SERVER['REQUEST_URI'];
$request = str_replace("/infolib/admin/", "", $request);
$request = explode( "/", $request);

switch ($request[0]) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;

    case '' :
        require __DIR__ . '/views/index.php';
        break;
    
    case 'index.php' :
      require __DIR__ . '/views/index.php';
      break;

    case 'resource' :
      require __DIR__ . '/views/resource.php';
      break;

    case 'authors' :
      require __DIR__ . '/views/authors.php';
      break;

    case 'types' :
      require __DIR__ . '/views/types.php';
      break;

    case 'fields' :
      require __DIR__ . '/views/fields.php';
      break;
    
    case 'users' :
      require __DIR__ . '/views/users.php';
      break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

include('header_footer/admin-footer.php');

}else{

  echo '<meta http-equiv="Refresh" content="0; URL=/infolib/">';
  
}



?>