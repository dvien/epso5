<?php

namespace Tests\Browser;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserEliminateTest extends DuskTestCase
{
    use DatabaseTransactions;
    
    private $god;
    private $usersRoute;

    public function setUp()
    {
        parent::setUp();

        $this->god          = User::find(1);
        $this->usersRoute   = '/dashboard/users';
     }

/*
|--------------------------------------------------------------------------
| Eliminate users
|--------------------------------------------------------------------------
*/
    public function test_god_no_user_selected()
    {
        $this->browse(function (Browser $browser) {
            //Not selected items
            $browser->loginAs($this->god)
                ->visit($this->usersRoute)
                ->pause(500)
                ->click('#button-config')
                ->click('#button-eliminate-link')
                ->whenAvailable('#modal-error', function ($modal) {
                    $modal->assertSee(__('Selection error'))
                        ->press('#button-modal-cancel');
                });
        });
    }

    public function test_god_can_eliminate_users()
    {
        $this->browse(function (Browser $browser) {
            //Not selected items
            $browser->loginAs($this->god)
                ->visit($this->usersRoute)
                ->pause(500)
                //with selected items
                ->click('table tbody tr:nth-child(5)')
                ->click('table tbody tr:nth-child(6)')
                ->click('#button-config')
                ->click('#button-eliminate-link')
                ->whenAvailable('#modal-delete', function ($modal) {
                    $modal->assertSee(__('Delete item'))
                        ->press('#button-modal-delete');
                })
                ->assertSee(__('The items has been deleted successfuly'));
        });
    }
}
