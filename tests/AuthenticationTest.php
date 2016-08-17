<?php

/**
 * Authentication provides methods to test the register and login form
 *
 * @author andrewstarlike
 */
class AuthenticationTest extends TestCase {

    /**
     * Test the registration form
     * 
     * @return void
     */
    public function testRegister() {
        $this->visit('/')
                ->click('Register')
                ->see('Register')
                //check submit with no fields filled
                ->press('Submit')
                ->see('The name field is required')
                ->see('The email field is required')
                ->see('The password field is required')
                //check submit with not valid email address
                ->type('Andrew', 'name')
                ->type('fake@email', 'email')
                ->press('Submit')
                ->see('The email must be a valid email address')
                ->see('The password field is required');

        //submit proper credentials
        $this->register();
    }

    /**
     * Test the login form
     * 
     * @return void
     */
    public function testLogin() {
        $this->visit('/')
                ->click('Login')
                ->type('name@email.com', 'email')
                ->type('wrong_password', 'password')
                ->press('Submit')
                ->see('These credentials do not match our records')
                ->type('name@email.com', 'email')
                ->type('password', 'password')
                ->press('Submit')
                ->see('Dashboard');

        $this->deleteUser();
    }

}
