<header class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
    <a href="<?php echo get_site_url() ?>"
        class="navbar-brand " >
        <img class="img-fluid ssb-logo " src="<?php echo get_theme_file_uri('/images/logo-ssbruno.png'); ?>" alt="logo-ssbruno" />
        <h3>
        <strong>SSBruno </strong><span class="ssbcode-title">Code</span>
        </h3>
    </a>

    <button 
        class="navbar-toggler" 
        data-bs-toggle="collapse" 
        data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="/works" class="nav-link">Portfolio</a>
        </li>
        <li class="nav-item">
            <a href="https://api.whatsapp.com/send?phone=5548996087343&text=Ol%C3%A1%20gostaria%20de%20falar%20sobre%20meu%20projeto!"
            class="nav-link"
            target="blank"> WhatsApp</a>
        </li>
        <li class="nav-item">
            <span class="search-trigger js-search-trigger nav-link">
            <i class="fa fa-search" aria-hidden="true"></i>
            </span>
        </li>
        <li class="nav-item" id="ssb-overlay">
            <div class="nav-link"> <?php echo do_shortcode('[gtranslate]'); ?></div>
        </li>

        </ul>
    </div>
    </div>

</header> 