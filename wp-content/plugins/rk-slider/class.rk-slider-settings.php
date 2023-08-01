<?php

if(! class_exists('RK_Slider_Settings')){
    class RK_Slider_Settings{
        public static $options;

        public function __construct(){
            self::$options = get_option( 'rk_slider_options' );
            add_action('admin_init',array($this, 'admin_init'));
        }

        public function admin_init(){
            register_setting('rk_slider_group','rk_slider_options', array($this, 'rk_slider_validate'));
            add_settings_section(
                'rk_slider_main_section',
                'How does it work?',
                null,
                'rk_slider_page1'
            );
            add_settings_section(
                'rk_slider_second_section',
                'Other Plugin Options',
                null,
                'rk_slider_page2'
            );

            add_settings_field(
                'rk_slider_shortcode',
                'Shortcode',
                array($this, 'rk_slider_shortcode_callback'),
                'rk_slider_page1',
                'rk_slider_main_section'
            );

            add_settings_field(
                'rk_slider_title',
                'Slider Title',
                array($this, 'rk_slider_title_callback'),
                'rk_slider_page2',
                'rk_slider_second_section',
                array('label_for'=>'rk_slider_title')
            );

            add_settings_field(
                'rk_slider_bullets',
                'Display Bullets',
                array($this, 'rk_slider_bullets_callback'),
                'rk_slider_page2',
                'rk_slider_second_section',
                array('label_for'=>'rk_slider_bullets')
            );

            add_settings_field(
                'rk_slider_style',
                'Display Style',
                array($this, 'rk_slider_style_callback'),
                'rk_slider_page2',
                'rk_slider_second_section',
                array(
                    'items'=>array(
                        'style-1',
                        'style-2'
                    ),
                    'label_for'=>'rk_slider_style'
                )
            );
        }

        public function rk_slider_shortcode_callback(){
            ?>
            <span>Use the shortcode [rk_slider] to display the slider in any page/post/widget.</span>
        <?php
            }

        public function rk_slider_title_callback($args){
           ?>
            <input
             type="text"
              name="rk_slider_options[rk_slider_title]"
               id="rk_slider_title"
                value="<?php echo isset( self::$options['rk_slider_title'] ) ? esc_attr(self::$options['rk_slider_title']) : "" ?>"
                >
            <?php
                }    

        public function rk_slider_bullets_callback($args){
                ?>
                <input
                    type="checkbox"
                    name="rk_slider_options[rk_slider_bullets]"
                    id="rk_slider_bullets"
                    value="1"
                    <?php
                        if(isset(self::$options['rk_slider_bullets'])){
                            checked("1", self::$options['rk_slider_bullets'] , true);
                        }
                    ?>
                    />
                    <label for="rk_slider_bullets">Whether to display bullets or not</label>
                <?php
                 }        
     
                 public function rk_slider_style_callback($args){
                    ?>
                    <select
                        id="rk_slider_style"                        
                        name="rk_slider_options[rk_slider_style]">
                        <?php foreach($args['items'] as $item): ?>
                        <option value="<?php echo esc_attr($item); ?>"
                        <?php isset( self::$options['rk_slider_style'] ) ? selected($item, self::$options['rk_slider_style'], true) : ""; ?>
                        ><?php echo esc_html(ucfirst($item)); ?></option>               
                        
                        <?php endforeach; ?>
                        
                        </select>
                    <?php
                     }  
                     
                     public function rk_slider_validate($input){
                        $new_input = array();
                        foreach($input as $key=>$value){
                            switch($key){
                                case 'rk_slider_title':
                                    if(empty($value)){
                                        $value = 'Please, type some text';
                                    }
                                    $new_input[$key] = sanitize_text_field($value);
                                    break;
                                    default:
                                    $new_input[$key] = sanitize_text_field($value);
                                    break; 
                            }
                            
                        }

                        return $new_input;

                     }
    }
}