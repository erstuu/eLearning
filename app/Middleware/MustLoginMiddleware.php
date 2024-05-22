<?php

namespace RestuGedePurnama\Elearning\Middleware;

use RestuGedePurnama\Elearning\App\View;
use RestuGedePurnama\Elearning\Config\Database;
use RestuGedePurnama\Elearning\Repository\SessionRepository;
use RestuGedePurnama\Elearning\Repository\UserRepository;
use RestuGedePurnama\Elearning\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::redirect('/users/login');
        }
    }
}