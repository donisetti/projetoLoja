<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css"/>
    <title>Ecommerce</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg border-bottom border-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?=$base;?>" class="nav-link text-dark">
                            <?=$this->lang->get("HOME");?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-dark">
                            <?=$this->lang->get("CONTACT");?>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$this->lang->get("LANGUAGE");?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item text-dark" href="<?=$base;?>/language/en">English</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-dark" href="<?=$base;?>/language/pt-br">Português</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="<?=$base;?>/login">
                            <?=$this->lang->get("LOGIN");?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<?=$render('jumbotron', [
    'categories' => !empty($categories) ? $categories : '',
    'search_term' => !empty($search_term) ? $search_term : '',
    'category' => !empty($category) ? $category : ''
]);?>

<?php if(isset($categorie_filter)): ?>
    <?=$render('menu_categories', [
        'categories' => !empty($categories) ? $categories : '',
        'categorie_filter' => $categorie_filter
    ]);?>
<?php else: ?>
    <?=$render('menu_categories', [
        'categories' => !empty($categories) ? $categories : ''
    ]);?>
<?php endif; ?>