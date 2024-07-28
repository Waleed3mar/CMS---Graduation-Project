<?php

namespace Divi_Essential\Includes;

defined( 'ABSPATH' ) || die();

class AssetsManager {

        public function __construct(){

        add_action('wp_enqueue_scripts', array($this, 'dnxte_enqueue_assets'));

        add_action('wp_enqueue_scripts', array($this, 'dnxte_enqueue_style_for_builder'));
        
        // Divi Theme Builder
        add_action('admin_enqueue_scripts', array($this, 'dnxte_admin_enqueue_assets'));

        add_action('plugins_loaded', array($this, 'i18n'));
    }

    public function get_module_styles() {
            return array(
                'dnext_divider' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextDivider/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_magnifier' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextImageMagnifier/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_reveal' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextImageReveal/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_lottie' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextLottie/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_thumbs_gallery' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextThumbsGallery/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_thumbs_gallery_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextThumbsGalleryChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_tooltip' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNextTooltip/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_3d_cube_slider' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxte3dCubeSlider/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_3d_cube_slider_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxte3dCubeSliderChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_business_hour' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteBusinessHour/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_coverflow_slider' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteCoverflowSlider/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_coverflow_slider_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteCoverflowSliderChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_feature_list' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteFeatureList/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_floating_element' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteFloatingElement/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_price_list' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtePriceList/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_price_list_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtePriceListChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_promobox' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtePromobox/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_testimonial' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxteTestimonial/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_flipbox' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtFlipbox/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_logo_carousel' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtLogoCarousel/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_logo_carousel_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtLogoCarouselChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_person' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtPerson/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_person_item' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'DiviNxtPersonItem/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_3d_flipbox' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'Next3dFlipbox/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_advanced_tab' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextAdvancedTab/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_before_after' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextBeforeAfter/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_blog_slider' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextBlogSlider/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_blurb' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextBlurb/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_button' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextButton/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_circular_image_hover' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextCircularImageHover/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_comment' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextComment/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_content_toggle' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextContentToggle/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_dual_button' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextDualButton/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_embedded_post' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextEmbeddedPost/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_embedded_video' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextEmbeddedVideo/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_gradient_text' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextGradientText/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_accordion' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextImageAccordion/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_hover_box' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextImageHoverBox/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_icon' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextImageIcon/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_image_scroll' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextImageScroll/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_masonry' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextMasonary/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_mega_image_effect' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextMegaImageEffect/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_minimal_image_hover' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextMinimalImageHover/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_multi_heading' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextMultiHeading/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_rating' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextRating/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_review' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextReview/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_step_flow' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextStepFlow/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_creative' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamCreative/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_creative_item' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamCreativeItem/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_overlay' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamOverlay/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_overlay_item' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamOverlayItem/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_overlay_card' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamOverlayCard/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_overlay_card_item' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamOverlayCardItem/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_social_reveal' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamSocialReveal/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_team_social_reveal_child' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTeamSocialRevealChild/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_animation' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextAnimation/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_color_motion' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextColorMotion/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_divider' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextDivider/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_glitch' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextGlitch/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_highlight' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextHighlight/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_hover_highlight' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextHoverHighlight/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_mask' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextMask/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_stroke' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextStroke/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_stroke_motion' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextStrokeMotion/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_text_tilt' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTextTilt/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_timeline' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTimeline/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                // 'dnext_timeline_child' => array(
                //     'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTimelineChild/style.css',
                //     'version'           =>  DIVI_ESSENTIAL_VERSION,
                //     'enqueue'           =>  false
                // ),
                'dnext_twitter_tweet' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextTwitterTweet/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
                'dnext_ultimate_image_hover' => array(
                    'src'               =>  DIVI_ESSENTIAL_ICON . 'NextUltimateImageHover/style.css',
                    'version'           =>  DIVI_ESSENTIAL_VERSION,
                    'enqueue'           =>  false
                ),
            );
    }

    public function get_styles() {
        return array(
            'dnext_reveal_animation'         =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/reveal-animation.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_hvr_common_css'      =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/hover-common.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_ad_tab_effects'      =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/ad-tab-effects.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_msnary_hvr_css'  => array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/msnary-hvr-css.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_msnary_filterbar_css'  => array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/msnary-filterbar.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_twentytwenty_css'    =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/twentytwenty.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_swiper-min-css'          =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/swiper.min.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_magnify_css'         =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/magnify.min.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
            'dnext_magnific_popup'  =>  array(
                'src'               =>  DIVI_ESSENTIAL_ASSETS . 'css/magnific-popup.css',
                'version'           =>  DIVI_ESSENTIAL_VERSION,
                'enqueue'           =>  false
            ),
        );
    }

