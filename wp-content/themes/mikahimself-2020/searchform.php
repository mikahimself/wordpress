<?php

echo    '<form role="search" ' . $aria_label . 'method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
            <div class="input-group">
				<!--<label>-->
					<!--<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>-->
					<input type="search" class="form-control search-form-sidebar" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
                <!--</label>-->
                <div class="input-group-append">
                <input type="submit" class="search-submit" value="' . esc_attr_x( 'SEARCH', 'submit button' ) . '" />
                </div>
                </div>
            </form>';
            
?>