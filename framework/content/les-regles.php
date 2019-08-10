<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php  $the_fields = get_fields(); $index = 0; ?>
<?php foreach ($the_fields as $key => $value): ?>

<?php if(!empty($value['titre-regle']) && !empty($value['text-regle']) && !empty($value['img-regle'])) : ?>

<div class="container-fluid regles">  
  <div class="row">
  <?php if(!$index%2): ?>
      <div class="content-image col-sm-6">
        <img src=<?= $value['img-regle']; ?> alt=<?= $value['titre-regle']; ?> class="img-thumbnail" >
      </div>
      <div class="content-text col-sm-6">
        <h2><?= $value['titre-regle']; ?></h2>
        <p><?= $value['text-regle']; ?></p>
      </div>
  
    <?php else : ?>

      <div class="content-text col-sm-6">
        <h2><?= $value['titre-regle']; ?></h2>
        <p><?= $value['text-regle']; ?></p>
      </div>
      <div class="content-image col-sm-6">
        <img src=<?= $value['img-regle']; ?> alt=<?= $value['titre-regle']; ?> class="img-thumbnail" >
      </div>

  <?php endif; ?>

  </div>
</div>

<?php endif; ?>

<?php $index++; endforeach; ?>
<?php endwhile; endif; ?>