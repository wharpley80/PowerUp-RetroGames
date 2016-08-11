<?php
/*
  Template Name: About Template
*/
?>
<?php get_header(); ?>

  <div class="container">
    <div class="about-cont">
      <hr>
      <div class="row">

        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="medium-8 columns ">

            <?php
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true);
            ?>

            <p><a href="<?php the_permalink();?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
            </p>
          </div>
          <div class="medium-4 columns">
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); ?>
          </div>

        <?php endwhile; else: ?>

        <div class="page-header"> 
          <h1>Oh no!</h1>
        </div>
        <p>No content is appearing for this page!</p>

        <?php endif; ?>
       
      </div>
    </div>
  </div>

<?php get_footer(); ?>