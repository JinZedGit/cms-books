<?php 

if(is_numeric($request[2])){

    $query = "SELECT * FROM resources r LEFT JOIN authors a ON a.author_id = r.res_author LEFT JOIN types t ON t.type_id = r.res_type LEFT JOIN fields f ON f.field_id = r.res_field WHERE res_id = $request[2]";
    $edit_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($edit_query)){
        $res_id = $row['res_id'];
        $res_title = $row['res_title'];
        $res_author = $row['author_name'];
        $res_author_id = $row['res_author'];
        $res_publisher = $row['res_publisher'];
        $res_type = $row['type_name'];
        $res_type_id = $row['res_type'];
        $res_field = $row['field_name'];
        $res_field_id = $row['res_field'];
        $res_size = $row['res_size'];
        $res_year = $row['res_year'];
        $res_issb = $row['res_issb'];
        $res_keywords = $row['res_keywords'];
        $res_bibliography = $row['res_bibliography'];
        $res_image = $row['res_image'];
        $res_file = $row['res_file'];
    }

}

if(isset($_POST['res_submit'])){

    $res_title = $_POST['res_title'];
    $res_author = $_POST['res_author'];
    $res_publisher = $_POST['res_publisher'];
    $res_type = $_POST['res_type'];
    $res_field = $_POST['res_field'];
    $res_size = $_POST['res_size'];
    $res_year = $_POST['res_year'];
    $res_issb = $_POST['res_issb'];
    $res_keywords = $_POST['res_keywords'];

    if ($_FILES['res_image']['size'] == 0){
        $res_image = $_FILES['res_image']['name'];
        $res_image_temp = $_FILES['res_image']['tmp_name'];
    }

    if ($_FILES['res_file']['size'] == 0){
        $res_file = $_FILES['res_file']['name'];
        $res_file_temp = $_FILES['res_file']['tmp_name'];
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <h4 class="card-title">Редактиране на ресурс</h4>
            <div class="card w-50">
                <form method="POST" enctype="multipart/form-data" action="" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label for="res_title"
                                class="control-label col-form-label">Заглавие</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_title" value="<?php echo $res_title ?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_publisher"
                                class="control-label col-form-label">Издателство</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_publisher"  value="<?php echo $res_publisher?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_author" class="control-label col-form-label">Автор</label>
                            <div class="col-sm-12">
                            <select name="res_author" class="select2 form-select shadow-none"
                                    style="width: 100%; height: 36px">
                                    <option selected value="<?php echo $res_author_id ?>"><?php echo $res_author ?></option>
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
                                <input type="text" class="form-control" name="res_bibliography" value="<?php echo $res_bibliography ?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_type" class="control-label col-form-label">Тип на
                                ресурса</label>
                            <div class="col-md-12">
                                <select name="res_type" class="select2 form-select shadow-none"
                                    style="width: 100%; height: 36px">
                                    <option selected value="<?php echo $res_type_id ?>"><?php echo $res_type ?></option>
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
                                    <option selected value="<?php echo $res_field_id ?>"><?php echo $res_field ?></option>
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
                                <input type="text" class="form-control" name="res_size" value="<?php echo $res_size ?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_year" class="control-label col-form-label">Година на
                                публикуване</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_year" value="<?php echo $res_year ?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="conores_issb1"
                                class="control-label col-form-label">ISSB/ISBN/DOI</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_issb" value="<?php echo $res_issb ?>" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="res_keywords" class="control-label col-form-label">Ключови
                                думи</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="res_keywords" value="<?php echo $res_keywords ?>" placeholder="" />
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
                                <input type="file" class="form-control" name="res_file"/>
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