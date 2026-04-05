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
                    console.log('Kliknuto na Demo tlačítko!');
                    demo.run(); 
                }
            });
        });
        break;
    case 'best-regards':
        break;
}
