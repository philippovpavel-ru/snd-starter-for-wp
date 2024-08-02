<?php get_header(); ?>

<main class="sd-article">
  <div class="container">
    <div class="sd-article__text">
      <span class="sd-article__date"><?php echo get_the_date(); ?></span>
      <?php the_title('<h1>', '</h1>'); ?>
      <?php the_content(); ?>
    </div>
    <div class="sd-article__imgs">
      <?php the_post_thumbnail('large'); ?>

      <span class="sd-article__date"><?php echo get_the_date(); ?></span>
    </div>
  </div>
</main>

<?php
$get_posts = get_posts([
  'post_type' => 'post',
  'posts_per_page' => 3,
  'post__not_in' => [get_the_ID()],
]);

$page_for_posts_id = get_option('page_for_posts');
?>

<?php if ($get_posts) : ?>
  <?php global $post; ?>
  <section class="sd-blog">
    <div class="container">
      <h2>Другие статьи</h2>

      <?php foreach ($get_posts as $post) {
        setup_postdata($post);

        get_template_part('partials/card', 'default');
      } ?>

      <?php if ($page_for_posts_id) : ?>
        <a href="<?php echo esc_url(get_permalink($page_for_posts_id)); ?>" class="sd-blog__all">СМОТРЕТЬ ВСЕ СТАТЬИ</a>
      <?php endif; ?>
    </div>
  </section>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer();
