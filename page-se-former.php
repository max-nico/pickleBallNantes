<?php get_header(); ?>
<script src="../wp-content/themes/pickleball/assets/js/navBarStateColor.js"></script>
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container-full learning">
        <div class="row">
            <?php the_content(); ?>
            <!-- <a href="<?php get_permalink($post, $leavename) ?>" class="btn-danger btn-e-learning">e-learning</a> -->
        </div>
        <?php endwhile; endif; ?>
    </div>              
<script type="text/javascript">
document.querySelectorAll("a.insomnia_vc_button").forEach(element => {
    element.className += " btn-danger btn-e-learning";
});
</script>
<?php get_footer(); ?>
