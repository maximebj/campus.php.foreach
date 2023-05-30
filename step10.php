<?php 

    function cleanVerseEasy() {
        global $song;

        $verse = $song['data']['verse'];

        $verse1 = array_merge($verse['first_verse1'], $verse['first_verse2'], $verse['first_verse3']);
        $verse2 = array_merge($verse['second_verse1'], $verse['second_verse2'], $verse['second_verse3']);

        $song['data']['verse'] = [
            'first_verse' => $verse1,
            'second_verse' => $verse2
        ];
    }


    function cleanVerseOptimal() {
        global $song;
        
        $newVerse = [
            'first_verse' => [],
            'second_verse' => [],
        ];

        // On parcours le tableau afin de fusionner les parties de couplets
        foreach($song['data']['verse'] as $key => $verse) {

            if( str_contains( $key , 'first' ) ) {
                $newVerse['first_verse'] = array_merge( $newVerse['first_verse'], $verse );
            }
            if( str_contains( $key, 'second' ) ) {
                $newVerse['second_verse'] = array_merge( $newVerse['second_verse'], $verse );
            }
        }

        // On écrase l'ancien tableau par le nouveau
        $song['data']['verse'] = $newVerse;
    }

    function getAuthor() {
        global $song;
        return '<br>' . $song['author'];
    }

    function getChorus() {
        global $song;

        $html = '<br>';
        foreach ($song['data']['chorus'] as $line) {
            $html .= $line . '<br>';
        }
        $html .= '<br>';

        return $html;
    }

    function getTitle() {
        global $song;
        return $song['title'] . '<br>';
    }

    // Nettoyage
    cleanVerseOptimal();

    // Affichage
    echo getTitle();

    foreach ($song['data']['verse'] as $verse) {
        echo getChorus();
        
        foreach ($verse as $line) {
            echo $line . '<br>';
        }
    }
    
    echo getAuthor();



    