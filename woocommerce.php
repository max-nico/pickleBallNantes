<?php get_header(); ?>
<div class="container-fluid" id="boutique-home">
    <div class="row">
        <?php $layout_value = get_theme_mod( 'insomnia_woo_sidebars', 'sidebar-no' ); ?>
        <?php if ($layout_value == 'sidebar-left'): ?>
        <div class="col-lg-12 col-md-12 col col-sm-12 sidebar-left">
            <?php woocommerce_content(); ?>
        </div>
        <?php get_template_part( 'woocommerce/sidebar');?>
        <?php elseif ($layout_value == 'sidebar-right'): ?>
        <div class="col-lg-12 col-md-12 col col-sm-12 sidebar-right">
            <?php woocommerce_content(); ?>
        </div>
        <?php get_template_part( 'woocommerce/sidebar');?>
        <?php else: ?>
        <div class="col-lg-12 col-md-12 col-sm-12 no-sidebar">
            <?php woocommerce_content(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>