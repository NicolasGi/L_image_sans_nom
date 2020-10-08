<?php
/**
 * Template Name: Event
 */
?>
<?php get_header();

$loop = isn_wp_query('exhibitions', 1);

?>
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
    <section class="">
        <div class="book__more">

            <div class="event__title">
                <h2 aria-level="2" class="hidden">l'image sans nom, autres expositions</h2>
                <h3 aria-level="3" class="">Prochaine exposition</h3>
            </div>
            <div class="event__more__elt">
                <?php if ($loopMore->have_posts()) : ?>
                    <?php  while($loopMore->have_posts()) :
                        $loopMore->the_post(); ?>
                    <div class="event__elt more__elt">
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
                                <a href="./event.php" class="btn-a event__card__link">Allez sur facebook</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="pages">
            <ul class="flex">
                <li class="pages__nbre"><a href="">1</a></li>
                <li class="pages__nbre"><a href="" class="active">2</a></li>
                <li class="pages__nbre"><a href="">3</a></li>
                <li class="pages__nbre"><a href="">4</a></li>
            </ul>
        </div>
    </section>


</main>
<?php get_footer(); ?>
