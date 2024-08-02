<?php get_header(); ?>

<section class="sd-blog">
  <div class="container">
    <h2>Блог</h2>

    <?php if (have_posts()) : ?>

      <div class="sd-blog__page-grid">
        <?php
        while (have_posts()) {
          the_post();

          get_template_part('partials/card', 'default');
        }
        ?>
      </div>

      <?php
      the_posts_pagination([
        'prev_text' => '',
        'next_text' => '',
      ]);
      ?>

    <?php else : ?>
      <p>Записи пока отсутствуют</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer();
