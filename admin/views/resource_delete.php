<?php

if(is_numeric($request[2])){

    $query = "DELETE FROM resources WHERE res_id=$request[2]";
    $delete_query = mysqli_query($connection, $query);
    echo '<meta http-equiv="Refresh" content="0; URL=/infolib/admin/resource/">';
}

?>