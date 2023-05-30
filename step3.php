<?php 
    echo $song['title'] . '<br><br>';

    foreach ( $song['chorus'] as $line ) {
        echo $line . '<br>';
    }

    echo '<br>';

    foreach ( $song['first_verse'] as $line ) {
        echo $line . '<br>';
    }

    echo '<br>';

    foreach ( $song['chorus'] as $line ) {
        echo $line . '<br>';
    }

    echo '<br>';

    foreach ( $song['second_verse'] as $line ) {
        echo $line . '<br>';
    }
    
    echo '<br>' . $song['author'];
 ?>