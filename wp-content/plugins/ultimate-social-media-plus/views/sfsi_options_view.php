<!-- Loader Image section  -->
<div id="sfpluspageLoad">

</div>
<!-- END Loader Image section  -->
<!-- javascript error loader  -->
<div class="error" id="sfsi_onload_errors" style="margin-left: 60px;display: none;">
    <p>
        <?php _e('We found errors in your javascript which may cause the plugin to not work properly. Please fix the error:', 'ultimate-social-media-plus'); ?>
    </p>
    <p id="sfsi_jerrors"></p>
    <div id="cron_errors" style="display:none">
        <?php echo '<pre>';
        print_r(_get_cron_array());
        echo '</pre>'; ?>
    </div>
</div>
<!-- END javascript error loader  -->

<!-- START Admin view for plugin-->
<div class="wapper sfsi_mainContainer">

    <?php sfsi_plus_language_notice(); ?>
    <?php sfsi_plus_addThis_removal_notice(); ?>
    <!-- Get notification bar-->
    <?php if (get_option("sfsi_plus_show_notification") == "yes") { ?>

        <script>
            jQuery(document).ready(function(e) {
                jQuery(".sfsi_plus_show_notification").click(function() {
                    SFSI.ajax({
                        url: sfsi_plus_ajax_object.ajax_url,
                        type: "post",
                        data: {
                            action: "sfsiPlus_notification_read",
                            nonce: "<?php echo wp_create_nonce('plus_notification_read'); ?>"
                        },
                        success: function(msg) {
                            if (msg == 'success') {
                                jQuery(".sfsi_plus_show_notification").hide("fast");
                            }
                        }
                    });
                });
            });
        </script>
        <style>
            .sfsi_plus_show_notification {
                margin-bottom: 45px;
                padding: 12px 13px;
                width: 98%;
                background-image: url(<?php echo SFSI_PLUS_PLUGURL ?>images/notification-close.png);
                background-position: right 20px center;
                background-repeat: no-repeat;
                cursor: pointer;
                text-align: center;
            }
        </style>
        <!-- <div class="sfsi_plus_show_notification" style="background-color: #38B54A; color: #fff; font-size: 18px;">
        <?php  //_e( 'New: You can now also show a subscription form on your the site, increasing sign-ups! (Question 8)', 'ultimate-social-media-plus');
            ?>
        <p>
			(<?php  //_e('If question 8 gets displayed in a funny way then please reload the page by pressing Control+F5(PC) or Command+R(Mac)','ultimate-social-media-plus');
                    ?>)
        </p>
    </div> -->
    <?php } ?>
    <!-- Get notification bar-->
    <div class="sfsi_plus_notificationBannner"></div>

    <!-- Top content area of plugin -->
    <div class="main_contant">
        <div class="row">
            <div class="col-7 col-md-9 col-lg-12">
                <h1><?php _e('Welcome to the Ultimate Social Media Icons PLUS plugin!', 'ultimate-social-media-plus'); ?></h1>

                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xxl-10">
                            <p class='sfsi-top-header-subheading font-italic'> <?php _e('Simply answer the questions below', 'ultimate-social-media-plus'); ?> <span class='sfsi-top-banner-no-decoration'><?php _e('(at least the first 3)', 'ultimate-social-media-plus'); ?></span><?php _e((' - that`s it!'), 'ultimate-social-media-plus'); ?></p>
                            <p class=""><?php _e('If you face any issue, please ask in', 'ultimate-social-media-plus'); ?> <a target="_blank" href="http://bit.ly/USM_SUPPORT_FORUM" class="sfsi-top-banner-no-decoration text-success"><?php _e('Support Forum', 'ultimate-social-media-plus'); ?></a><?php _e('. We\'ll try to respond quickly. Thank you!', 'ultimate-social-media-plus'); ?></p>
                            <div class="d-none d-lg-flex row">
                                <div class="col-9 col-xxl-10">
                                    <p class="sfsi-top-banner-higligted-text">
                                        <?php _e('If you want ', 'ultimate-social-media-plus'); ?>
                                        <span class='font-weight-bold font-italic'><?php _e('more likes & shares', 'ultimate-social-media-plus'); ?></span><?php _e(', more placement options, better sharing features (eg: define the text and image that gets shared), optimization for mobile, ', 'ultimate-social-media-plus'); ?><a target="_blank" href="https://www.ultimatelysocial.com/extra-icon-styles/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class="font-italic text-success" style="font-family: helvetica-light;"><?php _e('more icon design styles,', 'ultimate-social-media-plus'); ?></a>
                                        <a target="_blank" href="https://www.ultimatelysocial.com/animated-social-media-icons/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class=" text-success font-italic" style="font-family:helvetica-light">
                                            <?php _e('animated icons,', 'ultimate-social-media-plus'); ?>
                                        </a>
                                        <a target="_blank" href="https://www.ultimatelysocial.com/themed-icons-search/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class=' text-success font-italic' style="font-family: helvetica-light;">
                                            <?php _e('themed icons,', 'ultimate-social-media-plus'); ?>
                                        </a>
                                        <?php _e(' and', 'ultimate-social-media-plus'); ?>
                                        <a href="https://www.ultimatelysocial.com/themed-icons-search/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank" class=" text-success font-italic" style="font-family: helvetica-light;"><?php _e('much more', 'ultimate-social-media-plus'); ?></a><?php _e(', then ', 'ultimate-social-media-plus'); ?><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" style="cursor:pointer; color: #12a252 !important;text-decoration: none;font-weight: bold;border-bottom: 1px solid #12a252;" target="_blank"><?php _e('go premium', 'ultimate-social-media-plus'); ?></a>.</p>
                                </div>
                                <div class="col-3 text-center px-0 col-xxl-2">
                                    <div class='d-table' style='width:100%;height:100%'>
                                        <div class='d-table-row'>
                                            <div class='d-table-cell align-middle'>
                                                <div class='sfsi-premium-btn'>
                                                    <a target="_blank" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class="btn btn-success" style="font-family:helveticabold;font-size: 17px;text-decoration: none;"><?php _e('Go Premium', 'ultimate-social-media-plus'); ?></a>
                                                </div>
                                                <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" style="text-decoration: none;color:#414951;font-family: helveticaneue-light;" target='_blank'><?php _e('Learn More', 'ultimate-social-media-plus'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-flex col-4 col-lg-4 col-xxl-2">
                            <div class='d-table' style='width:100%;height:100%'>
                                <div class='d-table-row'>
                                    <div class='d-table-cell align-bottom'>
                                        <a href="https://www.ultimatelysocial.com/usm-premium/?playvideo=1&utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank"><img target="_blank" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/sfsi-video-play.png" style='width:100%'></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 col-md-3 d-lg-none">
                <div style="position:relative;padding-top:56.25%;">
                    <iframe src="https://video.inchev.com/videos/embed/c952d896-34be-45bc-8142-ba14694c1bd0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                </div>
                <div class="text-center mt-5">
                    <div class='sfsi-premium-btn'>
                        <button class="btn btn-success "><?php _e('Go Premium', 'ultimate-social-media-plus'); ?></button>
                    </div>
                    <span><?php _e('Learn more', 'ultimate-social-media-plus'); ?></span>
                </div>
            </div>
        </div>
        <div class="d-lg-none row">
            <div class="col">
                <p class="sfsi-top-banner-higligted-text"><?php _e('If you want ', 'ultimate-social-media-plus'); ?><span class='font-weight-bold font-italic'><?php _e('more likes & shares', 'ultimate-social-media-plus'); ?></span><?php _e(', more placement options, better sharing features (eg: define the text and image that gets shared), optimization for mobile, ', 'ultimate-social-media-plus'); ?><a target="_blank" href="https://www.ultimatelysocial.com/extra-icon-styles/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class="font-italic text-success"><?php _e('more icon design styles,', 'ultimate-social-media-plus'); ?></a> <a target="_blank" href="https://www.ultimatelysocial.com/animated-social-media-icons/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" class=" text-success font-italic"><?php _e('animated icons,', 'ultimate-social-media-plus'); ?></a> <a target="_blank" href="https://www.ultimatelysocial.com/themed-icons-search/" class=' text-success font-italic'><?php _e('themed icons,', 'ultimate-social-media-plus'); ?></a> <?php _e('and', 'ultimate-social-media-plus'); ?> <a href="https://www.ultimatelysocial.com/themed-icons-search/?utm_source=usmplus_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank" class=" text-success font-italic"><?php _e('much more', 'ultimate-social-media-plus'); ?></a><?php _e(', then ...', 'ultimate-social-media-plus'); ?></p>
            </div>
        </div>
    </div><!-- END Top content area of plugin -->

    <!-- step 1 end  here -->
    <div id="accordion">
        <h3><span>1</span>
            <?php _e('Which icons do you want to show on your site?', 'ultimate-social-media-plus'); ?>
        </h3>
        <!-- step 1 end  here -->
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view1.php'); ?>
        <!-- step 1 end here -->

        <!-- step 2 start here -->
        <h3><span>2</span>
            <?php _e('What do you want the icons to do?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view2.php'); ?>
        <!-- step 2 END here -->

        <!-- step new 3 start here -->
        <h3><span>3</span>
            <?php _e('Where shall they be displayed?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view8.php'); ?>
        <!-- step new3 end here -->
    </div>
    <h2 class="optional">
        <?php _e('Optional', 'ultimate-social-media-plus'); ?>
    </h2>
    <div id="accordion1">
        <!-- step old 3 start here -->
        <h3><span>4</span>
            <?php _e('What design and animation do you want to give your icons?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view3.php'); ?>
        <!-- step old 3 END here -->

        <!-- step old 4 Start here -->
        <h3><span>5</span>
            <?php _e('Do you want to display "counts" next to your main icons?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view4.php'); ?>
        <!-- step old 4 END here -->

        <!-- step old 5 Start here -->
        <h3 class="sfsiplus_tifm_module_menu_block"><span>6</span>
            <?php _e('Any other wishes for your main icons?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view5.php'); ?>
        <!-- step old 5 END here -->

        <!-- step old 6 Start here (this is older and newer is added as 8 at question 3) -->
        <!--<h3><span>7</span>Do you want to display icons at the end of every post?</h3>-->
        <?php //include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view6.php');
        ?>
        <!-- step old 6 END here -->

        <!-- step old 7 Start here -->
        <h3><span>7</span>
            <?php _e('Do you want to display a pop-up, asking people to subscribe?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view7.php'); ?>
        <!-- step old 7 END here -->

        <!-- step old 8 Start here -->
        <h3><span>8</span>
            <?php _e('Do you want to show a subscription form (increases sign ups)?', 'ultimate-social-media-plus'); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view9.php'); ?>
        <!-- step old 8 END here -->

        <!-- step old 9 Start here -->
        <h3><span>9</span>
            <?php _e( 'Get advice for more shares & traffic (FREE!)', 'ultimate-social-media-plus' ) ?></h3>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_option_view10.php'); ?>
        <!-- step old 9 END here -->

    </div>

    <div class="tab10">
        <div class="save_export">
            <div class="save_button">

                <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
                <a href="javascript:;" id="save_plus_all_settings" title="Save All Settings">
                    <?php _e('Save All Settings', 'ultimate-social-media-plus'); ?>
                </a>
            </div>
            <?php $nonce = wp_create_nonce("sfsi_plus_save_export"); ?>

            <div class="export_selections">
                <div class="export" id="sfsi_plus_save_export" data-nonce="<?php echo $nonce; ?>">
                    <?php _e('Export', 'ultimate-social-media-plus'); ?>
                </div>

                <div style="font-size: 20px;"><?php _e('selections', 'ultimate-social-media-plus'); ?></div>

            </div>
        </div>
        <p class="red_txt errorMsg" style="display:none"> </p>
        <p class="green_txt sucMsg" style="display:none;font-size:21px"> </p>


        <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_section_for_premium.php'); ?>

        <p style="margin-top: 10px;clear: both;display:none">

            <?php $nonce = wp_create_nonce("plus_worker_plugin"); ?>
            <?php _e('Install Premium Plugin.', 'ultimate-social-media-plus'); ?>
            <a href="javascript:;" id="sfsi_plus_worker_plugin" title="Save" data-nonce="<?php echo $nonce; ?>" data-plugin-list-url="<?php echo  admin_url('admin.php?page=sfsi-installer-options'); ?>">
                <?php _e('here', 'ultimate-social-media-plus'); ?>
            </a>
        </p>
        <!--<p class="bldtxtmsg">
         	<?php _e('Need top-notch Wordpress development work at a competitive price?', 'ultimate-social-media-plus'); ?>
         	<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmplus_settings_page&utm_campaign=footer_credit&utm_medium=banner">
        		<?php _e('Visit us on ultimatelysocial.com', 'ultimate-social-media-plus'); ?>
         	</a>
         </p>-->
        <?php
        /*$tra_lan = get_bloginfo( 'language' );
             if($tra_lan == "en-US" )
             {}
             else
             {
                 ?>
                 <p class="translatelilne">
                    <?php  _e( 'The plugin was translated by (your name). Need translation work to get done? Contact (your name) at (your email)', 'ultimate-social-media-plus' ); ?>
                 </p>
                <?php
            }*/
        ?>
    </div>
    <?php $nonce = wp_create_nonce("sfsi_plus_install_newsletter"); ?>

    <!-- <div>
        <button type="button" id="sfsi_plus_install_newsletter" data-nonce="<?php echo $nonce; ?>">
            <?php // _e('Install Newsletter', 'ultimate-social-media-plus');
            ?>
        </button>
    </div> -->
    <!-- all pops of plugin under sfsi_pop_content.php file -->
    <?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_pop_content.php'); ?>
</div>

<!-- START Admin view for plugin-->
<script>
    var e = {
        action: "sfsiplusbannerOption",
        'nonce': '<?php echo wp_create_nonce('plus_sfsiplusbannerOption'); ?>',
    };

    jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: "post",
        data: e,
        success: function(e) {
            if (e !== '["wrong_nonce"]') {
                jQuery(".sfsi_plus_notificationBannner").html(e);
            } else {}
        }
    });
</script>

<?php include(SFSI_PLUS_DOCROOT . '/views/sfsi_chat_on_admin_pannel.php'); ?>

<?php
  echo "<br /><br /><br />";
  do_action('ins_global_print_carrousel');
?>
