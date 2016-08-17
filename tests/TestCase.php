<?php

use App\Models\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://bitdemo.dev';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication() {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function register() {
        $this->visit('/')
                ->click('Register')
                ->type('Andrew', 'name')
                ->type('name@email.com', 'email')
                ->type('password', 'password')
                ->type('password', 'password_confirmation')
                ->press('Submit');
    }

    protected function deleteUser() {
        User::where('email', 'name@email.com')->delete();
    }

}
