<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" value="" name="s" id="s" placeholder="<?php _e( 'Tapez ici...', 'tensixtwentytwentytwo' ); ?>" />
        <input type="submit" id="searchsubmit" value="<?php  esc_attr_e('Rechercher', 'tensixtwentytwentytwo'); ?>" />
    </div>
</form>
