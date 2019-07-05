   <div class="container-fluid main-forums">
       <?php $forum_page=is_archive('forums') ;?>
        <?php if ($forum_page) {?>
            <div class="row-fluid col-lg-12 justify-content-center ">
                <?php get_template_part( 'framework/content/forums/forums-header'); ?>
            </div>
        

        <div class="row-fluid col-lg-12 justify-content-center blockinfosforums ">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 forum-block" id="forumscountblock">
                    <div class="roundboxforums circleforum">
                    <div class="countnumbers" id="countForums">

                    </div>
                    <div class="bbp-forum-topic-count titlecount"><?php echo _e( 'Forums', 'bbpress' ); ?>
                    </div>
                        <span class="iconforum">
                      <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/post.svg'; ?>" alt="icons forums">
                    </span>
            </div>
        </div>        
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 forum-block" id="sujetscountblock">
                <div class="roundboxforums circlesujets">
                <div class="countnumbers"><?php bbp_forum_topic_count(); ?>
                </div>
                <div class="bbp-forum-topic-count titlecount"><?php _e( 'Topics', 'bbpress' ); ?>
                </div>
                    <span class="iconsujets">
                    <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/topics.svg'; ?>" alt="icons topics">
                    </span>
                </div>
                
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 forum-block" id="responsescountblock">
                <div class="roundboxforums circleresponse">

                <div><?php // bbp_forum_replies_count(); ?>
                </div>
                <div class="bbp-forum-topic-count titlecount"><?php echo _e( 'Reponses', 'bbpress' ); ?>
                </div>
                    <span class="iconresponse">
                    <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/replies.svg'; ?>" alt="icons responses">
                    </span>
                </div>
            </div>
        </div>
        <?php }; ?>
    </div>
    