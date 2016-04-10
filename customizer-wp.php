<?php
/*
Список аргументов функции get_theme_mod(), которая выводит в теме указанную опцию
--- подробнее о функции: http://wp-kama.ru/function/get_theme_mod

----- Социальные сети -----
  vk_page - ссылка на профиль Vk
  tw_page - ссылка на профиль Twitter
  gp_page - ссылка на профиль Google
  fb_page - ссылка на профиль Facebook

----- Контактная информация -----
  setting_tel - контактный телефон 1
  setting_tel_2  - контактный телефон 2
  setting_tel_3  - контактный телефон 3
  setting_email - адрес электронной почты 
  setting_loc - физический адрес

----- Баннеры -----
  preim_1 - баннер 1
  preim_2 - баннер 2
  preim_3 - баннер 3
  preim_4 - баннер 4
*/

function kv_customize_register( $wp_customize ) {
 class Example_Customize_Textarea_Control extends WP_Customize_Control {
   public $type = 'textarea';
   public function render_content() {
     ?>
     <label>
       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
       <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
     </label>
     <?php
   }
 }

 //Создаем секции
 $wp_customize->add_section( 'section_social', array('title' => 'Социальные сети', 'priority' => 41) );
 $wp_customize->add_section( 'section_footer', array('title' => 'Контактная информация', 'priority' => 61) );
 $wp_customize->add_section( 'section_home', array('title' => 'Баннеры', 'priority' => 62) );
   // $wp_customize->add_section( 'section_header', array('title' => 'Логотип', 'priority' => 22) );

 //Добавляем настройки

   //----------Социальные сети ------------------------------------------------------------------------
 $wp_customize->add_setting( 'vk_page', array( 'default' => '', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
 $wp_customize->add_setting( 'tw_page', array( 'default' => '', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
 $wp_customize->add_setting( 'gp_page', array( 'default' => '', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
 $wp_customize->add_setting( 'fb_page', array( 'default' => '', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );

 //--------------- Адрес телефоны  и почта ----------------------------------------------------------------------
  $wp_customize->add_setting( 'setting_tel', array( 'default' => '+ 38 044 34 99', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );  
  $wp_customize->add_setting( 'setting_tel_2', array( 'default' => '+ 38 044 34 99', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );  
  $wp_customize->add_setting( 'setting_tel_3', array( 'default' => '+ 38 044 34 99', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
 $wp_customize->add_setting( 'setting_email', array( 'default' => 'company@gmail.com', 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );

 $wp_customize->add_setting( 'setting_loc', array( 'default' => 'Адрес','type' => 'theme_mod', 'capability' => 'edit_theme_options' ));
 $wp_customize->add_setting( 'settings_logo', array( 'default' => '/wp-content/themes/stimul-plus/img/new-store-1411394494.jpg','type' => 'theme_mod', 'capability' => 'edit_theme_options') );

 //--------------Баннеры---------------------------------------
 $wp_customize->add_setting( 'preim_1', array( 'default' => '','type' => 'theme_mod', 'capability' => 'edit_theme_options') );
 $wp_customize->add_setting( 'preim_2', array( 'default' => '','type' => 'theme_mod', 'capability' => 'edit_theme_options') );
 $wp_customize->add_setting( 'preim_3', array( 'default' => '','type' => 'theme_mod', 'capability' => 'edit_theme_options') );
 $wp_customize->add_setting( 'preim_4', array( 'default' => '','type' => 'theme_mod', 'capability' => 'edit_theme_options') );


//-------------Выводим поля ввода -----------------------------------------------------------------------------------------

//Ссылка на вконтакте
 $wp_customize->add_control( 'vk_page', array(
   'label' => 'Ссылка на профиль Вконтакте',
   'section' => 'section_social',
   'type' => 'text',
   'priority' => 1
   ) );
   //Ссылка на твиттер
 $wp_customize->add_control( 'tw_page', array(
   'label' => 'Ссылка на профиль Twiter',
   'section' => 'section_social',
   'type' => 'text',
   'priority' => 2
   ) );  
    //Ссылка на Google+
 $wp_customize->add_control( 'gp_page', array(
   'label' => 'Ссылка на профиль Google+',
   'section' => 'section_social',
   'type' => 'text',
   'priority' => 3
   ) );    
   //Ссылка на Google+
 $wp_customize->add_control( 'fb_page', array(
   'label' => 'Ссылка на профиль Facebook',
   'section' => 'section_social',
   'type' => 'text',
   'priority' => 4
   ) );


// загружаем лого в шапке
/* $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'settings_logo', array(
  'label' => 'Логотип сайта',
  'section' => 'section_header',
  'settings' => 'settings_logo',
  'priority' => 1
  ) ) );*/


  //Блок с преимуществами 1
 $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'preim_1', array(
  'label' => 'Баннеры 1',
  'section' => 'section_home',
  'settings' => 'preim_1',
  ) ) ); 
  //Блок с преимуществами 2
 $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'preim_2', array(
  'label' => 'Баннеры 2',
  'section' => 'section_home',
  'settings' => 'preim_2',
  ) ) );  
  //Блок с преимуществами 3
 $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'preim_3', array(
  'label' => 'Баннеры 3',
  'section' => 'section_home',
  'settings' => 'preim_3',
  ) ) );  
  //Блок с преимуществами 4
 $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'preim_4', array(
  'label' => 'Баннеры 4',
  'section' => 'section_home',
  'settings' => 'preim_4',
  ) ) );  

  //Адрес
 $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'setting_loc', array(
  'label' => 'Адрес',
  'section' => 'section_footer',
  'settings' => 'setting_loc',
  ) ) );

   //телефон
 $wp_customize->add_control( 'setting_tel', array(
   'label' => 'Телефон 1',
   'section' => 'section_footer',
   'type' => 'text',
   'priority' => 3
   ) );   
   //телефон 2
 $wp_customize->add_control( 'setting_tel_2', array(
   'label' => 'Телефон 2',
   'section' => 'section_footer',
   'type' => 'text',
   'priority' => 3
   ) );  
   //телефон 2
 $wp_customize->add_control( 'setting_tel_3', array(
   'label' => 'Телефон 3',
   'section' => 'section_footer',
   'type' => 'text',
   'priority' => 3
   ) );

    //email
 $wp_customize->add_control( 'setting_email', array(
   'label' => 'E-mail',
   'section' => 'section_footer',
   'type' => 'text',
   'priority' => 3
   ) );
}
add_action( 'customize_register', 'kv_customize_register' );
?>
