<?php
class MH2020_Categories extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'MH2020_Categories',
            'description' => 'Custom Categories widget for MikaHimself2020 theme.',
        );
        parent::__construct('MH2020_Categories', 'MH2020 Categories', $widget_options);
    }

    public function widget($args, $instance) {
        echo '<ul class="list-group sidebar-widget">';
        echo '<li class="list-group-item no-bottom"><h4>Categories</h4></li>';

        $categories = get_categories();

        foreach ( $categories as $category) {
            echo '<li class="list-group-item no-bottom">
                    <a class="btn list-group-item-action" href="' . get_category_link( $category -> term_id) . '"><i class="far fa-newspaper fa-lg list-icon"></i> ' . $category->name . '</a></li>';
        }
        echo '</ul>';
    }
}
