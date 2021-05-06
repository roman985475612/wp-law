<?php

class Law_CategoryWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'Law_CategoryWidget',
            __( 'Категории (аккардион)', 'law' ),
            [
                'description' => __( 'Вывод категорий в виде аккардиона', 'law' ),
                'classname'   => 'category_widget',
            ]
        );
    }
    
    public function widget( $args, $instance )
    {
        extract( $args );
        extract( $instance );

        $title = isset( $title ) ? $title : '';
        $exlude = isset( $exlude ) ? $exlude : '';

        $title = apply_filters( 'widget_title', $title );

        $cats = wp_list_categories([
            'title_li' => '',
            'echo' => false,
            'exclude' => $exlude,
        ]);

        $html = '<div class="col-md-2">';
        $html .= $before_title . $title . $after_title;
        $html .= '<ul id="menu-footer-menu" class="menu footer-menu">';
        $html .= $cats;
        $html .= '</ul>';
        $html .= $after_widget;

        echo $html;
    }

    public function form( $instance )
    {
        extract( $instance );
        $title = isset( $title ) ? $title : '';
        $exlude = isset( $exlude ) ? $exlude : '';
        ?>
        <p>
            <label for="<?= $this->get_field_id('title') ?>"><?php _e( 'Заголовок', 'law' ) ?>:</label>
            <input 
                type="text" 
                name="<?= $this->get_field_name('title') ?>" 
                id="<?= $this->get_field_id('title') ?>" 
                class="widefat title" 
                value="<?php echo esc_attr( $title ) ?>"
            >
        </p>
        <p>
            <label for="<?= $this->get_field_id('exlude') ?>"><?php _e( 'ID исключенных рубрик через запятую', 'law' ) ?>:</label>
            <input 
                type="text" 
                name="<?= $this->get_field_name('exlude') ?>" 
                id="<?= $this->get_field_id('exlude') ?>" 
                class="widefat" 
                value="<?php echo esc_attr( $exlude ) ?>"
            >
        </p>
        <?php
    }
}