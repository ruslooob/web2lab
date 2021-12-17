<?php
// input  https://www.youtube.com/watch?v=qcPfI0y7wRU
// output https://www.youtube.com/embed/qcPfI0y7wRU
function getEmbedLink(string $link) : string {
    $eqPos = strpos($link, "=");
    return "https://www.youtube.com/embed/" . substr($link, $eqPos + 1);
}
