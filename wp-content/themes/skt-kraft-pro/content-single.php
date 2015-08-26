<?php
/**
 * @package SKT Kraft
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
 <div class="blog-post-repeat">      
   <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="postmeta">
            <div class="post-views"> | <?php the_views();?></div>
            <div class="clear"></div>
        </div><!-- postmeta -->
		<?php 
        if (has_post_thumbnail() ){
			echo '<div class="post-thumb">';
            the_post_thumbnail();
			echo '</div>';
		}
        ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'skt-wedding' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">
            <div class="post-categories"><?php echo getPostCategories();?></div>
            <div class="post-tags"><?php the_tags(' | Tags: ', ', ', '<br />'); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->
   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'skt-kraft' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </div>
</article>