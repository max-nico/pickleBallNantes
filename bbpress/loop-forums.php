<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_forums_loop' ); ?>

<ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">
<div class="headertabforum row col-md-12">
		<div class="col-md-7 infotabf">
				FORUM
		</div>
		<div class="col-md-1">  
				<span class="ico_forums">
					<img class="img_ico_forums" src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/icones/icones_sujets.svg'; ?>" alt="icons sujets">
				</span>
			</div>
		<div class="col-md-1">
				<span class="ico_reponses">
					<img class="img_ico_reponses" src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/icones/icones_reponses.svg'; ?>" alt="icons forums">
				</span>
		</div>
		<div class="col-md-2 blocktimer">
				<span class="ico_timer">
					<img class="img_ico_timer" src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/icones/icones_timer.svg'; ?>" alt="icons forums">
				</span>
		</div>
	</div>


	<li class="bbp-body">

		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>

		<?php endwhile; ?>

	</li><!-- .bbp-body -->

	<li class="bbp-footer">

		<div class="tr">
			<p class="td colspan4">&nbsp;</p>
		</div><!-- .tr -->

	</li><!-- .bbp-footer -->

</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' ); ?>

<script type='text/javascript'>
	countforums();
	countTopix('.bbp-forum-status-open .bbp-forum-topic-count', '.circlesujets .countnumbers');
	var childNodes = document.querySelector('.circleresponse').childNodes;
	console.log(childNodes);
	childNodes[1].className = "countnumbers";
	const fChildCircleReplies = document.querySelector('.circleresponse');
	console.log(fChildCircleReplies);
	countTopix('.bbp-forum-status-open .bbp-forum-reply-count', '.circleresponse .countnumbers');
</script>
