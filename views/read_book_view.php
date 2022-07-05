<div class="container d-flex mt-5">
    <div class="card m-2" style="width: 18rem; min-width: 210px">
        <img src="images/<?php echo $res_image?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $res_title?></h5>
            <h6><?php echo $res_author?></h6>
            <p class="card-text"><?php echo $res_bibliography?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Tип: <?php echo $res_type?><br>Област: <?php echo $res_field?></li>
            <li class="list-group-item">Година: <?php echo $res_year?><br> Обем: <?php echo $res_size?><br>ISSB: <?php echo $res_issb?></li>
            <li class="list-group-item">Ключови думи: <?php echo $res_keywords?></li>
        </ul>
    </div>
    <div class="card m-2 w-100" style="width: 18rem; min-width: 480px">
        <div class="card-body">
            <div class="container">
                <iframe style="width: 100%" height="870px" src="files/<?php echo $res_file?>" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>