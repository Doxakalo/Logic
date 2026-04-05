export default class LogicPlayAreaJs {

    constructor() {
        this.selectedColor = null;
        this.currentRow = 1;
        this.maxSlots = 4;
    }

    run() {
        this.handlePick();
    }

    // zde vybírám barvu
    handlePick() {
        const pickers = document.querySelectorAll('.logic-circle-big.pointer');

        pickers.forEach(picker => {
            picker.addEventListener('click', () => {

                const colors = ['yellow','red','blue','green','orange','purple'];

                this.selectedColor = colors.find(c =>
                    picker.classList.contains(c)
                );
            });
        });

        this.handleBoardClick();
    }

    // handler klikání do playboardu
    handleBoardClick() {
        const cells = document.querySelectorAll('.logic-circle-big-not-filled');

        cells.forEach(cell => {
            cell.addEventListener('click', () => this.handleCellClick(cell));
        });
    }

    handleCellClick(el) {

        if (!this.selectedColor) return;

        if (!el.id.startsWith(`row-${this.currentRow}`)) return;

        if (!el.classList.contains('logic-circle-big-not-filled')) return;

        el.classList.remove('logic-circle-big-not-filled');
        el.classList.add('logic-circle-big', this.selectedColor);

        this.checkRowFilled();
    }

    checkRowFilled() {
        const rowCells = document.querySelectorAll(
            `[id^="row-${this.currentRow}-guess-"]`
        );

        const filled = [...rowCells].every(el =>
            !el.classList.contains('logic-circle-big-not-filled')
        );

        if (filled) {
            this.finishRow();
        }
    }

    finishRow() {

        const row = this.currentRow;

        const left = document.querySelector(
            `[id^="row-${row}-guess-1"]`
        ).closest('.col-8');

        left.classList.remove('playing');
        left.classList.add('played');

        const right = left.parentElement.querySelector('.col-1');

        right.classList.remove('playing');
        right.classList.add('played');

        this.evaluateRow(row);

        this.currentRow++;

        const nextLeft = document.querySelector(
            `[id^="row-${this.currentRow}-guess-1"]`
        )?.closest('.col-8');

        if (!nextLeft) return;

        nextLeft.classList.remove('not-played');
        nextLeft.classList.add('playing');

        const nextRight = nextLeft.parentElement.querySelector('.col-1');

        nextRight.classList.remove('not-played');
        nextRight.classList.add('playing');
    }

    evaluateRow(row) {

        const colors = ['yellow','red','blue','green','orange','purple'];

        const solutionElements = document.querySelectorAll(
            '#logic-generated .logic-circle-big'
        );

        const solution = [...solutionElements].map(el =>
            colors.find(c => el.classList.contains(c))
        );

        const guessElements = document.querySelectorAll(
            `[id^="row-${row}-guess-"]`
        );

        const guess = [...guessElements].map(el =>
            colors.find(c => el.classList.contains(c))
        );

        const resultElements = document.querySelectorAll(
            `[id^="row-${row}-success-"]`
        );

        let correctPosition = 0;
        let correctColor = 0;

        const solutionCopy = [...solution];
        const guessCopy = [...guess];

        for (let i = 0; i < 4; i++) {
            if (guess[i] === solution[i]) {
                correctPosition++;
                solutionCopy[i] = null;
                guessCopy[i] = null;
            }
        }

        for (let i = 0; i < 4; i++) {
            if (!guessCopy[i]) continue;

            const index = solutionCopy.indexOf(guessCopy[i]);
            if (index !== -1) {
                correctColor++;
                solutionCopy[index] = null;
            }
        }

        let i = 0;

        for (; i < correctPosition; i++) {
            resultElements[i].classList.add('bg-success');
        }

        for (; i < correctPosition + correctColor; i++) {
            resultElements[i].classList.add('bg-danger');
        }

        if (correctPosition === 4) { 
            alert('Vyhrál jste, gratuluji');
            //location.reload();
        }

        if (this.currentRow === 10 && correctPosition !== 4) {
            alert('Prohrál jste');
            //location.reload();
        }
    }
}