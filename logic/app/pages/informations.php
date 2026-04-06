<?php
    echo '
    <section id="information">
        <div class="section-child d-flex justify-content-center">
            <div>
                <h2 class="mt-4">Předání</h2>
                <p class="mt-3">Tato stránka původně měla sloužit hlavně, jako ukázka redirectů a dynamicky generovaného headeru, ale nakonec jsem se rozhodl sem přidat informace, které mi přišli užitečné zmínit.</p>

                <h3 class="mt-4">Technologie</h3>
                <ul>
                    <li>Php 8.2</li>
                    <li>Javasript ES6</li>
                    <li>Css knihovna Bootstrap</li>
                    <li>Docker (dobrovolná)</li>
                    <li>Make (dobrovolný)</li>
                </ul>

                <h3 class="mt-4">Informace k cestám</h3>
                <ul>
                    <li>Css: app/css</li>
                    <li class="ms-3">Zde se vše propojuje do main.css.</li>
                    <li class="ms-5">V header.css řeším celé vlastní css do hlavičky.</li>
                    <li class="ms-5">V variables.css mám proměnné, které jinde v css využívám.</li>
                    <li class="ms-5">V logic.css jsou globální styly pro Logic/Mastermind.</li>
                    <li>PHP: app/modules, app/pages, app/router.php, app/partials, index.php.</li>
                    <li class="ms-3">Vše začíná v index.php, kde je naimportovaný router, header, router, začátek session ( do session ukládám nastavený obtížnosti pro zobrazení pokusů metodou POST ), a knihovna bootstrap.</li>
                    <li class="ms-3">V app/router.php probíhá routing a je rozdělený na dvě funkce, jelikož funkci getPage využívám i pro generování headeru.</li>
                    <li class="ms-3">V app/modules/navComponents.php vytvářím html obsah pro header, které jsou naimportované v headeru.</li>
                    <li class="ms-3">V app/pages/main.php jsem importoval html obsah z logicPlayArea.php a logicGenerated.php.</li>
                    <li class="ms-5">V app/modules/logicGenerated.php vytvářím html obsah pro generování hádaných barev, který je naimportovaný v app/pages/main.php.</li>
                    <li class="ms-5">V app/modules/logicPlayArea.php vytvářím html obsah pro hrací plochu, který je naimportovaný v app/pages/main.php.</li>
                    <li>Js: app/js</li>
                    <li class="ms-3">Zde se vše propojuje do main.js.</li>
                    <li class="ms-5">V app/modules/js/logicGenerated.js řeším animaci generování hádaných barev a následné otazníky pro logicGenerated.php</li>
                    <li class="ms-5">V app/modules/js/logicPlayArea.js řeším ošetření hry pomocí hráčského umu a následné odebrání otazníků při prohře, nebo výhře.</li>
                    <li class="ms-5">V app/modules/js/demo.js řeším demo, nahoře je maxGuesses které udávají limit algoritmu, ale zvolil jsem taktiku Donalda Knutha, která počítá do 5ti pokusů
                    <a href="https://en.wikipedia.org/wiki/Mastermind_(board_game)#Five-guess_algorithm" title="wiki" target="_blank">zde</a>, jelikož ostatní algoritmy mi občas selhaly a neuhodli, ale ošetření, kdyby náhodou knuth algoritmus selhal je ve funkci "async run" a začíná "red, red, blue, blue" jak knuth doporučuje.</li>
                    <li>Docker: /docker</li>
                    <li class="ms-3">Zde mám Dockerfile a docker-compose.yml, docker je nastaven, aby poslouchal na portu 8080.</li>
                    <li>Bootstrap: /lib</li>
                    <li class="ms-3">Zde mám css i js pro bootstrap, které importuji v index.php.</li>
                    <li>Make: ../Makefile</li>
                    <li class="ms-3">Do Makefile si píšu příkazy, které často používám pro urychlení práce.</li>
                </ul>

                <h3 class="mt-4">Závěr</h3>
                <p class="mt-3">Chtěl bych poděkovat za úkol. Programovat hru na webu bylo zábavné a doufám, že se úkol bude líbit a uvidíme se v dalším kole pohovoru, jelikož mám opravdu velký zájem u vás pracovat.</p>
            </div>
        </div>
    </section>' . "\n";
?>