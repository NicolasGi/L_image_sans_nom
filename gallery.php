<?php
/**
 * Template Name: Gallery
 */
?>
<?php get_header();
$loop = isn_wp_query('books', 1);
$loopMore = isn_wp_query('books', 2);
?>

</div>
</header>
<h1 class="hidden">L'image sans nom</h1>

<main class="">
    <section class="book book__pages container" id="book">
        <div class="book__container container">
            <div class="book__title">
                <h2 aria-level="2" class="hidden">l'image sans nom</h2>
                <h3 aria-level="3">Liste de nos livre</h3>
            </div>
            <div class="book__card book__elt__principal">
                <?php if ($loop->have_posts()) : ?>
                    <?php  while($loop->have_posts()) :
                        $loop->the_post(); ?>
                        <h4 aria-level="4"><?php the_field('book_name'); ?> <br>
                            <span><?php the_field('author_name'); ?></span></h4>

                        <div class="img">
                            <figure>

                                <?php $img = get_field('book_img');
                                if (!empty($img)):
                                    ?>
                                    <img src="<?php echo esc_url($img['url']); ?>"
                                         alt="<?php echo esc_attr($img['alt']); ?>"
                                            />
                                <?php endif; ?>
                            </figure>

                        </div>
                        <div class="flex book__card__content">
                            <div class="book__txt txt">
                                <?php the_field('book_description') ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn-a">Voir plus</a>
                        </div>
                    <?php endwhile ?>
                   <?php endif; ?>


            </div>

    </section>
    <section class="">
        <div class="book__more">
            <div class="book__title">
                <h2 aria-level="2" class="hidden">l'image sans nom, autres livres</h2>
                <h3 aria-level="3" class="">Anciens livres</h3>
            </div>
            <div class="book__more__elt">
                <?php if ($loopMore->have_posts()) : ?>
                    <?php  while($loopMore->have_posts()) :
                        $loopMore->the_post(); ?>
                    <div class="book__card">
                        <h4 aria-level="4"><?php the_field('book_name'); ?> <br>
                            <span><?php the_field('author_name'); ?></span></h4>


                        <div class="img">
                            <figure>
                                <?php $img = get_field('book_img');
                                if (!empty($img)): ?>
                                    <img src="<?php echo esc_url($img['url']); ?>"
                                         alt="<?php echo esc_attr($img['alt']); ?>"/>
                                <?php endif; ?>
                            </figure>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn-a">Voir plus</a>

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
