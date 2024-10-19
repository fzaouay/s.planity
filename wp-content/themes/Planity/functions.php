<?php 

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

if ( ! function_exists( 'storefront_site_title_or_logo' ) ) {
    /**
     * Display the site title or a custom logo image.
     *
     * @since 2.1.0
     * @param bool $echo Echo the string or return it.
     * @return string
     */
    function storefront_site_title_or_logo( $echo = true ) {
        // Percorso dell'immagine personalizzata del logo
        $custom_logo_url = get_stylesheet_directory_uri() . '/assets/images/Logo.png'; // Modifica il percorso in base alle tue esigenze


        // URL della homepage
        $home_url = esc_url( home_url( '/accueil' ) );


        // Se l'immagine esiste, usala come logo
        if ( file_exists( get_stylesheet_directory() . '/assets/images/Logo.png' ) ) {
            $logo =  '<img src="' . esc_url( $custom_logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="custom-logo" />';
            $html = '<a href="' . $home_url . '" rel="home" class="site-logo-link" style="display:inline-block;">' . $logo . '</a>';
        } else {
            // Se non c'è un'immagine personalizzata, usa il titolo del sito
            $tag = is_home() ? 'h1' : 'div';

            $html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';
            if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'storefront_primary_navigation' ) ) {
    /**
     * Display Primary Navigation
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_primary_navigation() {
        ?>
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'storefront' ); ?>">
            <button id="site-navigation-menu-toggle" class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">
                <span><?php echo esc_html( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span>
            </button>
            <ul class="custom-primary-menu">
                <li><a href="<?php echo esc_url( home_url( '/nous-rencontrer' ) ); ?>"><?php esc_html_e( 'Nous rencontrer', 'storefront' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/admin' ) ); ?>"><?php esc_html_e( 'Admin', 'storefront' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/commander' ) ); ?>"><?php esc_html_e( 'Commander', 'storefront' ); ?></a></li>
            </ul>
        </nav><!-- #site-navigation -->
        <?php
    }
} 


// Ajouter un lien personnalisé au menu principal pour les utilisateurs connectés
function ajouter_lien_admin_menu( $items, $args ) {
    // Vérifiez que nous sommes bien dans le menu principal
    if ( $args->theme_location == 'primary' ) {
        // Vérifiez si l'utilisateur est connecté
        if ( is_user_logged_in() ) {
            // Ajoutez le lien "Admin" si l'utilisateur est connecté
            $items .= '<li class="menu-item"><a href="' . esc_url( admin_url() ) . '">Admin</a></li>';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_menu', 10, 2 );




function custom_storefront_footer() {
    // Rimuove i widget del footer
    remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );

    // Rimuove la funzione standard dei crediti
    remove_action( 'storefront_footer', 'storefront_credit', 20 );

    // Aggiunge la tua versione della sezione legale nel footer
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}
add_action( 'init', 'custom_storefront_footer' );

// Funzione personalizzata per visualizzare solo la parte legale nel footer
function custom_storefront_credit() {
    ?>
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> -  Mentions légales</p>
    </div><!-- .site-info -->
    <?php
}


