<?php

namespace app\core;

require_once("Request.php");
require_once("form/Form.php");

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get( $path, $callback)
    {
        $path = "/" . basename(Application::$ROOT_DIR) . "/index.php" . $path;
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,  $callback): void
    {
        $path = "/" . basename(Application::$ROOT_DIR) . "/index.php" . $path;
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = $callback[0];

        }

        return call_user_func($callback, $this->request, $this->response);

    }

    public function renderView($view, $params = [])
    {
        $layoutContet = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContet);
    }

    public function renderContent(string $viewContent)
    {
        $layoutContet = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContet);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key=>$value){
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}






