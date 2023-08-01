<?php
 if(!class_exists( 'RK_slider_Post_Type')){
    class RK_slider_Post_Type{
        function __construct(){
            add_action('init', array($this, 'create_post_type'));
            add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
            add_action('save_post', array($this, 'save_post'));
            add_filter('manage_rk-slider_posts_columns', array($this, 'rk_slider_cpt_columns'));
            add_action('manage_rk-slider_posts_custom_column', array($this, 'rk_slider_custom_columns'),10,2);
            add_filter('manage_edit-rk_slider_sortable_columns', array($this, 'rk_slider_sortable_columns'));
        }

        public function create_post_type(){
            register_post_type(
                'rk-slider',
                array(
                    'label'=>'Slider',
                    'description'=>'Sliders',
                    'labels'=>array(
                        'name'=>'Sliders',
                        'singular_name'=>'Slider'
                    ),
                    'public' => true,
                    'supports'=> array('title', 'editor', 'thumbnail'),
                    'hierarchical'=> false,
                    'show_ui'=> true,
                    'show_in_menu'=> false,
                    'menu_position'=>5,
                    'show_in_admin_bar'=>true,
                    'show_in_nav_menus'=>true,
                    'can_export'=>true,
                    'has_archive'=>false,
                    'exclude_from_search'=>false,
                    'publicly_queryable'=>true,
                    'show_in_rest'=>true,
                    'menu_icon'=>'dashicons-images-alt2'

                )
            );
        }

        public function rk_slider_cpt_columns($columns){
            $columns['rk_slider_link_text'] = esc_html__('Link Text', 'rk-slider');
            $columns['rk_slider_link_url'] = esc_html__('Link URL', 'rk-slider');
            return $columns;
        }

        public function rk_slider_custom_columns($column, $post_id){
            switch($column){
                case 'rk_slider_link_text':
                    echo esc_html(get_post_meta( $post_id, "rk_slider_link_text" , true));
                    break;
                case 'rk_slider_link_url':
                    echo esc_html(get_post_meta( $post_id, "rk_slider_link_url" , true));
                    break;    
            }
        }

        public function rk_slider_sortable_columns($columns){
            $columns['rk_slider_link_text'] = 'rk_slider_link_text';            
            return $columns;
        }

        public function add_meta_boxes(){
            add_meta_box(
                'rk_slider_meta_box',
                'Link Options',
                array($this, 'add_inner_meta_boxes'),
                'rk-slider',
                'normal',
                'high'
            );
        }

        public function add_inner_meta_boxes($post){
            require_once(RK_SLIDER_PATH.'views/rk-slider_metabox.php');
        }

        public function save_post($post_id){
            if(isset($_POST['action']) && $_POST['action']=='editpost'){
                $old_link_text = get_post_meta($post_id, 'rk_slider_link_text', true);
                $new_link_text = $_POST['rk_slider_link_text'];
                $old_link_url = get_post_meta($post_id, 'rk_slider_link_url', true);
                $new_link_url = $_POST['rk_slider_link_url'];

                if(empty($new_link_text)){
                    update_post_meta($post_id, 'rk_slider_link_text', 'Add some text');
                }else{
                    update_post_meta($post_id, 'rk_slider_link_text', sanitize_text_field($new_link_text, $old_link_text));
                }

                if(empty($new_link_url)){
                    update_post_meta($post_id, 'rk_slider_link_url', '#');
                }else{
                    update_post_meta($post_id, 'rk_slider_link_url', sanitize_text_field($old_link_url, $new_link_url));

                }

                
                
            }
        }
    }
 }