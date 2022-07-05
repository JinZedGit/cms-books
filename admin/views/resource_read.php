
        <div class="card-body">
        <h4 class="card-title mb-3">Всички ресурси</h4>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Корица на ресурс</th>
                        <th>Заглавие</th>
                        <th>Автор</th>
                        <th>Издателство</th>
                        <th>Библиография</th>
                        <th>Тип</th>
                        <th>Област</th>
                        <th>Обем</th>
                        <th>Година</th>
                        <th>ISSB/ISBN</th>
                        <th>Ключови думи</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                            
            $query = "SELECT * FROM resources r LEFT JOIN authors a ON a.author_id = r.res_author LEFT JOIN types t ON t.type_id = r.res_type LEFT JOIN fields f ON f.field_id = r.res_field";
            $read_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($read_query)){
                $res_id = $row['res_id'];
                $res_title = $row['res_title'];
                $res_author = $row['author_name'];
                $res_bibliography = $row['res_bibliography'];
                $res_publisher = $row['res_publisher'];
                $res_type = $row['type_name'];
                $res_field = $row['field_name'];
                $res_size = $row['res_size'];
                $res_year = $row['res_year'];
                $res_issb = $row['res_issb'];
                $res_keywords = $row['res_keywords'];
                $res_image = $row['res_image'];

                ?>

                <tr>
                    <td style='text-align: center;'><img width='100px' src="/infolib/images/<?php echo $res_image ?>" class=''></td>
                    <td><?php echo $res_title ?></td>
                    <td><?php echo $res_author ?></td>
                    <td><?php echo $res_bibliography ?></td>
                    <td><?php echo $res_publisher ?></td>
                    <td><?php echo $res_type ?></td>
                    <td><?php echo $res_field ?></td>
                    <td><?php echo $res_size ?></td>
                    <td><?php echo $res_year ?></td>
                    <td><?php echo $res_issb ?></td>
                    <td><?php echo $res_keywords ?></td>
                    <td><a href='/infolib/admin/resource/edit/<?php echo $res_id ?>'>Редактиране</a></td>
                    <td><a onclick="return confirm('Наистина ли искате да изтриете този ресурс?')" href='/infolib/admin/resource/delete/<?php echo $res_id ?>'>Изтриване</a></td>
                </tr>

                <?php
            }
        ?>

                </tbody>
            </table>
        </div>