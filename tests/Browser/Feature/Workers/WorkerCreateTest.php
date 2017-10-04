<?php

namespace Tests\Browser\Tests\Workers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\WorkerHelpers;

class WorkerCreateTest extends DuskTestCase
{
    use WorkerHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/workers/create';
    protected $pathToList   = '/dashboard/workers';


    /*
    |--------------------------------------------------------------------------
    | Add Worker
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('worker_name', $this->makeWorker()->worker_name)
                ->type('worker_nif', $this->makeWorker()->worker_nif)
                ->type('worker_start', str_replace('/', '', $this->makeWorker()->worker_start))
                ->type('worker_ropo', $this->makeWorker()->worker_ropo)
                ->type('worker_ropo_date', str_replace('/', '', $this->makeWorker()->worker_ropo_date))
                ->select('worker_ropo_level', $this->makeWorker()->worker_ropo_level)
                ->type('worker_observations', $this->makeWorker()->worker_observations)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_can_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_user_can_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }
}
