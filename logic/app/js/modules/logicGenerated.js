export default class LogicGeneratedJs {
    constructor() {
        this.container = document.getElementById('logic-generated');
        this.colors = ['red', 'yellow', 'orange', 'green', 'purple', 'blue'];
        this.positions = ['first', 'second', 'third', 'fourth'];
        this.interval = null;
        this.seconds = 0;
        this.duration = 5; 
        this.fastFlashes = 10;
    }

    createCircle(color, position) {

        const col = document.createElement('div');
        col.className = 'col-3';
        col.innerHTML = `
            <div class="py-3">
                <div class="logic-circle-big ${color} ${position}" id="${color}Generated"></div>
            </div>
        `;
        return col;

    }

    generateRandomCircles() {

        this.container.innerHTML = '';

        // zde řešení, aby se barvy neopakovali
        const shuffledColors = [...this.colors].sort(() => 0.5 - Math.random());

        for (let i = 0; i < 4; i++) {
            const color = shuffledColors[i]; 
            const position = this.positions[i];
            const circle = this.createCircle(color, position);
            this.container.appendChild(circle);
        }

    }

    startAnimation() {
        this.seconds = 0;
        this.interval = setInterval(() => {
            this.generateRandomCircles();
            this.seconds++;

            if (this.seconds >= this.duration) {
                clearInterval(this.interval);
                this.startFinalAnimation();
            }
        }, 500);
    }

    startFinalAnimation() {

        const flashes = this.fastFlashes;
        let count = 0;

        const finalInterval = setInterval(() => {
            this.container.innerHTML = '';

            // vytvoření unikátních barev pro každý flash, obdobně, jako na řádku 29
            const shuffledColors = [...this.colors].sort(() => 0.5 - Math.random()).slice(0, 4);

            for (let i = 0; i < 4; i++) {
                const color = shuffledColors[i];
                const position = this.positions[i];
                const circle = this.createCircle(color, position);
                this.container.appendChild(circle);
            }

            count++;
             if (count >= flashes) {
                clearInterval(finalInterval);

                this.addQuestionMarks();
            }

        }, 100);
        
    }

    addQuestionMarks() {
        const circles = this.container.querySelectorAll('.logic-circle-big');
        circles.forEach(circle => {
            const questionMark = document.createElement('div');
            questionMark.className = 'question-mark-filler';
            questionMark.textContent = '?';
            circle.appendChild(questionMark);
        });
    }


    run() {
        this.startAnimation();
    }
}