export default class Demo {

    constructor(logicPlayArea, maxGuesses = 9) {
        this.logicPlayArea = logicPlayArea;
        this.colors = ['yellow','red','blue','green','orange','purple'];
        this.positions = 4;
        this.delay = 300; // prodleva mezi kreslením jednotlivých políček
        this.maxGuesses = maxGuesses;

        this.allCombinations = this.generateAllCombinations(); // generuje všechny 1296 kombinací
        this.possibleSolutions = [...this.allCombinations];
        this.currentRow = 1;
    }

    async run() {

        let guess = ['red','red','blue','blue'];

        while (this.currentRow <= this.maxGuesses) {

            await this.playRow(this.currentRow, guess);

            const feedback = this.getFeedbackFromDOM(this.currentRow);

            if (feedback.correctPosition === 4) {
                await this.sleep(this.delay);
                alert(`Vyhráno pomocí Knuth predikce v  ${this.currentRow} krocích`);
                location.reload();
                return;
            }

            this.possibleSolutions = this.possibleSolutions.filter(solution =>
                this.compare(solution, guess).correctPosition === feedback.correctPosition &&
                this.compare(solution, guess).correctColor === feedback.correctColor
            );

            // výběr podle tlačítka a minmax strategie
            guess = this.chooseNextGuess(this.possibleSolutions);

            this.currentRow++;
        }

        alert('Knuth predikce selhala');
        location.reload();
    }

    generateAllCombinations() {
        const results = [];

        const recurse = (current) => {
            if (current.length === this.positions) {
                results.push([...current]);
                return;
            }

            for (let color of this.colors) {
                current.push(color);
                recurse(current);
                current.pop();
            }
        };

        recurse([]);
        return results;
    }

    async playRow(row, guess) {
        for (let i = 0; i < this.positions; i++) {
            const el = document.querySelector(`#row-${row}-guess-${i+1}`);
            await this.sleep(this.delay);
            el.classList.remove('logic-circle-big-not-filled');
            el.classList.add('logic-circle-big', guess[i]);
        }

        this.logicPlayArea.evaluateRow(row);
        this.finishRowUI(row);
    }

    compare(solution, guess) {
        let correctPosition = 0;
        let correctColor = 0;

        const solutionCopy = [...solution];
        const guessCopy = [...guess];

        // barva i pozice správně
        for (let i = 0; i < this.positions; i++) {
            if (guess[i] === solution[i]) {
                correctPosition++;
                solutionCopy[i] = null;
                guessCopy[i] = null;
            }
        }

        // barva správně pozice špatně
        for (let i = 0; i < this.positions; i++) {
            if (!guessCopy[i]) continue;
            const index = solutionCopy.indexOf(guessCopy[i]);
            if (index !== -1) {
                correctColor++;
                solutionCopy[index] = null;
            }
        }

        return { correctPosition, correctColor };
    }

    getFeedbackFromDOM(row) {
        const resultEls = document.querySelectorAll(`[id^="row-${row}-success-"]`);
        let correctPosition = 0;
        let correctColor = 0;

        resultEls.forEach(el => {
            if (el.classList.contains('bg-success')) correctPosition++;
            if (el.classList.contains('bg-danger')) correctColor++;
        });

        return { correctPosition, correctColor };
    }

    chooseNextGuess(possibleSolutions) {
        if (possibleSolutions.length === 1) return possibleSolutions[0];

        let bestGuess = null;
        let minMax = Infinity;

        for (let guess of this.allCombinations) {
            const counts = {};

            for (let solution of possibleSolutions) {
                const feedback = this.compare(solution, guess);
                const key = `${feedback.correctPosition}-${feedback.correctColor}`;
                counts[key] = (counts[key] || 0) + 1;
            }

            const maxCount = Math.max(...Object.values(counts));
            if (maxCount < minMax) {
                minMax = maxCount;
                bestGuess = guess;
            } else if (maxCount === minMax && Math.random() > 0.5) {
                bestGuess = guess; // náhodný „tricky“ výběr
            }
        }

        return bestGuess;
    }

    finishRowUI(row) {
        const left = document.querySelector(`[id^="row-${row}-guess-1"]`)?.closest('.col-8');
        if (!left) return;

        left.classList.remove('playing');
        left.classList.add('played');

        const right = left.parentElement.querySelector('.col-1');
        right.classList.remove('playing');
        right.classList.add('played');

        const nextLeft = document.querySelector(`[id^="row-${row+1}-guess-1"]`)?.closest('.col-8');
        if (!nextLeft) return;

        nextLeft.classList.remove('not-played');
        nextLeft.classList.add('playing');

        const nextRight = nextLeft.parentElement.querySelector('.col-1');
        nextRight.classList.remove('not-played');
        nextRight.classList.add('playing');
    }

    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
}