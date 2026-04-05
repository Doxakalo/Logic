<?php
require_once __DIR__ . '/../modules/logicGenerated.php';
require_once __DIR__ . '/../modules/logicPlayArea.php';

$logicGenerated = new LogicGenerated();
$logicPlayArea = new LogicPlayArea();

echo '<section id="logicGenerated" class="mt-4">
        <div class="section-child">
            <div class="d-flex justify-content-center">' . "\n";
            
            echo $logicGenerated->renderGeneratedCircles();       
echo '      </div>
        </div>
      </section>';

echo '<section id="logicPlayArea" class="mt-4 d-block justify-content-center">
        <div class="section-child">' . "\n"; 
            echo $logicPlayArea->renderPlayArea();  
echo '  </div>
      </section>';      
?>