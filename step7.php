<?php 
    function getTitle() {
        global $song;
        return $song['title'] . '<br>';
    }

    function getAuthor() {
        global $song;
        return '<br>' . $song['author'];
    }
    
    function getChorus() {
        global $song;

        $html = '<br>';
        foreach ($song['data']['chorus']['chorus_1'] as $line) {
            $html.= $line . '<br>';
        }
        $html.= '<br>';

        return $html;
    }

    function getVerses() {
        global $song;

        foreach ($song['data']['verse'] as $verse) {
            echo getChorus();
            
            foreach ($verse as $line) {
                echo $line . '<br>';
            }
        }
    }
    
    echo getTitle();
    echo getVerses();
    echo getAuthor();
 ?>