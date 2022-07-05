<?php 

        if(isset($_GET['filter'])){

            $filter = $_GET['filter'];
            $query = "SELECT * FROM resources r LEFT JOIN authors a ON a.author_id = r.res_author WHERE r.res_author = $filter";
            $read_query = mysqli_query($connection, $query);

        }
        else{

            $query = "SELECT * FROM resources r LEFT JOIN authors a ON a.author_id = r.res_author";
            $read_query = mysqli_query($connection, $query);

        }

        while($row = mysqli_fetch_assoc($read_query)){
            $res_id = $row['res_id'];
            $res_title = $row['res_title'];
            $res_author = $row['author_name'];
            $res_image = $row['res_image'];
            $res_bibliography = $row['res_bibliography'];

            include('./views/read_resources_view.php');
            
        }

?>