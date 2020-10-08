<?php
/**
 * Template Name: Template page "Contact"
*/
?>
<?php get_header();
$title = 'contact'
?>
</div>
</header>
<main role="main" class="flex">
    <section class="contact" id="contact">
        <div class="contact__form flex">
            <div class="contact__title">
                <h2 aria-level="2" class="hidden">Nous contacter</h2>
                <h3 aria-level="3"> Nous contacter </h3>
            </div>
            <!--<?php echo do_shortcode('[contact-form-7 id="134" title="Formulaire"]')?>
            <?php the_field('email')?>-->
            <form action="#" method="get" class="flex">
                <label for="email">
                    Email
                    <input tabindex="7" type="email" name="email" id="email" placeholder="votre-mail@gmail.com" required>
                </label>
                <label for="name">
                    Nom Prénom
                    <input tabindex="8" type="text" name="name" id="name" placeholder="Jean Michel" required>
                </label>
                <label for="choose">
                    Votre choix
                    <select name="choose" id="choose" tabindex="9">
                        <option value="choisissez une option">--choisissez une option--</option>
                        <option value="vernissage">Faire un vernissage</option>
                        <option value="visite">Rendre visite</option>
                        <option value="book" id="book">Voir un livre</option>
                        <option value="other" id="other">Autre contexte</option>
                    </select>
                </label>
                <label for="message">
                    Votre message
                    <textarea tabindex="10" name="message" id="message" cols="30" rows="10" placeholder="Précisez pourquoi vous voulez nous contacter" required></textarea>
                </label>
                <label for="newsLetter" class="form__newsletter">
                    Inscription à la newsletter
                    <input tabindex="11" type="checkbox" name="newsLetter" id="newsLetter">
                    <span class="checkmark"></span>
                </label>
                <label for="submit-btn">
                    <input type="submit" id="submit-btn" class="" value="Envoyez">
                </label>

            </form>
        </div>
        <div id="googleMap">
                <iframe width="100%" height="400" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=place%20vivegnis%206&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </section>
</main>
<?php get_footer(); ?>
