<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <span class="date"> 
                <?php 
                    $humain_time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
                    printf( 'Publié il y a %s',  $humain_time);
                ?>
            </span>
            <?php 
                the_tags( '<span class="tag"><i class="fa fa-tag"></i> ', ' </span><span class="tag"><i class="fa fa-tag"></i> ', '</span>' );
            ?>
            <?php 
                the_category( '<span class="tag"><i class="fa fa-tag"></i> ', ' </span><span class="tag"><i class="fa fa-tag"></i> ', '</span>' ); 
            ?>
            <span class="comment"><a href="#comments"><i class='fa fa-comment'></i> <?php comments_number(); ?> </a></span>
        </div>
    </header>
    <?php
    the_content();
    ?>

    <!-- comments section -->
    <?php 
        comments_template();
    ?>
</div>