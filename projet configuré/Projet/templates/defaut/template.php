<?php
namespace petitesAnnonces;
        HtmlDocument::getCurrentInstance()->addHeader("<meta charset='utf-8' />");
        HtmlDocument::getCurrentInstance()->addHeader("<link rel='stylesheet' href='templates/defaut/styles/style.css' />");
?>
        <div id="bloc_page">
            <header>
                <div id="titre_principal">Les Z 'annonces</div>

                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="index.php?page=contact">Contact</a></li>
                    </ul>
                </nav>

                <div id="banniere_image">
                    <div id="banniere_description">
                        Achetez et vendez tout ce que vous voulez...
                        <a href="#" class="bouton_rouge">Passer une annonce</a>
                    </div>
                </div>
            </header>

            <main>

                <?php echo HtmlDocument::getCurrentInstance()->getMainContent(); ?>

            </main>

            <aside>
                <h1>Par régions</h1>
                <p id="france"><a href='#'><img src="templates/defaut/images/france.gif" alt="Régions de France" height='130' /></a></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec sagittis massa. Nulla facilisi.</p>
                <p>Phasellus ligula massa, congue ac vulputate non, dignissim at augue. Sed auctor fringilla quam quis porttitor. Praesent vitae dignissim magna. Pellentesque quis sem purus, vel elementum mi.</p>
                <p><img src="templates/defaut/images/facebook.png" alt="Facebook" /><img src="templates/defaut/images/twitter.png" alt="Twitter" /><img src="templates/defaut/images/vimeo.png" alt="Vimeo" /><img src="templates/defaut/images/rss.png" alt="RSS" /></p>
            </aside>

            <footer>
                <div id="footer_annonce">
                    <h1>Dernière annonce</h1>
                    <p>Vends Nokia 3610 dernier cri. A saisir !</p>
                    <p>le 12 mai à 23h12</p>
                </div>
                <div id="footer_photos">
                    <h1>Dernières photos</h1>
                    <p><img src="templates/defaut/images/photo1.jpg" alt="Photographie" /><img src="templates/defaut/images/photo2.jpg" alt="Photographie" /><img src="templates/defaut/images/photo3.jpg" alt="Photographie" /><img src="templates/defaut/images/photo4.jpg" alt="Photographie" /></p>
                </div>
                <div id="footer_categories">
                    <h1>Principales catégories</h1>
                    <ul>
                        <li><a href="#">Offres d'emploi</a></li>
                        <li><a href="#">Immobilier</a></li>
                        <li><a href="#">Voitures</a></li>
                        <li><a href="#">Informatique</a></li>
                        <li><a href="#">CD / Musique</a></li>
                        <li><a href="#">Livres</a></li>
                        <li><a href="#">Animaux</a></li>
                        <li><a href="#">Vêtements</a></li>
                    </ul>
                </div>
            </footer>
        </div>
