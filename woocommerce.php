<?php get_header(); ?>
    <div class="tag_line none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="tag_line_title"><?php woocommerce_page_title() ?></h4>
                    <div class="breadcrumbs"><span><?php esc_html_e( 'You are here:', 'insomnia' ) ?></span> <?php woocommerce_breadcrumb(); ?></div>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid" id="boutique-home">
        <div class="row">
            <?php $layout_value = get_theme_mod( 'insomnia_woo_sidebars', 'sidebar-no' ); ?>
             <?php if ($layout_value == 'sidebar-left'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 sidebar-left">
                    <?php woocommerce_content(); ?>
                </div>
                    <?php get_template_part( 'woocommerce/sidebar');?>
            <?php elseif ($layout_value == 'sidebar-right'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 sidebar-right">
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

    <!--script-- type="text/javascript">
    const categories = document.querySelectorAll('.product-category')
    const products = document.querySelectorAll('.type-product')
    categories.forEach(element => {
        element.classList.remove('col-md-4')
        element.className += " col-lg-12 col-md-12 col-sm-6 text-center"
    });
    products.forEach(el => {
        el.classList.remove('col-md-4')
        el.classList.remove('col-sm-3')
        el.className += " col-lg-12 col-md-12 col-sm-6 text-center"
    });

</!--script-->

<?php get_footer(); ?>