<?php 

if(isset($_GET['book_id'])){

    $title = $_GET['book_id'];

    $query = "SELECT * FROM resources r LEFT JOIN authors a ON a.author_id = r.res_author LEFT JOIN types t ON t.type_id = r.res_type LEFT JOIN fields f ON f.field_id = r.res_field WHERE r.res_title = '$title'";
    $read_book = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($read_book)){
        
        $res_title = $row['res_title'];
        $res_publisher = $row['res_publisher'];
        $res_author = $row['author_name'];
        $res_field = $row['field_name'];
        $res_type = $row['type_name'];
        $res_bibliography = $row['res_bibliography'];
        $res_size = $row['res_size'];
        $res_year = $row['res_year'];
        $res_issb = $row['res_issb'];
        $res_keywords = $row['res_keywords'];
        $res_image = $row['res_image'];
        $res_file = $row['res_file'];
        
    }
}

include('./views/read_book_view.php');
?>