    public function get_scripts() {
        return array(
            'dnext_wow-public'      =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/wow.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_wow-activation'      =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/wow-activation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array(),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_svg_shape_frontend'   =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/shape.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_swiper_frontend'      =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/swiper.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnxt_divinexttexts-public'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxt-text-animation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnxtblrb_divinextblurb-public'       =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/vanilla-tilt.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_bodymovin'   =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/bodymovin.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_magnific_popup'   =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/magnific-popup.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_coverflow_lightbox'   =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/coverflow_lightbox.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_isotope'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/isotope.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_imagesloaded'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/imagesloaded.pkgd.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_magnifier'   =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/magnify.min.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            ),
            'dnext_facebook_sdk'=>  array(
                'src'           =>  "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0",
                'version'       =>  '',
                'deps'          =>  '',
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_twitter_widgets'     =>  array(
                'src'           =>  "https://platform.twitter.com/widgets.js",
                'version'       =>  '',
                'deps'          =>  '',
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_event_move'  =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/event-move.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_twentytwenty_js'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/twentytwenty.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_logo_carousel'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.logoCarousel.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_coverflow_slider'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.coverflowSlider.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_3dcube_slider'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.cubeSlider.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_thumbs_gallery'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.thumbsGallery.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_testimonial_slider'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.testimonialSlider.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_blog_slider'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.blogSlider.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_lottie_activation'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.lottieActivation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_comparison_slide'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.comparisonSlide.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_twitter_activation'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.twitterActivation.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_hotspot_position'=>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/dnxte.hotspotPosition.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  true
            ),
            'dnext_scripts-public'     =>  array(
                'src'           =>  DIVI_ESSENTIAL_ASSETS . 'js/scripts.js',
                'version'       =>  DIVI_ESSENTIAL_VERSION,
                'deps'          =>  array( 'jquery' ),
                'enqueue'       =>  false,
                'piroty'        =>  false
            )
        );
    }

    private function enqueue_styles_loop($styles) {
        foreach ($styles as $handle => $style ) {
            $deps       = isset( $style['deps'] ) ? $style['deps']  : false;
            if ( $style['enqueue'] ) {
                wp_enqueue_style(   $handle, $style['src'], $deps, $style['version'] );
            }elseif ( $style['enqueue'] == false ) {
                wp_register_style(  $handle, $style['src'], $deps, $style['version'] );
            }
        }
    }
    public function dnxte_enqueue_assets() {
        $styles     = $this->get_styles();
        $scripts    = $this->get_scripts();
        $module_styles = $this->get_module_styles();

        $this->enqueue_styles_loop($styles);
        $this->enqueue_styles_loop($module_styles);

        foreach ($scripts as $handle => $script ) {
            $deps   = isset( $script['deps'] ) ? $script['deps']  : false;

            if ( $script['enqueue'] ) {
                wp_enqueue_script(  $handle, $script['src'], $deps, $script['version'], $script['piroty'] );
            }elseif ( $script['enqueue'] == false ) {
                wp_register_script(  $handle, $script['src'], $deps, $script['version'], $script['piroty'] );
            }
        }

        if((isset($_GET['et_fb']) && sanitize_text_field($_GET['et_fb']) == '1') || (isset( $_GET['page']) && 'et_theme_builder' === $_GET['page'])): // phpcs:ignore
            $src = DIVI_ESSENTIAL_URL . '/styles/builder-style.min.css';
            wp_enqueue_style('dnext_builder',$src, array(), null, 'all');
        endif;
    }

    // Divi Theme Builder
    public function dnxte_admin_enqueue_assets() {

        wp_verify_nonce('dnext_admin_module_css');

        global $pagenow;

        if (("admin.php" === $pagenow) && (isset($_GET['page']) && 'et_theme_builder' === $_GET['page'])) {
            $src = plugin_dir_url(__FILE__) . '../styles/admin-module.css';
            wp_enqueue_style('dnext_admin_module_css', $src, array(), DIVI_ESSENTIAL_VERSION, 'all');
        }
    }

    public function dnxte_enqueue_style_for_builder(){
        if ( function_exists( 'et_core_is_fb_enabled' ) ) {
			if ( et_core_is_fb_enabled() ) {
                $src = plugin_dir_url(__FILE__) . '../assets/admin/css/admin.css';
				wp_enqueue_style( 'dnext_admin_module_css_for_builder', $src, array(), DIVI_ESSENTIAL_VERSION, 'all' );
			}
		}
    }

    public function i18n(){
        load_plugin_textdomain( 'dnxte-divi-essential',false ,plugin_dir_path(__FILE__) . '/languages/');
    }
}