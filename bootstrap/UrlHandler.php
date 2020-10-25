<?php


namespace Bootstrap
{
    /**
     * Class UrlHandler
     * @package Bootstrap
     */
    class UrlHandler
    {
        /**
         * @var string
         */
        protected string $baseUrl;
        /**
         * @var string
         */
        protected string $actualUrl;
        /**
         * @var string
         */
        protected string $actualRoute;

        /**
         * UrlHandler constructor.
         * @param string $baseUrl
         */
        public function __construct(string $baseUrl)
        {
            $this->setBaseUrl($baseUrl);
            $this->setActualUrl($_SERVER['REQUEST_URI']);
            $this->setActualRoute(str_replace($this->getBaseUrl(), '', $this->getActualUrl()));
        }

        /**
         * @param string $baseUrl
         */
        public function setBaseUrl(string $baseUrl): void
        {
            $this->baseUrl = $baseUrl;
        }

        /**
         * @return string
         */
        public function getBaseUrl(): string
        {
            return $this->baseUrl;
        }

        /**
         * @param mixed|string $actualUrl
         */
        public function setActualUrl($actualUrl): void
        {
            $this->actualUrl = $actualUrl;
        }

        /**
         * @return mixed|string
         */
        public function getActualUrl()
        {
            return $this->actualUrl;
        }

        /**
         * @param string $actualRoute
         */
        public function setActualRoute(string $actualRoute): void
        {
            $this->actualRoute = $actualRoute;
        }

        /**
         * @return string
         */
        public function getActualRoute(): string
        {
            return $this->actualRoute;
        }
    }
}