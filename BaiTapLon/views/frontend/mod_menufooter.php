<?php
use App\Models\Menu;

$args_footer = [
    ['status','=',1],
    ['position','=','footermenu']   
];
$list_menu_footer= Menu::where($args_footer)->get();
?>
<section class="footer clearfix py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Về chúng tôi</h3>
                <ul>
                    <?php foreach($list_menu_footer as $row_menu_footer) :?>
                    <li><a href="<?= $row_menu_footer->link;?>"> <?= $row_menu_footer->name;?> </a></li>
                    <?php endforeach;?>
                </ul>
            </div>

        </div>
    </div>
</section>