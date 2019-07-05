<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $the_fields = array('section_1','section_2' ,'section_3' ,'section_4', 'section_5', 'section_6', 'section_7', 'section_8'); ?>
<?php foreach ($the_fields as $key => $value): ?>
<div class="block-learning">
    <div class="field-learning">
        <?php the_field($value); ?>
    </div>
    <div class="carousel-arrow">
        <button class="left-arrow"><</button> 
    </div>
    <button class="right-arrow">></button>
</div>
    <?php endforeach; ?>
<?php endwhile; endif; ?>
