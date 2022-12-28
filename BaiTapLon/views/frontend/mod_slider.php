<?php
use App\Models\Slider;

$args_slider =[
    ['status','=',1],
    ['position','=','slideshow']
];
$list_slider = Slider::where($args_slider)->get();
?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $index = 1;?>
        <?php foreach($list_slider as $slider) :?>
        <?php if($index == 1) :?>
        <div class="carousel-item active">
            <img src="public/images/slider/<?=$slider->image;?>" class="d-block w-100" alt="<?=$slider->image;?>">
        </div>
        <?php else : ?>
        <div class="carousel-item ">
            <img src="public/images/slider/<?=$slider->image;?>" class="d-block w-100" alt="<?=$slider->image;?>">
        </div>
        <?php endif ;?>
        <?php $index ++;?>
        <?php endforeach ;?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>