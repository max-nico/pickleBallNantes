<div class="container-fluid wrap-content page-404">
          <h1 class="error-404"><span><?php esc_html_e( 'Oops, 404 Error', 'insomnia' ); ?></span></h3>
          <!-- <div class="content-404">
            <p>
              <?php //esc_html_e( 'It seems I can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'insomnia' ); ?>
            </p>
          </div>.entry-content -->
          <canvas id="canvas"></canvas>
          <img src="../../sitepickleBallNantes/wp-content/themes/pickleball/assets/images/ball.svg" alt="ball" id="ball">
        </div>
        <script>
        const container =  document.querySelector('.main-content .container');
        const nav = document.querySelector('nav');
        nav.remove()
        container.classList.remove('container')
        container.classList.add('container-fluid')
        
        </script>
        <script src="../../sitepickleBallNantes/wp-content/themes/pickleball/assets/js/picklepong.js" type="module"></script>

        <style>
            .content-wrap {
                padding-top: 0!important;
            }
        </style>