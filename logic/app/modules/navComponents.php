<?php
class NavComponents {
    private string $demoText;
    private string $newGameText;
    private string $optionsText;

    public function __construct (string $demoText, string $newGameText, string $optionsText) {
        $this->demoText= $demoText;
        $this->newGameText = $newGameText;
        $this->optionsText = $optionsText;
    }

    public function renderDemo(): string {
        return '
            <div class="nav-component me-3">
                <button type="button" class="demo-btn" id="demoBtn">'
                . $this->demoText . 
                '</button>
            </div>' . "\n"
        ;
    }

    public function renderNewGame(): string {
        return '
            <div class="nav-component">
                <button type="button" class="new-game-btn" id="newGameBtn">'
                . $this->newGameText . 
                '</button>
            </div>' . "\n"
        ;
    }

    public function renderOptions(): string {
        $selected = $_SESSION['difficulty'] ?? 'beginner'; 

        return '
                <form method="POST" action="index.php">
                    <select class="nav-component" name="difficulty" onchange="this.form.submit()">
                        <option value="beginner" '.($selected === 'beginner' ? 'selected' : '').'>Beginner</option>
                        <option value="master" '.($selected === 'master' ? 'selected' : '').'>Master</option>
                    </select>
                </form>' . "\n"
        ;
    }

    public function renderRedirect(string $href, string $title, string $redirect, string $ms):string {

        return '<div class="nav-component ' . $ms . '">
                    <a href="' . $href . '" class="nav-link" title="' . $title . '">
                        ' . $redirect . '
                    </a>
                </div>' . "\n"
        ;
    }

} 
?>