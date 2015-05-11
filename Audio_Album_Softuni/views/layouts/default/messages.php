<?php

if ( isset( $_SESSION['messages'] ) ) {
    echo '<ul>';

    foreach( $_SESSION['messages'] as $msg ) {
        echo '<li class="'. $msg['type'] . '">';
        echo htmlspecialchars($msg['text']);
        echo '</li>';
    }

    unset($_SESSION['messages']);

    echo '</ul>';
}