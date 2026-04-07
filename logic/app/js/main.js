console.log("fungujeu");
import LogicGeneratedJs from './modules/logicGenerated.js';
import LogicPlayAreaJs from './modules/logicPlayArea.js';
import Demo from './modules/demo.js';

let urlParams = new URLSearchParams(window.location.search);
let page = urlParams.get('p') || 'main';

switch(page) {
    case 'main':
        document.addEventListener('DOMContentLoaded', () => {
            const logicGenerate = new LogicGeneratedJs();
            logicGenerate.run();

            const logicPlayArea = new LogicPlayAreaJs();
            logicPlayArea.run();

            const demo = new Demo(logicPlayArea);
            document.addEventListener('click', (e) => {
                if (e.target && e.target.id === 'demoBtn') {
                    demo.run(); 
                }
            });

            document.addEventListener('click', (e) => {
                if (e.target && e.target.id === 'newGameBtn') {
                    window.location.reload();
                }
            });
        });
        break;
    case 'best-regards':
        break;
}
