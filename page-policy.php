<?php
/*
  Template Name: Policy Template
*/
?>
<?php get_header(); ?>

  <div class="container">
    <div class="policy-cont">
      <hr>
      <div class="row">

        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="small-12 columns">
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