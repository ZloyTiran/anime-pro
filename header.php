<header class="bg-pink">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="<?php echo bloginfo('template_url');?>/assets/img/logo.png" alt="Logo" height="80">
                <h1 class="h3 fw-bolder">Anime PRO</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Головна</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Категорії
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                <?php
                                $categories = get_categories(array('hide_empty' => 0));
                                foreach ($categories as $category) {
                                    $category_link = get_category_link($category->term_id);
                                    echo '<li><a class="dropdown-item" href="' . esc_url(add_query_arg('category', $category->slug, home_url('/'))) . '">' . $category->name . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ms-4">
                        <form class="d-flex" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input class="form-control me-2" type="search" name="search" placeholder="Пошук" aria-label="Пошук">
                            <button class="btn btn-outline-light" type="submit">Пошук</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>