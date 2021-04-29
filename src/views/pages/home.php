<?=$render('header', [
    'categories' => $categories,
]);?>

<section class="mt-4 border-top border-secondary mb-5">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-3">
                <?=$render('sidebar', [
                    'brands' => $filters['brands'],
                    'stars' => $filters['stars'],
                    'sale' => $filters['sale'],
                    'options' => $filters['options'],
                    'filters_selected' => $filters_selected,
                    'slider0' => $filters['slider0'],
                    'slider1' => $filters['slider1'],
                    'widget_featured1' => $widget_featured1
                ]);?>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-9">
                <div class="mb-5"></div>
                <div class="row">
                    <?php foreach($list as $key => $product_item): ?>
                        <div class="col-lg-6 col-xl-4 col-md-12 col-sm-12">
                            <?=$render('product_item', $product_item);?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <ul class="pagination pagination-md mt-2 mb-5">
                    <?php for($q = 1; $q <= $number_of_pages; $q++): ?>
                        <li class="page-item <?=($current_page==$q)?'active':'';?>">
                            <a class="page-link" href="<?=$base;?>/?<?php 
                                    $pag_array = $_GET;
                                    $pag_array['page'] = $q;
                                    echo http_build_query($pag_array);
                                ?>">
                                <?=$q;?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
                
            </div>
        </div>
    </div>
</section>

<?=$render('footer', [
    'maxslider' => $filters['maxslider'],
    'widget_sale' => $widget_sale,
    'widget_featured2' => $widget_featured2,
    'widget_toprated' => $widget_toprated
]);?>