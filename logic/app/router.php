<?php 
class Router {

    public function getPage(): string {
        return $_GET['p'] ?? 'main';
    }

    public function router(): void {
        
        $page = $this->getPage();
        
        $routes = [
            'main' => 'main.php',
            'informations' => 'informations.php',
        ];

        if (array_key_exists($page, $routes)) {
            require __DIR__ . '/pages/' . $routes[$page];
        } else {
            http_response_code(404);
            echo "404 - Page not found";
        }
    }
}
?>