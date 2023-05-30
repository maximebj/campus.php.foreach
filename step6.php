<?php 
    echo $song['title'] . '<br><br>';

    foreach ($song['data'] as $key => $verse) {
        foreach ( $verse as $index => $line ) {
            echo $key . " : ligne => " . $index . ' ' . $line . '<br>';
        }

        echo '<br>';
    }
    
    echo $song['author'];
 ?>