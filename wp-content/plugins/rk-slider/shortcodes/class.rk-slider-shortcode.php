<?php

if( ! class_exists( 'RK_Slider_Shortcode') ){
    class RK_Slider_Shortcode{
        public function __construct(){
            add_shortcode('rk_slider', array($this, 'add_shortcode') );
        }

        public function add_shortcode($atts=array(),$content=null,$tag=''){
            $atts=array_change_key_case( (array) $atts, CASE_LOWER );
             
            extract( shortcode_atts(
                array(
                    'id'=>'',
                    'orderby'=>'date'
                ),
                $atts,
                $tag
            ));

            if(!empty($id)){
                $id = array_map('absint', explode(',', $id)); 
            }
            ob_start();
            require( RK_SLIDER_PATH . 'views/rk-slider_shortcode.php' );
            return ob_get_clean();
        }
    }    

}
