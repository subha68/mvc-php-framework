<?php

namespace aep\phpmvc;

use aep\phpmvc\db\Database;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

class Application {
    public static string $ROOT_DIR;
    public string $baseDir;
    public string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public ?UserModel $user;
    public View $view;

    public function __construct($rootPath, array $config) {
        $this->baseDir = $config['baseDir'] ?? '';
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();
        $primaryValue = $this->session->get('user');
        if ($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function getController() {
        return $this->controller;
    }

    public function setController(Controller $controller) {
        $this->controller = $controller;
    }

    public function run() {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function login(UserModel $user) {
        $primaryKey = $this->userClass::primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout() {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest() {
        return !self::$app->user;
    }
}