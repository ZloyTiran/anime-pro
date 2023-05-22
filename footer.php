<footer class="bg-pink pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-center">
                <div>
                    <h2 class="h4 fw-bolder">Про сайт</h2>
                    <p>Сайт присвячений захопливому світу аніме!
                        Він надає унікальну можливість дізнатися
                        більше про захопливу культуру аніме. З
                        короткою, але інформативною інформацією
                        про різні аніме-серіали та фільми,
                        допоможе обрати найцікавіший.
                        Розпочніть свою подорож у світ аніме,
                        який ніколи не припиняє дивувати!</p>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <div>
                    <h2 class="h4 fw-bolder">Навігація</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-dark" href="/">Головна</a></li>
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
                                        $selected = ($selected_category && $selected_category === $category->slug) ? 'active' : '';
                                        echo '<li><a class="dropdown-item ' . $selected . '" href="' . esc_url(add_query_arg('category', $category->slug, home_url('/'))) . '">' . $category->name . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <div>
                    <h2 class="h4 fw-bolder">Контакти</h2>
                    <p>Електронна пошта: animepro@bach.mama</p>
                    <p>Телефон: 8 (800) 555 35 35</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-white">Developed on <a class="text-white" target="_blank" href="https://uk.wordpress.org/">WordPress</a> by Vasyl Kinch</p>
            </div>
        </div>
    </div>
    <?php wp_footer();?>
</footer>