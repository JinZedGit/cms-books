<?php 
require ('controllers/connection.php');
include ('views/header.php');

echo '<div class="main-parent">';

    include ('controllers/filters_view.php');

    echo '<div class="main-child two m-3">';

        include('controllers/read_resources.php');

    echo '</div>
</div>';

include ('views/footer.php');
?>