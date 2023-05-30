<?php 
    echo $song['title'] . '<br><br>';

    foreach ($song['data'] as $verse) {
        foreach ( $verse as $line ) {
            echo $line . '<br>';
        }

        echo '<br>';
    }
    
    echo $song['author'];
 ?>