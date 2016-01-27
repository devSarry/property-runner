<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterPageTest extends TestCase {

    use DatabaseTransactions;

    /** @test * */
    function registration_fields_are_on_page()
    {
        $form = $this->visit('/register')
            ->getForm('Register');

        $this->assertTrue($form->has('name'));
        $this->assertTrue($form->has('email'));
        $this->assertTrue($form->has('password'));
        $this->assertTrue($form->has('password_confirmation'));
    }

    /** @test * */
/*    function register_a_user_through_registration_form()
    {
        $formData = [
            'name'                  => 'test_user',
            'email'                 => 'test_user@test.com',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ];
        $this->visit('/register')
            ->submitForm('Register', $formData)
            ->press('Register');
    }*/
}
