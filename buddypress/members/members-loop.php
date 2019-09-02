<?php
/**
 * BuddyPress - Members Loop
 *
 * @since 3.0.0
 * @version 3.0.0
 */

bp_nouveau_before_loop(); ?>

<?php if ( bp_get_current_member_type() ) : ?>
	<p class="current-member-type"><?php bp_current_member_type_message(); ?></p>
<?php endif; ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<?php bp_nouveau_pagination( 'top' ); ?>

	<ul id="members-list" class="<?php bp_nouveau_loop_classes(); ?>">

	<?php while ( bp_members() ) : bp_the_member(); ?>

		<li <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-id="<?php bp_member_user_id(); ?>" data-bp-item-component="members">
			<div class="list-wrap">

				<div class="item-avatar">
					<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar( bp_nouveau_avatar_args() ); ?></a>
				</div>

				<div class="item">

					<div class="item-block">

						<h2 class="list-title member-name">
							<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
						</h2>
						<div>HELLO</div>
							<!--Show fields in members loop-->
						<?php $value = xprofile_get_field( 522, bp_get_member_user_id(), true ); ?>
								<?php $value = $value->data->value; ?>
									<?php if ( $value ) : ?>
										<p class="item-details niveau-pickle"><?php echo $value; ?></p><!-- #item-details -->
									<?php endif; ?>
						<?php $value = xprofile_get_field( 521, bp_get_member_user_id(), true ); ?>
								<?php $value = $value->data->value; ?>
									<?php if ( $value ) : ?>
										<p class="item-details name"><?php echo $value; ?></p>
										<!-- #item-details -->
									<?php endif; ?>
						<?php $value = xprofile_get_field( 531, bp_get_member_user_id(), true ); ?>
								<?php $value = $value->data->value; ?>
									<?php if ( $value ) : ?>
										<p class="item-details club"> <?php echo $value; ?></p><!-- #item-details -->
									<?php endif;/* ?>
						<?php $value = xprofile_get_field( 25, bp_get_member_user_id(), true ); ?>
								<?php $value = $value->data->value; ?>
									<?php if ( $value ) : ?>
										<p class="item-details infotéléphone2"><span class="infosmembers">Téléphone mobile :</span><?php echo '</br>' . $value; ?></p><!-- #item-details -->
									<?php endif; ?>

						<?php $value = xprofile_get_field( 14, bp_get_member_user_id(), true ); ?>
								<?php $value = $value->data->value; ?>
									<?php if ( $value ) : ?>
										<p class="item-details email"><?php echo $value; ?></p><!-- #item-details -->
									<?php endif; */?>
						<!-- end of show details-->
						<?php if ( bp_nouveau_member_has_meta() ) : ?>
							<p class="item-meta last-activity">
								<?php bp_nouveau_member_meta(); ?>
							</p><!-- #item-meta -->
						<?php endif; ?>

						<?php
						bp_nouveau_members_loop_buttons(
							array(
								'container'      => 'ul',
								'button_element' => 'button',
							)
						);
?>

					</div>

					<?php if ( bp_get_member_latest_update() && ! bp_nouveau_loop_is_grid() ) : ?>
					<div class="user-update">
						<p class="update"> <?php bp_member_latest_update(); ?></p>
					</div>
						<?php endif; ?>

				</div><!-- // .item -->



			</div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php bp_nouveau_pagination( 'bottom' ); ?>

<?php
else :

	bp_nouveau_user_feedback( 'members-loop-none' );

endif;
?>

<?php bp_nouveau_after_loop(); ?>
