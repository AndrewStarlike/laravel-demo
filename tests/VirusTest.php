<?php

use App\Models\Virus;

class VirusTest extends TestCase {

    /**
     * A basic test for virus index.
     *
     * @return void
     */
    public function testIndex() {
        $this->visit('/')
                ->see('MacOS virus')
                ->see('Microsoft virus');
    }

    /**
     * 
     */
    public function testAddVirus() {
        $this->visit('/')
                ->dontSee('Add Virus');

        $this->register();

        $this->visit('/')
                ->see('Add Virus');

        $this->click('Add Virus')
                ->press('Submit')
                ->see('The name field is required')
                ->see('The description field is required')
                ->type('Test virus', 'name')
                ->type('The description of our testing virus', 'description')
                ->press('Submit')
                ->see('Test virus saved successfully');

        $this->deleteUser();
        Virus::where('name', 'Test virus')->delete();
    }

    public function testModifyVirus() {
        $this->visit('/')
                ->dontSee('Modify');

        $this->register();

        $this->visit('/')
                ->see('Modify');

        $this->click('Modify')
                ->see('Edit virus')
                ->see('Microsoft virus')
                ->type('', 'name')
                ->press('Submit')
                ->see('The name field is required')
                ->type('Microsoft virus', 'name')
                ->press('Submit');

        $this->deleteUser();
    }

    public function testDescription() {
        $this->visit('/description/1')
                ->see('Microsoft virus description');
    }

    public function testRating() {
        $this->visit('/description/1')
                ->select(5, 'rating')
                ->press('Submit')
                ->see('Microsoft virus rated successfully');
    }

}
