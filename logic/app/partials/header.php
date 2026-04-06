<?php
require_once __DIR__ . '/../router.php';
require_once __DIR__ . '/../modules/navComponents.php';

$router = new Router();
$navComponents = new NavComponents('Demo', 'New game', 'Options');

$page = $router->getPage();
$ms = "ms-0 ms-sm-3";

echo '
<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light d-flex d-sm-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">LogicGame</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav ms-auto d-flex align-items-center">';

                    // Desktop / Mobile links
                    if ($page === 'main') {
                        echo $navComponents->renderDemo();
                        echo $navComponents->renderNewGame();
                        echo $navComponents->renderOptions();
                        echo '<div class="nav-item me-3 game-options-divider">&nbsp;</div>';
                    } else {
                        echo $navComponents->renderRedirect("/", "back to main page", "main", "");
                        $ms = "";
                    }
                    echo $navComponents->renderRedirect("informations", "redirect to informations", "Informations", $ms);

echo '          
                </div>
            </div>
        </div>
    </nav>' . "\n";

//konec mobile navbaru a začítek navigace na malých displayích a větších
echo '
    <div class=" d-none d-sm-flex row">¨
        <div class="col-2 d-flex align-items-center">
            <h1>
                <a class="navbar-brand ms-3" href="/">Logic</a>
            </h1>
        </div>
        <div class="col-8 d-flex align-items-center justify-content-center">'. "\n";
        
            if ($page === 'main') {
                echo $navComponents->renderDemo();
                echo $navComponents->renderNewGame();
                echo $navComponents->renderOptions();
                echo'<div class="game-options-divider ms-3">&nbsp;</div>';
            } else {
                echo $navComponents->renderRedirect("/", "back to main page", "main", "");
                $ms = "";
            }

            echo $navComponents->renderRedirect("informations", "redirect to informations", "Info", $ms);
echo '  
        </div>
    </div>
</header>' . 
"\n";
?>