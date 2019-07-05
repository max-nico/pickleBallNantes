<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">

	<div class="headertabforum col-md-12">
		<div class="col-md-5 infotabf">FORUM</div>
			<div class="col-md-2">  
				<span class="iconforum">
					<img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/icones/icones_sujets.svg'; ?>" alt="icons sujets">
				</span>
			</div>
		<div class="col-md-2">
				<span class="iconforum">
					<img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/icones/icones_reponses.svg'; ?>" alt="icons forums">
				</span>
		</div>
		<div class="col-md-3">TEMPS</div>
	</div>

	<?php if ( bbp_allow_search() ) : ?>

		<div class="bbp-search-form">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

		</div>

	<?php endif; ?>

	<?php bbp_breadcrumb(); ?>

	<?php bbp_forum_subscription_link(); ?>

	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>

		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>
