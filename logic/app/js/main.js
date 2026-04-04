import LogicGeneratedJs from './modules/logicGenerated.js';

let page = window.location.pathname.substring(1);

if (page.length === 0) {
    page = 'main';
}

switch(page) {
    case 'main':
        const logic = new LogicGeneratedJs();
        logic.run();
        break;
    case 'best-regards':
        break;
}