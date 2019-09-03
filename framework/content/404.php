<div class="container-fluid wrap-content page-404">
          <h1 class="error-404"><span><?php esc_html_e( 'Oops, 404 Error', 'insomnia' ); ?></span></h3>
          <!-- <div class="content-404">
            <p>
              <?php //esc_html_e( 'It seems I can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'insomnia' ); ?>
            </p>
          </div>.entry-content -->
          <canvas id="canvas"></canvas>
        </div>
        <img src="../../sitepickleBallNantes/wp-content/themes/pickleball/assets/images/ball.svg" alt="ball" id="ball">
        <p id="scorep1"></p>
        <p id="scorep2"></p>
        <div class="icones">
        <a id="_404ToHome" href="https://nicolas.dev18.nte.ovh/sitepickleBallNantes/"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a id="_404ToForum" href="https://nicolas.dev18.nte.ovh/sitepickleBallNantes/forums/"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
      </div>
        <script>
          const container =  document.querySelector('.main-content .container');
        const nav = document.querySelector('nav');
        nav.remove()
        container.classList.remove('container')
        container.classList.add('container-fluid')
        
        </script>
        <script src="../../sitepickleBallNantes/wp-content/themes/pickleball/assets/js/picklepong.min.js" type="module"></script>

        <style>
            .content-wrap {
              padding-top: 0!important;
            }
            </style>