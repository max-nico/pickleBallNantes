<?php get_header(); ?>
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container-full learning">
        <div class="row">
        <?php if(!empty($value['main_video'])) : ?>
            <?= $value['main_video'];?>
            <a href="<?php get_permalink($post, $leavename) ?>" class="btn-danger btn-e-learning">Nous rejoindre</a>
        <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>              
<?php get_footer(); ?>
