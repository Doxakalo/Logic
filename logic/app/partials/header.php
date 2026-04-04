<?php
require_once __DIR__ . '/../modules/navComponents.php';

$navComponents = new NavComponents('Demo', 'New game', 'Options');

echo '
<header class="d-flex align-items-center justify-content-center">'. "\n";
    echo $navComponents->renderDemo();
    echo $navComponents->renderNewGame();
    echo $navComponents->renderOptions();
echo '
</header>' . 
"\n";
?>