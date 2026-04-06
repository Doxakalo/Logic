<?php 
class Router {

    public function getPage(): string {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $page = trim($uri, '/');

        if ($page === '') {
            $page = 'main';
        }

        return $page;
    }

    public function router(): void {
        
        $page = $this->getPage();
        
        $routes = [
            'main' => 'main.php',
            'informations' => 'informations.php',
        ];

        if (array_key_exists($page, $routes)) {
            require_once __DIR__ . '/pages/' . $routes[$page];
        } else {
            http_response_code(404);
            echo "404 - Page not found";
        }
    }
}
?>