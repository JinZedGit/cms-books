<div class="card mb-2">
    <div class="row w-100">
        <div class="col" style="max-width: 235px">
            <img style="min-width: 210px; max-width: 210px" src="images/<?php echo $res_image ?>"
                class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col">
            <div class="card-body" style="padding: 20px 20px 20px 0px;">
                <h5 class="card-title"><?php echo $res_title ?></h5>
                <p class="card-text"><small class="text-muted"><?php echo $res_author ?></small></p>
                <p class="card-text" style="text-align: justified;"><?php echo $res_bibliography ?></p>
                <p class="card-text"><small class="text-muted"></small></p>
                <a class="btn btn-primary" style="position: absolute; bottom: 15px; right: 15px;" href="book.php?book_id=<?php echo $res_title; ?>" role="button">Прочети</a>
            </div>
        </div>
    </div>
</div>