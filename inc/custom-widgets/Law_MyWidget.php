<?php

class Law_MyWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'Law_MyWidget',
            __( 'My first widget', 'law' ),
            [
                'description' => __( 'This is my first widget', 'law' ),
                'classname'   => 'first_widget',
            ]
        );
    }

    public function widget( $args, $instance )
    {
        extract( $args );
        extract( $instance );

        $title = apply_filters( 'widget_title', $title );
        $text = apply_filters( 'widget_text', $text );

        echo '<div class="col-md-4">';
        echo $before_title . $title . $after_title;
        echo $text;
        echo $after_widget;
    }

    public function form( $instance )
    {
        extract( $instance );
        $title = isset( $title ) ? $title : '';
        $text = isset( $text ) ? $text : '';
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
            <label for="<?= $this->get_field_id( 'text' ) ?>"><?php _e( 'Текст', 'law' ) ?>:</label>
            <textarea 
                name="<?= $this->get_field_name( 'text' ) ?>" 
                id="<?= $this->get_field_id( 'text' ) ?>" 
                class="widefat" 
                cols="20"
                rows="5"
            ><?php echo esc_attr( $text ) ?></textarea>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance )
    {
        $new_instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $new_instance['text'] = str_replace( '<p>', '', $new_instance['text'] );
        $new_instance['text'] = str_replace( '</p>', '<br>', $new_instance['text'] );
        return $new_instance;
    }
}