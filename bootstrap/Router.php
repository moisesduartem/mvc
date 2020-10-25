<?php

namespace Bootstrap
{

    use Bootstrap\Exceptions\BaseUrlIsNotFilled;
    use Bootstrap\Exceptions\RouteDoesNotExist;

    /**
     * Class Router
     * @package Bootstrap
     */
    class Router extends UrlHandler
    {
        /**
         * @var array
         */
        private array $routes;

        /**
         * @var string
         */
        protected string $namespace;

        /**
         * Router constructor.
         * @param string $baseUrl
         */
        public function __construct(string $baseUrl)
        {
            if ($baseUrl == '' || empty($baseUrl)) {
                throw new BaseUrlIsNotFilled();
            }
            parent::__construct($baseUrl);
        }

        /**
         * @param string $route
         * @param string $action
         */
        public function on(string $route, string $action)
        {
            $splited = $this->splitAction($action);
            $this->routes[] = [
                'url' => $route,
                'controller' => $splited[0],
                'method' => $splited[1],
            ];
        }

        /**
         * @param string $action
         * @return array
         */
        private function splitAction(string $action = ''): array
        {
           return explode('.', $action, '2');
        }

        /**
         * @param string $controller
         * @param string $method
         */
        private function executeAction(string $controller, string $method): void
        {
            $className = $this->getNamespace() . $controller;
            $controller = new $className();
            $controller->{$method}();
        }

        /**
         * @return bool
         */
        public function sprintRoutes(): bool
        {
           foreach ($this->routes as $route)
           {
               if ($route['url'] == $this->getActualRoute() ||
                   $route['url'] . '/' == $this->getActualRoute()) {
                   $this->executeAction($route['controller'], $route['method']);
                   return true;
               }
           }
           return false;
        }

        /**
         * @throws RouteDoesNotExist
         */
        public function run()
        {
            if (!$this->sprintroutes()) {
                throw new RouteDoesNotExist();
            }
        }

        /**
         * @param string $namespace
         */
        public function setNamespace(string $namespace): void
        {
            $this->namespace = $namespace;
        }

        /**
         * @return string
         */
        public function getNamespace(): string
        {
            return $this->namespace;
        }
    }
}