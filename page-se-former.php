<?php get_header(); ?>
<script type="text/javascript">
    //changement de class html pour affichage sur page bleue
    let list = document.querySelectorAll(".nav-item")
    
    list.forEach(element => {
      element.className += " menu-item-white";
    });
    console.log(list);
    
</script>
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container-full learning">
        <div class="row">
            <?php the_content(); ?>
            <a href="<?php get_permalink($post, $leavename) ?>" class="btn-danger btn-e-learning">e-learning</a>
        </div>
        <?php endwhile; endif; ?>
    </div>              
<?php get_footer(); ?>
