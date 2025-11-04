
<div class="blog-thumbnail">
<?php if(get_field('blog_post_image')) : ?>
    <img src="<?php the_field('blog_post_image'); ?>" alt="Staver Law Firm blog image" fetchpriority="high">
<?php else: ?>
    <?php $category = get_the_category(); 
    
    if( $category[0]->name) : ?>
        <?php if ( $category[0]->name == 'Bike Accidents'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-bicycle-header.jpg" alt="Bicycle Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Auto Accidents'): ?><img src="/wp-content/uploads/2020/02/2019-fatal-crash-statistics-illinois.jpg" alt="Automobile Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Boat Accidents'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-boat-accidents-header.jpg" alt="Boat Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Bus Accidents'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-bus-accidents-header.jpg" alt="Bus Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Hit & Run Accidents'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-parent-car-accident-tile-background-img.jpg" alt="Hit and Run Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Insurance'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-insurance-bad-faith-header.jpg" alt="Insurance" fetchpriority="high"><?php endif; ?>        
        <?php if ( $category[0]->name == 'Media'): ?><img src="/wp-content/uploads/2020/07/tmp-media.jpg" alt="Media" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Medical Malpractice'): ?><img src="/wp-content/uploads/2018/09/0818-Staver-medicalMalpracticeCriminal.jpg" alt="Medical Malpractice Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Motorcycle Accidents'): ?><img src="/wp-content/uploads/2020/03/blog-generic.jpg" alt="Motorcycle Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Nursing Home Abuse'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-nursing-home-negligence-header.jpg" alt="Nursing Home Abuse" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Pedestrian Accidents'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-pedestrian-header.jpg" alt="Pedestrian Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Personal Injury'): ?><img src="/wp-content/uploads/2020/07/tmp-personal-injury.jpg" alt="Personal Injury" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Police Brutality'): ?><img src="/wp-content/uploads/2020/07/tmp-police-brutality.jpg" alt="Police Brutality" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Premises Liability'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-parent-premises-liability-header.jpg" alt="Premises Liability Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Product Liability'): ?><img src="/wp-content/uploads/2020/06/staver-practice-area-child-product-liability-header.jpg" alt="Product Liability Accidents" fetchpriority="high"><?php endif; ?>
        <?php if ( $category[0]->name == 'Top 25 Causes of Car Crashes'): ?><img src="/wp-content/uploads/2020/07/tmp-top-25.jpg" alt="Top 25 Causes of Car Crashes" fetchpriority="high"><?php endif; ?>
    <?php endif; ?>
    
<?php endif; ?>
</div>