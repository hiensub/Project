<?php
use App\Models\Menu;
$args1 = [
    ['status','=',1],
    ['parent_id','=',0],
    ['position','=','mainmenu']
];
$list_menu1 = Menu::where($args1)->get();
?>
<nav class="navbar navbar-expand-lg navbar-dark bd-green-500">
    <div class="container-fluid">
        <a class="navbar-brand d-md-none d-sm-block" href="index.php">
            <strong class="text-danger"> HDL</strong>Shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach($list_menu1 as $menu1):?>
                <?php  
                                    $args2 = [
                                            ['status','=',1],
                                            ['parent_id','=',$menu1->id],
                                            ['position','=','mainmenu']
                                        ];
                                        $list_menu2 = Menu::where($args2)->get();
                                    ?>
                <?php if (count($list_menu2) != null) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  text-light text-uppercase dropdown-toggle" href="product.php"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?=$menu1->name;?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($list_menu2 as $menu2):?>
                        <li><a class="dropdown-item" href="<?=$menu2->link;?>">
                                <?=$menu2->name;?>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase active" href="<?=$menu1->link;?>">
                        <?=$menu1->name;?>
                    </a>
                </li>
                <?php endif ;?>

                <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>