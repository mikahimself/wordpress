<?php
class MH2020_RecentPosts extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'MH2020_RecentPosts',
            'description' => 'Custom Recents Posts widget for MikaHimself2020 theme.',
        );
        parent::__construct('MH2020_RecentPosts', 'MH2020 Recent Posts', $widget_options);
    }

    public function widget($args, $instance) {
        $no_of_posts = apply_filters( 'no_of_posts', $instance['no_of_posts']);
        echo '<ul class="list-group sidebar-widget">';
        echo '  <li class="list-group-item no-bottom"><h4>Recent Posts</h4></li>';
        // Define our WP Query Parameters
        $the_query = new WP_Query( 'posts_per_page=' . $no_of_posts );
 
        // Start our WP Query
        if ($the_query -> have_posts()) {
            while ( $the_query -> have_posts() ) {
                $the_query -> the_post();
                    echo '  <li class="list-group-item no-bottom"><a class="btn list-group-item-action" href="' . get_the_permalink() . '"><i class="far fa-newspaper fa-lg list-icon"></i> ' . get_the_title() . '</a></li>';
            }
        }
        echo '</ul>';
        wp_reset_postdata();
        
    }

    public function form( $instance ) {
        $no_of_posts = ! empty( $instance['no_of_posts']) ? $instance['no_of_posts'] : 3;
        echo '<p>';
            echo '<label for="' . $this->get_field_id( 'no_of_posts' ) . '">Number of posts to show:</label> ';
            echo '<input type="text" id="' . $this->get_field_id( 'no_of_posts' ) . '" name="' . $this->get_field_name( 'no_of_posts' ) . '" value="' . esc_attr( $no_of_posts ) . '" />';
        echo '</p>';
    }
}
