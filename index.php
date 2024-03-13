<?php 

session_start();
include('includes/header.php'); 

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class='text-white'>Accueil</h6>
    </div>
</div>
<div class="py">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php  unset($_SESSION['message']);} ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid hed ps-5 pt-9">
    <p class="h6 pt-5">Obtenez Le Meilleur Inox</p>
    <div class="h2 text-white display-1 py-3">
        <div class="col ">Nous Fabriquons </div>
        <div class="col">Le Meilleur Inox</div>
        <div class="col">Au Maroc</div>
    </div>
</div>
<div class="containerr container ">
    <div class="content">
        <p class="icon2"> <i class="fa-solid fa-wand-magic-sparkles"></i> </p>
        <h3>Obtenez Le Meilleur Inox</h3>
        <p>
            Installation de pieces aux services de, nos partenaires.
            Offre a duree limitee aux nouveaux clients.
        </p>
    </div>
    <div class="content">
        <p class="icon2"> <i class="far fa-gem fa-3x"></i> </p>
        <h3>Nous ferons tout le travail</h3>
        <p>Nous sommes une entreprise spécialisée dans la fabrication et la fourniture 
            de produits en inox sur mesure pour répondre aux besoins spécifiques de nos clients.    
        </p>
    </div>
    <div class="content">
        <p class="icon2"> <i class="fa-solid fa-globe"></i></p>
        <h3>Livraison Gratuite</h3>
        <p>Nous sommes heureux d'offrir à nos clients la livraison gratuite pour leurs commandes, 
            car cela fait partie de notre engagement envers un service à la clientèle.!</p>
    </div>
</div>
<!-- section1 services -->
<section id="section1">
    <div class="head1">
        <h1>services</h1>
        <p>Ne soyez pas occupé, soyez productif</p>
    </div>
    <div class="containerr1">
        <div class="content1">
            <span><i class="fa-solid fa-palette fs-5"></i></span>
            <h3 class='fs-4'>Fabrication sur mesure</h3>
            <p class='ps-4 pe-4'>Nous sommes équipés pour fabriquer des produits en inox sur mesure, quelles que 
                soient les spécifications dont vous avez besoin.
            </p>
        </div>
        <div class="content1">
            <span><i class="fa-solid fa-vector-square "></i></span>
            <h3 class='fs-4'>Installation professionnelle</h3>
            <p class='ps-4 pe-4'>
            Nous pouvons installer les produits en inox que nous fabriquons pour vous, 
            pour vous assurer une installation professionnelle et une finition de qualité.
            </p>
        </div>
        <div class="content1">
            <span>
                <i class="fab fa-sketch fa-2x fs-4"></i></span>
            <h3 class='fs-4'>Polissage et finition</h3>
            <p class='ps-4 pe-4'>
            Nous offrons une gamme de services de polissage et de finition 
            pour donner à vos produits en inox la finition parfaite que vous recherchez.
            </p>
        </div>
        <div class="content1">
            <span> <i class="fas fa-pencil-ruler fa-2x fs-4"></i></span>
            <h3 class='fs-4'>Conseils d'experts </h3>
            <p class='ps-4 pe-4'>
            Notre équipe d'experts est à votre disposition pour vous offrir des 
            conseils et des recommandations pour vous aider à prendre des décisions éclairées pour votre projet sur l'inox.
            </p>
        </div>
    </div>
    <div class="containerr2">
        <div class="div1"></div>
    </div>

</section>
<!-- section2 portfolio -->
<section id="section2">
    <div class="head2">
        <h1>Portefeuille</h1>
        <p>Si vous ne le faites pas correctement, cela durera pour toujours</p>
    </div>
    <div class="content2">
        <img src="photo/one.jpg" alt="image deleted" height="300px" width="100%">
        <h3 class=''>Fabrication de structures en inox</h3>
        <p class=''>
        Les structures en inox sont utilisées pour de nombreuses applications, notamment les ponts, les passerelles, 
        les rampes, les escaliers et les supports de signalisation.
        </p>
    </div>
    <div class="content2">
        <img src="photo/two.jpg" alt="image deleted" height="300px" width="100%">
        <h3 class=''>Soudage de pièces </h3>
        <p class=''>
        Les équipements médicaux nécessitent des pièces en inox de haute qualité et des soudures 
        précises pour garantir leur sécurité et leur efficacité. 
        </p>
    </div>
    <div class="content2">
        <img src="photo/three.jpg" alt="image deleted" height="300px" width="100%">
        <h3 class=''>Soudage de tuyaux en inox</h3>
        <p class=''>
        Les tuyaux en inox sont couramment utilisés dans les industries alimentaires, 
        pharmaceutiques et chimiques, où la résistance à la corrosion est essentielle. 
        </p>
    </div>
</section>
<!-- section3 about -->
<section id="section3">
    <div class="head3">
        <h1>À propos</h1>
        <p>Moins c'est plus de travail</p>

    </div>
    <div class="content3">

        <div class="div2"></div>
        <div class="image"><img src="photo/four.jpg" height="300px" width="250px"></div>
        <div class="div3"></div>

    </div>

    <div class="content4">
        <p class="p1">
        Le soudage avec de l'acier inoxydable, également connu sous le nom de soudage d'inox, est une technique 
        de soudage utilisée pour joindre deux pièces d'acier inoxydable.
        </p>

        <p class="p2">
        Le soudage d'inox nécessite également l'utilisation d'un matériau d'apport adapté, 
        qui doit avoir des propriétés similaires à celles de l'acier inoxydable à souder. 
        Le choix du matériau d'apport dépendra du type d'acier inoxydable, 
        de la technique de soudage utilisée et de l'application spécifique.
        </p>


    </div>
</section>

<section id="section4">
    <div class="head4 py-4">
        <h1 class=''>Contactez moi</h1>
        <p>Nous sommes là pour vous faciliter la vie</p>
    </div>
    <div class="content4">
        <p class="text1"> N'hésitez pas à nous tenir au courant : </p>
        <p class="text2"><a href="#">Contact@gooshy.com</a> </p>
        <p class="text3">Retrouvez-nous sur les réseaux sociaux
            <a href="#" class="a1"><i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#" class="a2"> <i class="fa-solid fa-phone"></i> </a>
            <a href="#" class="a3"><i class="fa-brands fa-whatsapp"></i></a>
        </p>
    </div>
</section>
<footer>
    Made By Ussef <i class="fa-solid fa-heart"></i>
</footer>

<?php include('includes/footer.php'); ?>