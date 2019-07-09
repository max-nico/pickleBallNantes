<link rel="stylesheet" href="../wp-content/themes/pickleball/css/swiper.min.css">
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php  $the_fields = get_fields(); ?>
<?php foreach ($the_fields as $key => $value): ?>
<?php if(!empty($value['le_titre'])) : ?>
<div class="block-learning"?>
    <div class="field-learning">
        <h2><?= $value['le_titre']; ?></h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php for ($i=0; $i <= 4; $i++) : ?>
                        <?php if(!empty($value["video_$i" ])) : ?>
                            <div class="swiper-slide"><?= $value["video_$i" ]; ?></div>
                        <?php else : ?>
                            <!--nothing  -->
                        <?php endif;?>
                    <?php endfor; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endwhile; endif; ?>

  <!-- Swiper JS -->
  <script src=" ../wp-content/themes/pickleball/assets/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var appendNumber = 4;
    var prependNumber = 3;
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 2,
      centeredSlides: false,
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        type:'progressbar'
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    document.querySelector('.prepend-2-slides').addEventListener('click', function (e) {
      e.preventDefault();
      swiper.prependSlide([
        '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>',
        '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>'
        ]);
    });
    document.querySelector('.prepend-slide').addEventListener('click', function (e) {
      e.preventDefault();
      swiper.prependSlide('<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>');
    });
    document.querySelector('.append-slide').addEventListener('click', function (e) {
      e.preventDefault();
      swiper.appendSlide('<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>');
    });
    document.querySelector('.append-2-slides').addEventListener('click', function (e) {
      e.preventDefault();
      swiper.appendSlide([
        '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>',
        '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>'
        ]);
    });
  </script>