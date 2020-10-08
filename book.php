<?php
/**
 * Template Name: Book
 */
?>
<?php get_header();
$loop = isn_wp_query('books', 1);

?>
</div>
</header>
<main role="main">
    <section class="book" id="book">
        <div class="book__container">
            <div class="book__title">
                <h2 aria-level="2" class="hidden">Livre du mois</h2>
                <h3 aria-level="3">Nous vous proposons le livre du mois</h3>
            </div>
            <div class="book__card">
                <?php if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <h4 aria-level="4"><?php the_field('book_name'); ?> <br>
                    <span><?php the_field('author_name'); ?></span></h4>

                <?php $gallery = get_field('book_gallery');

                // var_dump($gallery[0]['url']);die();
                if (count($gallery)):?>
                    <div class="main-gallery img ">
                        <?php foreach ($gallery as $img): ?>
                            <img class='gallery-cell' id="1" src="<?= $img['url'] ?>" alt="" width="150" height="150">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <div class="flex book__card__content">
                    <div class="book__txt txt">
                        <?php the_field('book_description') ?>
                    </div>
                    <a href="contact.php" class="btn-a">Venir lire le livre</a>
                </div>
            </div>
            <?php endwhile ?>
            <?php endif; ?>
        </div>

        <?php if (count($gallery)): ?>
            <div class="book__filing__show container__filling_image secondary-gallery not-for-mobile">
                <?php foreach ($gallery as $img): ?>
                    <a href="" class="btn">
                        <img class='gallery-cell' id="1" src="<?= $img['url'] ?>" alt="" width="150" height="150">
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<script src="./flickity.pkgd.js"></script>
<?php get_footer(); ?>
