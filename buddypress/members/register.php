<?php
/**
 * BuddyPress - Members/Blogs Registration forms
 *
 * @since 3.0.0
 * @version 4.0.0
 */

?>

	<?php bp_nouveau_signup_hook( 'before', 'page' ); ?>
	<div class="col-md-12" id="infos-register">
		<h1 class="col-md-12">Inscription à la Communauté du PICKLEBALL</h1>
		<div class="info-text-register col-md-8">
		Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
		</div>
		<div class="col-md-4 img-register">
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/medias/communaute.jpg' ;?>" alt="">
		</div>
	</div>
	<div id="register-page"class="page register-page col-md-12">
		<?php bp_nouveau_template_notices(); ?>

			<?php bp_nouveau_user_feedback( bp_get_current_signup_step() ); ?>

			<form action="" name="signup_form" id="signup-form" class="standard-form signup-form clearfix" method="post" enctype="multipart/form-data">

			<div class="layout-wrap col-md-12 row">

			<?php if ( 'request-details' === bp_get_current_signup_step() ) : ?>

				<?php bp_nouveau_signup_hook( 'before', 'account_details' ); ?>

				<div class="register-section default-profile col-md-12" id="basic-details-section">

					<?php /***** Basic Account Details ******/ ?>

					<h2 class="bp-heading"><?php esc_html_e( 'Account Details', 'buddypress' ); ?></h2>

					<?php bp_nouveau_signup_form(); ?>

				</div><!-- #basic-details-section -->

				<?php bp_nouveau_signup_hook( 'after', 'account_details' ); ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if ( bp_is_active( 'xprofile' ) && bp_nouveau_base_account_has_xprofile() ) : ?>

					<?php bp_nouveau_signup_hook( 'before', 'signup_profile' ); ?>

					<div class="register-section extended-profile col-md-12" id="profile-details-section">

						<h2 class="bp-heading"><?php esc_html_e( 'Profile Details', 'buddypress' ); ?></h2>

						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
						<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

							<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

								<div<?php bp_field_css_class( 'editfield' ); ?>>
									<fieldset>

									<?php
									$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
									$field_type->edit_field_html();

									bp_nouveau_xprofile_edit_visibilty();
									?>

									</fieldset>
								</div>

							<?php endwhile; ?>

						<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

						<?php endwhile; ?>

						<?php bp_nouveau_signup_hook( '', 'signup_profile' ); ?>

					</div><!-- #profile-details-section -->

					<?php bp_nouveau_signup_hook( 'after', 'signup_profile' ); ?>

				<?php endif; ?>

				<?php if ( bp_get_blog_signup_allowed() ) : ?>

					<?php bp_nouveau_signup_hook( 'before', 'blog_details' ); ?>

					<?php /***** Blog Creation Details ******/ ?>

					<div class="register-section blog-details" id="blog-details-section">

						<h2><?php esc_html_e( 'Site Details', 'buddypress' ); ?></h2>

						<p><label for="signup_with_blog"><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1" <?php checked( (int) bp_get_signup_with_blog_value(), 1 ); ?>/> <?php esc_html_e( "Yes, i'd like to create a new site", 'buddypress' ); ?></label></p>

						<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

							<?php bp_nouveau_signup_form( 'blog_details' ); ?>

						</div>

					</div><!-- #blog-details-section -->

					<?php bp_nouveau_signup_hook( 'after', 'blog_details' ); ?>

				<?php endif; ?>

			<?php endif; // request-details signup step ?>

			</div><!-- //.layout-wrap -->

			<?php bp_nouveau_signup_hook( 'custom', 'steps' ); ?>

			<?php if ( 'request-details' === bp_get_current_signup_step() ) : ?>

				<?php if ( bp_signup_requires_privacy_policy_acceptance() ) : ?>
					<?php bp_nouveau_signup_privacy_policy_acceptance_section(); ?>
				<?php endif; ?>

				<div class="buddy-btn-submit col-md-12">
					<?php bp_nouveau_submit_button( 'register' ); ?>
				</div>

			<?php endif; ?>

			</form>

	</div>

	<?php bp_nouveau_signup_hook( 'after', 'page' ); ?>
