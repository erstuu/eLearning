<?php

namespace RestuGedePurnama\Elearning\Controller;

use RestuGedePurnama\Elearning\App\View;
use RestuGedePurnama\Elearning\Config\Database;
use RestuGedePurnama\Elearning\Repository\SessionRepository;
use RestuGedePurnama\Elearning\Repository\UserRepository;
use RestuGedePurnama\Elearning\Service\SessionService;

class HomeController
{

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function index()
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::render('Home/index', [
                "title" => "Login eLearning"
            ]);
        } else {
            View::render('Home/dashboard', [
                "title" => "Dashboard",
                "user" => [
                    "name" => $user->name
                ]
            ]);
        }
    }

}