import LogicGeneratedJs from './modules/logicGenerated.js';
import LogicPlayAreaJs from './modules/logicPlayArea.js';
import Demo from './modules/demo.js';

let page = window.location.pathname.substring(1);

if (page.length === 0) {
    page = 'main';
}



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
