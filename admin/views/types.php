<?php 

if(isset($_POST['type_submit'])){

    $type_name = $_POST['type_name'];
    $query = "INSERT INTO types (type_name) VALUES ('$type_name')";
    $create_type = mysqli_query($connection, $query);
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <h4 class="card-title">Добавяне на тип ресурс</h4>
            <div class="card w-50" style="min-width: 410px;">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="visually-hidden" for="type_name">Тип</label>
                            <div class="input-group">
                                <input name="type_name" type="text" class="form-control" placeholder="Тип ресурс">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <button name="type_submit" type="submit" class="btn btn-primary">Добавяне</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Автор</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    $query = "SELECT * FROM types";
                    $read_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($read_query)){
                        $type_id = $row['type_id'];
                        $type_name = $row['type_name'];
                        echo "<tr><td>".$type_name."</td>";
                        echo "<td><a onclick=\"return confirm('Наистина ли искате да изтриете този тип?');\" href='/infolib/admin/types/delete/".$type_id."'>Delete</a></td>";
                        
                    }

                    ?>
                    </tbody>
                </table>
            </div></div>

                        <?php 

if(isset($request[2]) && is_numeric($request[2])){
    
    $query = "DELETE FROM types WHERE type_id=$request[2]";
    $delete_query = mysqli_query($connection, $query);
    echo '<meta http-equiv="Refresh" content="0; URL=/infolib/admin/types/">';
    
}

?>