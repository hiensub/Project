<?php
use App\Models\Category;
use App\Models\Product;

$list_category= Category::where([['status','=',1],['parent_id','=',0]])
->orderBy('sort_order','ASC')
->get();

?>
<?php require_once('views/frontend/header.php');?>
<section class="slideshow">
    <?php require_once("views/frontend/mod_slider.php");?>
</section>
<section class="maincontent clearfix">
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="category-title position-relative">

                    <?php foreach($list_category as $row_cat):?>
                    <?php
                                $list_category_id =array();
                                array_push($list_category_id,$row_cat->id);
                                $list_category1= Category::where([['status','=',1],['parent_id','=',$row_cat->id]])
                                ->get();  
                                if(count($list_category1)>0){
                                    foreach ($list_category1 as $row_cat1){
                                        array_push($list_category_id , $row_cat1->id);
                                        $list_category2= Category::where([['status','=',1],['parent_id','=',$row_cat1->id]])
                                        ->get();  
                                        if(count($list_category2)>0){
                                            foreach ($list_category2 as $row_cat2){
                                                array_push($list_category_id1 , $row_cat2->id);
                                                $list_category3= Category::where([['status','=',1],['parent_id','=',$row_cat2->id]])
                                                ->get();  
                                                if(count($list_category3)>0){
                                                    foreach ($list_category3 as $row_cat3){
                                                        array_push($list_category_id2 , $row_cat3->id);
                                                    }
                                        }
                                        }
                                        
                                        }
                                    }
                                } 
                                $product_list =Product::where('status','=',1)->whereIn('category_id',$list_category_id)
                                ->orderBy('created_at','DESC')
                                ->get();
                                
                                
                            ?>
                    <h2 class="text-center"><a href="index.php?option=product&cat=<?=$row_cat->slug;?>">
                            <?=$row_cat->name;?></a>
                    </h2>

                </div>
                <div class="row">
                    <div class="large-12 columns">

                        <div class="owl-carousel owl-theme">
                            <?php foreach($product_list as $product):?>
                            <div class="item product-item">
                                <div class="card" style="width: 100%">
                                    <div class="product-image">
                                        <a href="index.php?option=product&id=<?=$product->slug;?>">
                                            <img src="public/images/product/<?=$product->image;?>"
                                                class="img-fluid card-img-top" alt="<?=$product->image;?>">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <a
                                                href="index.php?option=product&id=<?=$product->slug;?>"><?=$product->name;?></a>
                                        </h5>
                                        <h5 class="text-center">
                                            <strong class="text-success"><?=number_format($product->pricesale);?>
                                                <sup>đ</sup></strong>
                                            <del><span class="text-danger"><?=number_format($product->price);?></span></del><sup>đ</sup>
                                        </h5>
                                        <div class="btn-group w-100" role="group" aria-label="Basic example">
                                            <a href="index.php?option=cart&addcat=<?=$product->id;?>"
                                                class="btn btn-outline-info"><i class="fas fa-shopping-cart"></i></a>
                                            <a href="index.php?option=product&id=<?=$product->slug;?>"
                                                class="btn btn-outline-success"><i class="far fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>

                    </div>
                    <!--end large-12 columns-->

                </div>
                <?php endforeach ;?>

                <!--end row-->
            </div>
            <!--end col-md-12 col-lg-12-->
        </div>
    </div>
</section>

<link rel="stylesheet" href="public/plugins/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="public/plugins/owlcarousel/css/owl.theme.default.min.css">
<script src="public/plugins/owlcarousel/js/owl.carousel.min.js"></script>
<?php require_once('views/frontend/footer.php');?>