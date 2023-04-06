<?php


//Fonction pour tronquer un texte qui dépasse les 50 mots
function truncateContent($content, $maxLength) {
    if (strlen($content) > $maxLength) {
        $content = substr($content, 0, $maxLength) . '...';
    }
    return $content;
}

?>



