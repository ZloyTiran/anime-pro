<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime PRO</title>
    <?php wp_head();?>
</head>
<body>
<?php get_header();?>
<main>
    <div class="container mt-4">
        <h2 class="fw-bolder pb-3">Новинки зі світу аніме</h2>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        $selected_category = isset($_GET['category']) ? $_GET['category'] : '';

        if (!empty($selected_category)) {
            $args['category_name'] = $selected_category;
        }

        if (isset($_GET['search'])) {
            $search_query = $_GET['search'];
            $args['s'] = $search_query;
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $counter = 0;
            echo '<div class="row d-flex align-items-stretch">';
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $post_thumbnail = get_field("main_image", $post_id);
                $post_title = get_the_title();
                $post_content = get_the_content();
                $post_content = wp_strip_all_tags($post_content);
                $post_excerpt = wp_trim_words($post_content, 15, '...');
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card mb-4 h-100">
                        <div class="row no-gutters">
                            <div class="col-md-4 mt-3">
                                <?php if ($post_thumbnail) { ?><img src="<?php echo esc_url($post_thumbnail); ?>" alt="first image" class="card-img img-fluid rounded">
                                <?php } else { ?>
                                    <img src="<?php echo bloginfo('template_url');?>/assets/img/null.png" alt="first image" class="card-img img-fluid rounded">
                                <?php } ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo esc_html($post_title); ?></h5>
                                    <p class="card-text"><?php echo esc_html($post_excerpt); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn bg-pink btn-outline-light">Читати далі</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<div class="alert alert-warning" role="alert">За вашим запитом не було знайдено постів</div>';
        }
        ?>
    </div>
</main>
<?php get_footer();?>
</body>
</html>