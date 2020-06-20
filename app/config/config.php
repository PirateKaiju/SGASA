<?php

    //Constants and configuration values 

    //ROOT OF APP DIRECTORY
    define('APPROOT', dirname(dirname(__FILE__)));

    //ROOT OF THE WEBSITE ITSELF
    define('URLROOT', 'http://localhost/Animais');

    define('DB_FILE', 'sqlite:db/animais_db.sqlite');

    define('SITENAME', 'Gerenciamento de Animais');

    //LIMIT FOR PAGINATION
    define('RESULTS_PER_PAGE', 6);

    define('PAGES_SHOWN', 5);


?>