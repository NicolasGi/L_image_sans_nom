<?php
/**
 * Template Name: One-Event
 */
?>

<?php get_header();?>

</div>
</header>
<main class="">
    <section class="event event__pages container" id="event">
        <div class="event__title">
            <h2 aria-level="2" class="hidden">l'image sans nom, exposition</h2>
            <h3 aria-level="3" class="">Expo du moment</h3>
        </div>
        <?php if ($loop->have_posts()) : ?>
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="event__elt event__elt__principal">
                    <div class="event__info">
                        <h4 aria-level="4"><?php the_field('expo_name'); ?> <br>
                            <span><?php the_field('author_name'); ?></span></h4>
                        <div class="event__date">
                            <?php isn_get_date(); ?>
                        </div>
                        <div class="event__card">
                            <div class="img">
                                <figure>
                                    <?php $img = get_field('expo_img');
                                    if (!empty($img)): ?>
                                        <img src="<?php echo esc_url($img['url']); ?>"
                                             alt="<?php echo esc_attr($img['alt']); ?>"/>
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <div class="flex event__card__content">
                                <div class="event__txt txt">
                                    <?php the_field('expo_description'); ?>
                                </div>
                                <div class="moreLink flex">
                                    <a href="./event.php" class="btn-a">Allez sur facebook</a>
                                    <a href="./event.php" class="btn-a">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>

