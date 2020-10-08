<?php
/**
 * Template Name: Home
 */
?>
<?php
$moveImg = true;
get_header();

$loopBook = isn_wp_query('books', '1');
$loopAbout = isn_wp_query('about', '1');
$loopExpo = isn_wp_query('exhibitions', '1');

?>

    <section class="header__content">
        <?php if ($loopAbout->have_posts()) : ?>
            <?php while ($loopAbout->have_posts()) : $loopAbout->the_post(); ?>
                <div class="header__title">
                    <h2 class="hidden">Introduction à l'image sans nom</h2>
                    <h3> <?php the_title() ?></h3>
                </div>
                <div class="header__content__intro txt">
                    <?php the_field('isn_first_text_us'); ?>
                </div>

                <figure class="header__content__banner">
                    <?php $img = get_field('isn_us_img');
                    if (!empty($img)): ?>
                        <img src="<?php echo esc_url($img['url']); ?>"
                             alt="<?php echo esc_attr($img['alt']); ?>"/>
                    <?php endif; ?>
                </figure>
                <a href="./library.php" class="btn-a">En savoir plus</a>
            <?php endwhile ?>
        <?php endif; ?>
    </section>
    </div>

    <div class="title">
        <span>L'</span> <span>Image</span> <span>Sans</span> <span>Nom</span>
    </div>
    </header>

    <main class="" role="main">
        <section class="book" id="book">
            <div class="book__container container">
                <div class="book__title">
                    <h2 aria-level="2" class="hidden">l'image sans nom,</h2>
                    <h3 aria-level="3">Nous vous proposons le livre du mois</h3>
                </div>
                <div class="book__card">
                    <?php if ($loopBook->have_posts()) : ?>
                        <?php while ($loopBook->have_posts()) : $loopBook->the_post(); ?>
                            <h4 aria-level="4"><?php the_field('book_name'); ?> <br>
                                <span><?php the_field('author_name'); ?></span></h4>
                            <div class="img">
                                <figure>

                                    <?php $img = get_field('book_img');
                                    if (!empty($img)): ?>
                                        <img src="<?php echo esc_url($img['url']); ?>"
                                             alt="<?php echo esc_attr($img['alt']); ?>"/>
                                    <?php endif; ?>

                                    <!--
                                    <img
                                            sizes="(max-width: 600px) 320vw, 600px"
                                            srcset=""
                                            src=" ?>/assets/img/book-home/book_1068.jpg"
                                            alt="Livre de Mauricio, Buenos aire">-->
                                </figure>

                            </div>
                            <div class="flex book__card__content">
                                <div class="book__txt txt">
                                    <?php the_field('book_description'); ?>
                                </div>

                                <a href="./book.php" class="btn-a">Voir plus</a>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                </div>
        </section>
        <section class="event" id="event">
            <div class="event__container">
                <div class="event__title">
                    <h2 aria-level="2" class="hidden">l'image sans nom, exposition</h2>
                    <h3 aria-level="3" class="">Expo du moment</h3>
                </div>
                <div class="event__elt">
                    <div class="event__info flex">
                        <?php if ($loopExpo->have_posts()) : ?>
                            <?php while ($loopExpo->have_posts()) : $loopExpo->the_post(); ?>
                                <h4 aria-level="4"><?php the_field('expo_name'); ?><br>
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
                                    <div class="event__card__content flex">
                                        <div class="event__txt txt">
                                            <?php the_field('expo_description'); ?>
                                        </div>
                                        <div class="moreLink flex">
                                            <a href="<?= the_permalink() ?>" class="btn-a">Allez sur facebook</a>
                                            <a href="<?= get_stylesheet_directory_uri() ?>/event.php" class="btn-a">Voir
                                                plus</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>


    </main>
<?php get_footer(); ?>