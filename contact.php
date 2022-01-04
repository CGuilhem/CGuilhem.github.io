<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div id="app">
    <?php
        if(isset($_POST["message"]) && $_POST["message"]!="")
        {
          $expediteur = "moimeme@gmail.com";
          $destinataire = "rennes1fac@gmail.com";
          $sujet = $_POST["sujet"];
          $entete = "Content-Type: text/html;\n";
          $entete .= "From: ".$expediteur;

          $contenu_message = utf8_decode($_POST["message"])."\r\n";
          $contenu_message = "De : ".$_POST["mail"]."<br /><br /><strong>Sujet : ".$sujet."</strong><br /><br />"."<strong>Telephone : </strong>".$_POST["telephone"]."<br /><br />".$contenu_message."\r\n";
          $contenu_message ="<html><body>".$contenu_message."</body></html>";

          ini_set("sendmail_from","rennes1fac@gmail.com");
          mail($destinataire, $sujet, $contenu_message, $entete);
        }        
      ?>
        <header>
            <div class="main-header" id="param-header">
                <div class="brand-logo" id="logo">
                  <a href="index.html">
                    <img src="photos_site/brand-logo.png" alt="Logo du cabinet d'avocat de Maître Gué">   
                  </a>
                </div>
                <div class="navigation">
                  <div class="scrolled-logo">
                    <a href="index.html"><img src="photos_site/logo_G.png" alt="Logo miniature du cabinet d'avocat de Maître Gué"></a>
                  </div>
                  <nav>
                    <ul class="nav-bar" id="list">
                      <li class="nav-items"><a href="index.html">Accueil</a></li>
                      <li class="nav-items"><a href="cabinet.html">Cabinet</a></li>
                      <li class="nav-items"><a href="honoraires.html">Honoraires</a></li>
                      <li class="nav-items"><a href="actualites.html">Actualités</a></li>
                      <li class="nav-items"><a href="contact.php">Contact</a></li>
                    </ul>
                    <div class="burger">
                      <div class="line1"></div>
                      <div class="line2"></div>
                      <div class="line3"></div>
                  </div>
                  </nav>
                </div>
            </div>          
        </header>

        <div class="maps">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2607.0441149825074!2d-0.38770408370361575!3d49.199722684565415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a42d47e8341b9%3A0xfb32965e553cc6d8!2s12%20Av.%20du%20Mar%C3%A9chal%20Montgomery%2C%2014000%20Caen!5e0!3m2!1sfr!2sfr!4v1639382635377!5m2!1sfr!2sfr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" class="mobile-maps"></iframe>
        </div>

        <div class="form-container">
        <div class="container-picture">
            <img src="photos_site/photo_JB.jpeg" alt="A REMPLIR" class="form-picture">
          </div>
          <div class="form-size">
            <div class="form">
              <h1>Formulaire de contact</h1>
              <form id="contact" name="contact" action="contact.php" method="POST" >
                <input type="text" name="nom" id="nom" placeholder="Nom *" class="champs" required>
                <input type="text" name="telephone" id="telephone" placeholder="Numéro de téléphone" class="champs" required>
                <input type="text" name="mail" id="mail" placeholder="Adresse e-mail *" class="champs" required>
                <input type="text" name="sujet" id="sujet" placeholder="Sujet *" class="champs" required>
                <textarea name="message" id="message" placeholder="Message *" class="champs" required></textarea>
                <input type="submit" name="submit" id="submit" value="Envoi">
              </form>
            </div>
          </div>
        </div>
        <div class="container-picture">
            <img src="photos_site/bas_page_contact.png" alt="A REMPLIR" class="more-information">
          </div>

        <footer>
          <div class="footer-container">
            <div class="footer-container-logo">
              <img src="photos_site/footer-logo.png" alt="" class="footer-logo">
            </div>
            <div class="footer-line"></div>
            <div class="footer-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.Ad quidem consequuntur aliquid nisi libero autem placeat quis recusandae quod doloremque odit quisquam, modi eveniet delectus enim sapiente necessitatibus ducimus corporis!</div>
            <div class="footer-contact">
                <ul>
                  <li>Contact</li>
                  <li><img src="photos_site/picto_adress.png" alt="A REMPLIR" class="adress-logo">         12 avenue du Maréchal Montgomery - 14000 CAEN</li>
                  <li><img src="photos_site/picto_tel_27x27_Plan de travail 1.png" alt="A REMPLIR" class="number-logo">         06 32 35 95 55</li>
                  <li><a href="https://fr.linkedin.com/in/jean-baptiste-gu%C3%A9-73987166" target="_blank"><img src="photos_site/picto_linkedin_27x27_Plan de travail 1.png" alt="A REMPLIR" class="linkedin-logo">          Linkedin</a></li>
                </ul>
            </div>
          </div>
        </footer>

        <div class="end">
          <div>© 2021 Cabinet Gué, Avocat au barreau de Caen - </div>
        </div>
    </div>

    <script src="mobileHeader.js"></script>
    <script src="scroll.js"></script>
    <script src="mobileToggle.js"></script>

</body>
</html>