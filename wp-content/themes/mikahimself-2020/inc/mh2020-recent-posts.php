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
        

        echo "\n";
        echo '    <ul class="nav nav-tabs nav-fill sidebar-widget" id="myTab" role="tablist">' . "\n";
        echo '      <li class="nav-item">' . "\n";
        echo '        <a class="nav-link active" id="recent-posts-tab" data-toggle="tab" href="#recent-posts" role="tab" aria-controls="recent-posts" aria-selected="true">RECENT</a>' . "\n";
        echo '      </li>' . "\n";
        echo '      <li class="nav-item">' . "\n";
        echo '        <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">CATEGORIES</a>' . "\n";
        echo '      </li>' . "\n";
        echo '      <li class="nav-item">' . "\n";
        echo '        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">ARCHIVES</a>' . "\n";
        echo '      </li>' . "\n";
        echo '    </ul>' . "\n";
        echo '    <div class="tab-content" id="myTabContent">' . "\n";
        echo '      <div class="tab-pane fade show active" id="recent-posts" role="tabpanel" aria-labelledby="recent-posts-tab">' . "\n";
        echo '        <ul class="list-group sidebar-widget">' . "\n";
        echo '          <li class="list-group-item no-bottom"><h5>Recent Posts</h5></li>' . "\n";
 
        // Recent posts tab.
        $the_query = new WP_Query( 'posts_per_page=' . $no_of_posts );
        // Start our WP Query
        if ($the_query -> have_posts()) {
            while ( $the_query -> have_posts() ) {
                $the_query -> the_post();
                    echo '          <li class="list-group-item no-bottom"><a class="btn list-group-item-action" href="' . get_the_permalink() . '"><i class="far fa-newspaper fa-lg list-icon mh2020-icon-button"></i> ' . get_the_title() . '</a></li>'  . "\n";
            }
        }
        echo '      </ul>' . "\n";
        wp_reset_postdata();
        
        echo '    </div>' . "\n";
        echo '    <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">' . "\n";
        echo '      <ul class="list-group sidebar-widget">' . "\n";
        echo '        <li class="list-group-item no-bottom"><h5>Categories</h5></li>' . "\n";

        $categories = get_categories();

        foreach ( $categories as $category) {
            echo '        <li class="list-group-item no-bottom">' .  "\n";
            echo '          <a class="btn list-group-item-action" href="' . get_category_link( $category -> term_id) . '"><i class="fas fa-tags fa-sm list-icon mh2020-icon-button"></i> ' . $category->name . '</a>'  . "\n";
            echo '        </li>' . "\n";
        }
        echo '      </ul>'  . "\n";
        echo '    </div>'  . "\n";
        echo '    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">' . "\n";
        echo '      <ul class="list-group sidebar-widget">' . "\n";
        echo '        <li class="list-group-item no-bottom"><h5>Archives</h5></li>' . "\n";
        
        wp_get_archives(array( 'type' => 'monthly', 'limit' => 12, 'format' => 'custom', 'before' => '        <li class="list-group-item no-bottom">' .  "\n", 'after' => '        </li>' .  "\n" ));
        echo '      </ul>' . "\n";
        echo '    </div>' . "\n";
        echo '  </div>' . "\n";





        
        
    }

    public function form( $instance ) {
        $no_of_posts = ! empty( $instance['no_of_posts']) ? $instance['no_of_posts'] : 3;
        echo '<p>';
            echo '<label for="' . $this->get_field_id( 'no_of_posts' ) . '">Number of posts to show:</label> ';
            echo '<input type="text" id="' . $this->get_field_id( 'no_of_posts' ) . '" name="' . $this->get_field_name( 'no_of_posts' ) . '" value="' . esc_attr( $no_of_posts ) . '" />';
        echo '</p>';
    }
}
