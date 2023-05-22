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
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2 class="fw-bolder pb-3 h1"><?php the_title(); ?></h2>
            <div class="mt-3 mb-4">
                <p class="text-indent h5 fw-normal"><?php the_content(); ?></p>
            </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="container mt-3">
        <h3 class="fw-bolder h2">Коментарі</h3>
        <div class="container card pt-2 pb-3 mt-2 mb-3 comment-block">
            <?php
            $post_id = get_the_ID();
            $comments = get_comments(array(
                'post_id' => $post_id,
                'status' => 'approve',
            ));
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    $avatar = get_avatar($comment->comment_author_email);
                    $author = get_user_by('ID', $comment->user_id);
                    $comment_date = get_comment_date('d.m.Y', $comment->comment_ID);
                    $comment_content = $comment->comment_content;
                    if ($author) {
                        ?>
                        <div class="media">
                            <div class="mr-3 avatar-img">
                                <?php echo $avatar; ?>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-2"><?php echo $author->display_name; ?></h5>
                                <span class="comment-date"><?php echo $comment_date; ?></span>
                                <p class="mt-2 comment-text h5 fw-normal">
                                    <?php echo $comment_content; ?>
                                </p>
                            </div>
                        </div>
                    <?php } else {
                        echo '<p>Користувач не знайдений.</p>';
                    }
                }
            } else {
                echo '<p>Коментарі відсутні.</p>';
            }
            ?>
        </div>
        <div class="">
            <h3 class="fw-bolder h2">Залишити коментар</h3>
            <?php
            if (is_user_logged_in()) {
                // Код форми коментаря
                comment_form(array(
                    'class_form' => 'comment-form',
                    'comment_field' => '
            <div class="form-group">
                <label for="comment">Коментар:</label>
                <textarea class="form-control" id="comment" name="comment" required></textarea>
            </div>',
                    'title_reply' => '',
                    'class_submit' => 'btn bg-pink btn-outline-light mt-2 mb-4',
                    'label_submit' => 'Надіслати коментар'
                ));
            } else {
                echo '<p>Будь ласка, <a href="' . wp_login_url() . '">увійдіть в аккаунт</a>, щоб залишити коментар.</p>';
            }
            ?>
        </div>
    </div>
</main>
<?php get_footer();?>
</body>
</html>