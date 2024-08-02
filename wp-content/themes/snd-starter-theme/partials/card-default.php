<?php
$post_id = $post->ID;
$thumbnail_id = get_post_thumbnail_id($post_id);
$image = $thumbnail_id ? wp_get_attachment_image($thumbnail_id, 'medium') : '';
$title = esc_html(get_the_title());
$description = esc_html(get_the_excerpt());
$post_url = esc_url(get_the_permalink());

?>

<div class="sd-blog__card" title="<?php echo $title; ?>">
  <?php echo $image; ?>
  <h3><?php echo $title; ?></h3>
  <p><?php echo $description; ?></p>
  <a href="<?php echo $post_url; ?>" title="Читать <?php echo $title; ?>">Читать статью</a>
</div>