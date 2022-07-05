<?php 

if(isset($_POST['field_submit'])){

    $field_name = $_POST['field_name'];
    $query = "INSERT INTO fields (field_name) VALUES ('$field_name')";
    $create_field = mysqli_query($connection, $query);
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <h4 class="card-title">Добавяне на тематична област</h4>
            <div class="card w-50" style="min-width: 410px;">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="visually-hidden" for="field_name">Тематична област</label>
                            <div class="input-group">
                                <input name="field_name" type="text" class="form-control" placeholder="Тематична област">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <button name="field_submit" type="submit" class="btn btn-primary">Добавяне</button>
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
                    
                    $query = "SELECT * FROM fields";
                    $read_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($read_query)){
                        $field_id = $row['field_id'];
                        $field_name = $row['field_name'];
                        echo "<tr><td>".$field_name."</td>";
                        echo "<td><a onclick=\"return confirm('Наистина ли искате да изтриете тази тематична област?');\" href='/infolib/admin/fields/delete/".$field_id."'>Delete</a></td>";
                        
                    }

                    ?>
                    </tbody>
                </table>
            </div></div>

                        <?php 

if(isset($request[2]) && is_numeric($request[2])){
    
    $query = "DELETE FROM fields WHERE field_id=$request[2]";
    $delete_query = mysqli_query($connection, $query);
    echo '<meta http-equiv="Refresh" content="0; URL=/infolib/admin/fields/">';
    
}

?>