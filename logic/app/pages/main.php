<?php
require_once __DIR__ . '/../modules/logicGenerated.php';

$logicGenerated = new LogicGenerated();

echo '<section id="logicGenerated" class="mt-4">
        <div class="section-child>"' . "\n";
            echo $logicGenerated->renderGeneratedCircles("b");       
echo '  </div>
      </section>';
?>