<?php
namespace src\controllers;

use \core\Controller;
use src\models\Categories;
use src\models\Filters;
use \src\models\Products;
use src\models\Productsimages;

class ProductController extends Controller
{
    public function index($atts)
    {
        $data = [];
        $filters = [];
        
        $products = new Products();
        $categories = new Categories();
        $new_filters = new Filters();
        $products_images = new Productsimages();

        $info = $products->getProductInfo($atts['id']);
        if(count($info) > 0)
        {
            $data['info'] = $info;
            $data['images'] = $products_images->getImagesByProductId($atts['id']);
            $data['product_options'] = $products->getOptionsByProductId($atts['id']);
            $data['products_rates'] = $products->getRates($atts['id'], 5);

            $data['categories'] = $categories->getList();
            $data['widget_featured1'] = $products->getList(0, 5, ['featured' => '1'], true);
            $data['widget_featured2'] = $products->getList(0, 3, ['featured' => '1'], true);
            $data['widget_sale'] = $products->getList(0, 3, ['sale' => '1'], true);
            $data['widget_toprated'] = $products->getList(0, 3, ['toprated' => '1']);
            $data['filters'] = $new_filters->getFilters($filters);
            $data['filters_selected'] = [];
    
            $this->render('product', $data);
        } else {
            $this->redirect('/');
            exit;
        }

    }
}