<?php 
    echo $song['title'] . '<br><br>';

    foreach ($song['data'] as $key => $verse) {
        foreach ( $verse as $line ) {
            echo $key . " : " . $line . '<br>';
        }

        echo '<br>';
    }
    
    echo $song['author'];
 ?>