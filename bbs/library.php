<?php
// htmlspecialcharsを短くする //
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}
?>