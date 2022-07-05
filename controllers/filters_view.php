<div class="main-child one m-3">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Автори
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="" style="list-style:none; padding: 0px;">
                        <?php 
                        
                        $query = "SELECT r.res_author, a.author_name, COUNT(*) AS countauthor FROM `resources` r LEFT JOIN `authors` a ON r.res_author = a.author_id GROUP BY r.res_author ORDER BY COUNT(*) DESC";
                        $filters_author = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($filters_author)){
                            $res_author = $row['res_author'];
                            $author_name = $row['author_name'];
                            $count = $row['countauthor'];   
                            echo '<li><a href="index.php?filter='.$res_author.'"><span class="badge bg-primary me-1">'. $count .'</span>' . $author_name .'</a></li>';                               
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Тематична област
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="" style="list-style:none; padding: 0px;">
                        <?php 
                        
                        $query = "SELECT r.res_field, f.field_name, COUNT(*) AS countfield FROM `resources` r LEFT JOIN `fields` f ON r.res_field = f.field_id GROUP BY r.res_field";
                        $filters_field = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($filters_field)){
                            $field_name = $row['field_name'];
                            $count = $row['countfield'];   
                            echo '<li><a href=""><span class="badge bg-primary me-1">'. $count .'</span>' . $field_name .'</a></li>';                               
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Тип ресурси
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="" style="list-style:none; padding: 0px;">
                        <?php 
                        
                        $query = "SELECT r.res_type, t.type_name, COUNT(*) AS counttype FROM `resources` r LEFT JOIN `types` t ON r.res_type = t.type_id GROUP BY r.res_type";
                        $filters_type = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($filters_type)){
                            $type_name = $row['type_name'];
                            $count = $row['counttype'];   
                            echo '<li><a href=""><span class="badge bg-primary me-1">'. $count .'</span>' . $type_name .'</a></li>';                               
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>