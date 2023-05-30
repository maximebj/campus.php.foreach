<?php 
    echo $song['title'] . '<br><br>';

    foreach ( $song['refrain'] as $line ) {
        echo $line . '<br>';
    }
    
    echo '<br>' . $song['author'];
 ?>