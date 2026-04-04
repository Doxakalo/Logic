<?php
require_once __DIR__ . '/../router.php';
require_once __DIR__ . '/../modules/navComponents.php';

$router = new Router();
$navComponents = new NavComponents('Demo', 'New game', 'Options');

$page = $router->getPage();
$ms = "ms-3";

echo '
<header class="d-flex align-items-center justify-content-center">'. "\n";
    if ($page === 'main') {
        echo $navComponents->renderDemo();
        echo $navComponents->renderNewGame();
        echo $navComponents->renderOptions();
        echo'<div class="game-options-divider ms-3">&nbsp;</div>';
    } else {
        echo $navComponents->renderRedirect("/", "back to main page", "main", "");
        $ms = "";
    }
    echo $navComponents->renderRedirect("best-regards", "redirect to best regards", "best-regards", $ms);
echo '
</header>' . 
"\n";
?>