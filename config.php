<?php

/**
 * This file contains all available configurations for YouDesigner. Every configuration value below contains some information as to what it means.
 */

return array(

    'theme_vars' => array(
        // This array contains sample data for the control panel which can be set in the Logo/Footer/Colors section in YouHosting.
        // Want to see if your design works with your logo? Just enter the URL here!
        'cpanel' => array(
            // Your master domain.
            'domain' => 'examplehost.com',

            // The URL to your control panel
            'url' => 'http://cpanel.main-hosting.com/',

            // The URL to your logo
            'logo' => 'http://static.main-hosting.com/images/cpanel-logo.png',

            // Login page colors
            'login-background-color' => '#e1e5e8',
            'login-background-image' => 'http://static.main-hosting.com/wallpapers/picture-1.jpg',
            'login-foreground-color' => '#fff',
        ),
        // This information contains sample data used for client information. If seeing "Example Client" everywhere bugs you, change it here (it removes "some" of the instances).
        'client' => array(
            'id' => '123456',
            'name' => 'Example Client',
            'email' => 'client@example.com',
        ),
    ),

    // Engage developer mode and get full debug traces.
    'debug' => false,

    // This can/could/will be used to load modified HTML based on which theme is loaded. Currently, only the X1 theme has been added
    // but works with all default themes so this value isn't relevant. Don't change it though, it will break stuff.
    'theme' => 'x1',

);