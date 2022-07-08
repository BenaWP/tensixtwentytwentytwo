<div class="comments-wrapper">

    <div class="comments" id="comments">

        <div class="comments-header">

            <h2 class="comment-reply-title">
                <?php
                if (!have_comments()) :
                    echo esc_html_e('Laisser un commentaire', 'tensixtwentytwentytwo');
                else :
                    echo get_comments_number() . esc_html_e('Commentaires', 'tensixtwentytwentytwo');
                endif;

                ?>
            </h2><!-- .comments-title -->

        </div><!-- .comments-header -->

        <div class="comments-inner">

            <?php
            $args = array(
                "avatar_size" => 60,
                "style" => "div"
            );
            wp_list_comments($args);
            ?>

        </div><!-- .comments-inner -->

    </div><!-- comments -->

    <hr class="" aria-hidden="true">

    <?php
    if (comments_open()) :
        $args = [
            'class_form' => '',
            'title_replay_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h2>'
        ];
        comment_form($args);

    endif;

    ?>

</div>