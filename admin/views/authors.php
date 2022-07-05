<?php 

if(isset($_POST['author_submit'])){

    $author_name = $_POST['author_name'];
    $query = "INSERT INTO authors (author_name) VALUES ('$author_name')";
    $create_author = mysqli_query($connection, $query);

}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
        <h4 class="card-title">Добавяне на автор</h4>
            <div class="card w-50" style="min-width: 410px;">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="visually-hidden" for="author_name">Автор</label>
                            <div class="input-group">
                                <input name="author_name" type="text" class="form-control" placeholder="Автор">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <button name="author_submit" type="submit" class="btn btn-primary">Добавяне</button>
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
                    
                    $query = "SELECT * FROM authors";
                    $read_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($read_query)){
                        $author_id = $row['author_id'];
                        $author_name = $row['author_name'];
                        echo "<tr><td>".$author_name."</td>";
                        echo "<td><a onclick=\"return confirm('Наистина ли искате да изтриете този автор?');\" href='/infolib/admin/authors/delete/".$author_id."'>Delete</a></td>";
                        
                    }

                    ?>
                    </tbody>
                </table>
            </div></div>

                        <?php 

if(isset($request[2]) && is_numeric($request[2])){
    
    $query = "DELETE FROM authors WHERE author_id=$request[2]";
    $delete_query = mysqli_query($connection, $query);
    echo '<meta http-equiv="Refresh" content="0; URL=/infolib/admin/authors/">';
    
}

?>