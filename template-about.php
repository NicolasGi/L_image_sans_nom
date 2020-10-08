<?php
/**
 * Template Name: About
 */
?>
<?php get_header();
$loop = isn_wp_query('about', 1);
?>
<h1 class="hidden">L'image sans nom</h1>
</div>
</header>
<main class="">
    <section class="library">
        <div class="library__container">

        <div class="library__title">
            <h2 aria-level="2" class="hidden">La librairie</h2>
            <h3 class="about__title">Qui sommes-nous?</h3>
        </div>
        <?php if ($loop->have_posts()) : ?>
        <?php while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <div class="library__card flex">
            <figure>
                <?php $img = get_field('isn_us_img');
                if (!empty($img)): ?>
                    <img src="<?php echo esc_url($img['url']); ?>"
                         alt="<?php echo esc_attr($img['alt']); ?>"/>
                <?php endif; ?>
            </figure>
            <div class="txt about__txt">
                <?php the_field('isn_first_text_us'); ?>
            </div>
            <a href="contact.php" class="btn-a">Nous contacter</a>

        </div>
        </div>
    </section>
    <section class="library">
        <div class="library__container">
        <div class="library__title">
            <h2 class="hidden">Les expositions</h2>
            <h3 class="about__title">Qui peut nous rendre visite?</h3>
        </div>
        <div class="library__card flex">
                <figure>
                    <?php $img = get_field('isn_us_img2');
                    if (!empty($img)): ?>
                        <img src="<?php echo esc_url($img['url']); ?>"
                             alt="<?php echo esc_attr($img['alt']); ?>"/>
                    <?php endif; ?>
                </figure>

            <div class="about__txt txt">
                <?php the_field('isn_second_text_us'); ?>

                <a href="contact.php" class="btn">contactez-nous</a>
            </div>
            <a href="event.php" class="btn-a">Voir nos prochaines expos</a>

        </div>
        </div>
    </section>
    <?php endwhile;?>
    <?php endif;?>
</main>
<?php get_footer(); ?>
