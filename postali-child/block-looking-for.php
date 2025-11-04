<?php if( have_rows('categories') ): ?>
<section id="more-info" class="dkblue">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2><?php the_field('related_section_h2'); ?></h2>
                <p class="large">Here are some additional resources that may be of help.</p>
            </div>
            <div class="column-66">
            <?php while( have_rows('categories') ): the_row(); 
                    $category_title = get_sub_field('category_title');
                ?>
                <p class="large"><strong><?php echo $category_title; ?></strong></p>
                <?php if( have_rows('category_links') ): ?>
                    <ul>
                    <?php while( have_rows('category_links') ): the_row(); 
                            $link_title = get_sub_field('link_title');
                            $page_link = get_sub_field('page_link');
                        ?>
                        <li><a href="<?php echo $page_link; ?>" title="<?php echo $link_title; ?>"><?php echo $link_title; ?></a></li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <div class="spacer-30"></div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>