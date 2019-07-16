<?php               
    // Template Name: Homepage
?>

<?php get_header();?>
<div class="default_page">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <?php the_content();  ?>
            <div class="clearfix"></div>
        </div>
    <?php endwhile; endif; ?>
    <?php get_template_part( 'framework/content/acceuil/action-blocks'); ?>
</div>
<?php  get_footer(); ?>