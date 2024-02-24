<?php
        session_start();
        session_destroy();
        header("Location: ../index.php");  //redirection vers la page d'accueil du site après déconnexion