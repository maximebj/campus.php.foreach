<?php 
    function cleanSong() {
        global $song;

        // Le & est un passage en référence = on modifie directement le tableau qu'on itère
        foreach ($song['data'] as $key => &$verse) {

            // On ne dédoublonne pas de la même manière le refrain et les couplets
            if (str_contains($key, 'chorus')) {
                
                // On retire une ligne sur 2
                foreach ($verse as $key => $line ) {
                    if( $key % 2 == 0 ) {
                        unset($verse[$key]);
                    }
                }

            } else {
                $verse = array_unique($verse);
            }
        }
    }

    function getAuthor() {
        global $song;
        return '<br>' . $song['author'];
    }

    function getTitle() {
        global $song;
        return $song['title'] . '<br>';
    }

    // On commence par nettoyer les doublons
    cleanSong();
    
    echo getTitle();

    foreach ($song['data'] as $verse) {
        
        echo '<br>';
        
        foreach ($verse as $line) {
            echo $line . '<br>';
        }
    }
    
    echo getAuthor();
 ?>