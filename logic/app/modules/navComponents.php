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
                <button type="button" class="demo-btn">'
                . $this->demoText . 
                '</button>
            </div>'
        ;
    }

    public function renderNewGame(): string {
        return '
            <div class="nav-component">
                <button type="button" class="new-game-btn">'
                . $this->newGameText . 
                '</button>
            </div>'
        ;
    }

    public function renderOptions(): string {
        $selected = $_SESSION['difficulty'] ?? 'beginner'; 

        return '
                <form method="POST">
                    <select class="nav-component" name="difficulty" onchange="this.form.submit()">
                        <option value="beginner" '.($selected === 'beginner' ? 'selected' : '').'>Beginner</option>
                        <option value="master" '.($selected === 'master' ? 'selected' : '').'>Master</option>
                    </select>
                </form>'
        ;
    }

    public function renderRedirect(string $href, string $title, string $redirect, string $ms):string {

        return '<div class="nav-component ' . $ms . '">
                    <a href="' . $href . '" class="nav-link" title="' . $title . '">
                        ' . $redirect . '
                    </a>
                </div>'
        ;
    }

} 
?>