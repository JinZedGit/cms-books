<?php 

if(isset($_POST['res_submit'])){

    $res_title = $_POST['res_title'];
    $res_author = $_POST['res_author'];
    $res_bibliography = $_POST['res_bibliography'];
    $res_publisher = $_POST['res_publisher'];
    $res_type = $_POST['res_type'];
    $res_field = $_POST['res_field'];
    $res_size = $_POST['res_size'];
    $res_year = $_POST['res_year'];
    $res_issb = $_POST['res_issb'];
    $res_keywords = $_POST['res_keywords'];

    $res_image = $_FILES['res_image']['name'];
    $res_image_temp = $_FILES['res_image']['tmp_name'];

    move_uploaded_file($res_image_temp, "../images/$res_image");

    $res_file = $_FILES['res_file']['name'];
    $res_file_temp = $_FILES['res_file']['tmp_name'];

    move_uploaded_file($res_file_temp, "../files/$res_file");
    $query = "INSERT INTO resources (res_title, res_author, res_publisher, res_bibliography, res_type, res_field, res_size, res_year, res_issb, res_keywords, res_image, res_file) VALUES ('$res_title', '$res_author', '$res_publisher', '$res_bibliography', '$res_type', '$res_field', '$res_size', '$res_year', '$res_issb', '$res_keywords', '$res_image', '$res_file')";
    $create_res = mysqli_query($connection, $query);
}   

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card w-50" style="min-width: 410px;">
                <form method="POST" enctype="multipart/form-data" action="" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label for="res_title"
                                class="control-label col-form-label">Заглавие</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_title" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_publisher"
                                class="control-label col-form-label">Издателство</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_publisher" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_author" class="control-label col-form-label">Автор</label>
                            <div class="col-sm-12">
                            <select name="res_author" class="select2 form-select shadow-none"
                                    style="width: 100%; height: 36px">
                                    <option selected disabled hidden>Изберете автор</option>
                                    <?php 
                                    $query = "SELECT * FROM authors";
                                    $type_query = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($type_query)){
                                        $value = $row['author_id'];
                                        $type = $row['author_name'];
                                        echo "<option value='$value'>$type</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_bibliography"
                                class="control-label col-form-label">Библиография</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_bibliography" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_type" class="control-label col-form-label">Тип на
                                ресурса</label>
                            <div class="col-md-12">
                                <select name="res_type" class="select2 form-select shadow-none"
                                    style="width: 100%; height: 36px">
                                    <option selected disabled hidden>Изберете тип</option>

                                    <?php 
                                    $query = "SELECT * FROM types";
                                    $type_query = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($type_query)){
                                        $value = $row['type_id'];
                                        $type = $row['type_name'];
                                        echo "<option value='$value'>$type</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_field" class="control-label col-form-label">Тематична
                                област</label>
                            <div class="col-md-12">
                                <select name="res_field" class="select2 form-select shadow-none"
                                    style="width: 100%; height: 36px">
                                    <option selected disabled hidden>Изберете тип</option>
                                    
                                    <?php 
                                    $query = "SELECT * FROM fields";
                                    $type_query = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($type_query)){
                                        $value = $row['field_id'];
                                        $type = $row['field_name'];
                                        echo "<option value='$value'>$type</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_size" class="control-label col-form-label">Обем</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_size" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_year" class="control-label col-form-label">Година на
                                публикуване</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_year" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="conores_issb1"
                                class="control-label col-form-label">ISSB/ISBN/DOI</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_issb" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_keywords" class="control-label col-form-label">Ключови
                                думи</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_keywords" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="res_image" class="control-label col-form-label">Корица на
                                ресурса</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="res_image" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="res_file" class="control-label col-form-label">Файл за четене</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="res_file" />
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <input name="res_submit" type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>