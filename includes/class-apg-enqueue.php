<?php if ( ! defined( 'ABSPATH' ) ) exit;
if( ! class_exists('APG_Enqueue')){


  class APG_Enqueue {



    function __construct(){

      add_action('wp_enqueue_scripts', array( $this , 'apg_enqueue_styles_n_scripts') );

      add_action('admin_enqueue_scripts', array( $this , 'admin_enqueue') );

    }


    function apg_enqueue_styles_n_scripts()
    {
       wp_enqueue_style('apg-main',APG_URL.'assets/css/apg.css');
       wp_enqueue_style('apg-fancybox-css',APG_URL.'assets/css/apg-fancybox.css');
       wp_enqueue_style('apg-apgsl-css',APG_URL.'assets/css/apgsl.css');
       wp_enqueue_style('apg-apgsl-theme-css',APG_URL.'assets/css/apgsl-theme.css');

       wp_enqueue_script('jquery');

       wp_enqueue_script( 'apg-masonry','https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js',['jquery'], '1.0', true );
      
       wp_enqueue_script( 'apg-apgsl',APG_URL.'assets/js/apgsl.min.js',['jquery'], '1.8.0', true );
      
       wp_enqueue_script( 'apg-script',APG_URL.'assets/js/scripts.js',['jquery','apg-masonry'], '1.0', true );

       wp_enqueue_script( 'apg-fancybox-js',APG_URL.'assets/js/apg-fancybox.js',['jquery'], '3.0.47', true );

    }


    function admin_enqueue() {

      wp_enqueue_media();

      wp_enqueue_script('jquery');

      wp_enqueue_style('apg-gallery-metabox-css',APG_URL.'/assets/css/gallery-metabox.css');

    }



  } // end class


}
