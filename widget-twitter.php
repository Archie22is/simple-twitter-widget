<?php

/*
 * A really basic Twitter widget. You can move the widget around as you 
 * wish within WordPress without severe headaches...
 *
 * Archie Makuwa
 */


// Creating the widget
class lola_twitter_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'lola_twitter_widget',

        // Widget name will appear in UI
        __('Twitter Feed Widget', 'wpb_widget_domain'),

        // Widget description
        array( 'description' => __( 'Tweet feed for Lola.', 'wpb_widget_domain' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        // This is where you run the code and display the output
        get_twitter_feed();
        echo $args['after_widget'];
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        return $instance;
    }
} // Class lola_twitter_widget ends here


// copy and paste your twitter script inside the function
function get_twitter_feed() {
?>

    <a class="twitter-timeline" height="250"  href="https://twitter.com/HoityToityLola" data-widget-id="530636929650262017">Tweets by @HoityToityLola</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php
}

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'lola_twitter_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
