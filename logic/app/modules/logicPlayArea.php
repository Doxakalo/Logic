<?php 
class LogicPlayArea {

    private function getLivesByDifficulty(): int {
        $diff = $_SESSION['difficulty'] ?? 'beginner'; 

        switch ($diff) {
            case 'beginner':
                return 10;
            case 'master':
                return 6;
            default:
                return 10;
        }

    }

    private function circleDiv(string $color): string {

        return '
            <div class="col-2">
                <div class="py-3">
                    <div class="logic-circle-big pointer ' . $color . '" id="' . $color . 'Picker">
                    </div>
                </div>
            </div>
        ';

    }

    private function colorPicker(): string {

        $collorArray = ['yellow', 'orange', 'green', 'purple', 'red', 'blue'];

        $return = '<div class="row border border-dark rounded">';

        foreach ($collorArray as $collor) {
            $return .= $this->circleDiv($collor);
        }

        $return .= '</div>';

        return $return;
    }

    public function playBoardComponent(int $row, string $class, array $border): string {
        return '
            <div class="row g-0 ">
                <div class="col-8 relative-position px-3 px-md-0 ' . $border[0] . ' ' . $class . '">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                            <div class="py-4 py-md-3">
                                <div class="logic-circle-big-not-filled" id="row-' . $row . '-guess-1">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <div class="py-4 py-md-3">
                                <div class="logic-circle-big-not-filled" id="row-' . $row . '-guess-2">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <div class="py-4 py-md-3">
                                <div class="logic-circle-big-not-filled" id="row-' . $row . '-guess-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <div class="py-4 py-md-3">
                                <div class="logic-circle-big-not-filled" id="row-' . $row . '-guess-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="playboard-divider">
                    </div>    
                </div>
                <div class="col-4 col-md-2 col-xl-1 z-3 ' . $border[1] . ' ' . $class . '">
                    <div class="row p-2">
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <div class="py-1 pe-2">
                                <div class="logic-circle-small border border-dark" id="row-' . $row . '-success-1">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <div class="py-1 pe-2">
                                <div class="logic-circle-small border border-dark" id="row-' . $row . '-success-2">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2 d-flex align-items-center justify-content-center">
                            <div class="py-1 pe-2">
                                <div class="logic-circle-small border border-dark" id="row-' . $row . '-success-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2 d-flex align-items-center justify-content-center">
                            <div class="py-1 pe-2">
                                <div class="logic-circle-small border border-dark" id="row-' . $row . '-success-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

    public function returnBorder(int $row, int $lives):array {

        if ($row === 1) {
            return ['border-first-left', 'border-first-right'];
        } else if ( $row === $lives) {
            return ['border-last-left', 'border-last-right'];
        } else {
            return ['border-between-left', 'border-between-right'];
        }
    }

    public function generatePlayBoard():string {
        $lives = $this->getLivesByDifficulty();

        $return = '';
        for ($i = 1; $i <= $lives; $i++) {
            if ($i != 1) {
                $class = 'not-played';
            } else {
                $class = 'playing';
            }

            $border = $this->returnBorder($i, $lives);
            $return .= $this->playBoardComponent($i, $class, $border);
        }

        return $return;
    }

    public function renderPlayArea(): string {
        
        return '
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-12 col-md-9 col-xl-8 me-0 ms-0 ms-xl-5 ms-xxl-0 me-xl-5 col-xxl-4">
                    <h2>Vyber barvu</h2>
                    <div class="px-2">
                        '.
                        $this->colorPicker()
                        .'
                    </div>
                </div>
                
                <div class="offset-0 offset-md-1 col-12 col-md-9 col-xxl-5  offset-0 offset-xl-1 offset-xxl-0 d-block justify-content-center ps-0 ps-md-4 ps-xl-0">
                    <div>
                        <h2>Hrací deska hry Logic</h2>
                        '.
                        $this->generatePlayBoard()
                        .'
                    </div>
                </div>
            </div>
        ';

    }
}
?>