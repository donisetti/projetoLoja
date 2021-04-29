<?php
namespace src\controllers;

use \core\Controller;
use src\models\Categories;
use \src\models\Products;
use \src\models\Filters;

class CategoriesController extends Controller
{
    public function index($atts)
    {
        $data = [];
        $products = new Products();
        $categories = new Categories();
        $new_filters = new Filters();

        $data['category_name'] = $categories->getCategoryName($atts['id']);
        if(!empty($data['category_name'])) {
            $current_page = 1;
            $offset = 0;
            $limit = 6;

            if(isset($_GET['page']) && !empty($_GET['page'])) {
                $current_page = $_GET['page'];
            }

            $offset = ($current_page * $limit) - $limit;

            $filters = ['category' => $atts['id']];

            $data['categorie_filter'] = $categories->getCategorieTree($atts['id']);
            $data['list'] = $products->getList($offset, $limit, $filters);
            $data['total_items'] = $products->getTotal($filters);
            $data['number_of_pages'] = ceil($data['total_items'] / $limit);
            $data['current_page'] = $current_page;
            $data['categories'] = $categories->getList();

            $data['widget_featured1'] = $products->getList(0, 5, ['featured' => '1'], true);
            $data['widget_featured2'] = $products->getList(0, 3, ['featured' => '1'], true);
            $data['widget_sale'] = $products->getList(0, 3, ['sale' => '1'], true);
            $data['widget_toprated'] = $products->getList(0, 3, ['toprated' => '1']);

            $data['filters'] = $new_filters->getFilters($filters);
            $data['filters_selected'] = $filters;
            $data['id_category'] = $atts['id'];            

            $this->render('categories', $data);   
        } else {
            $this->redirect('/');
        }
    }
}