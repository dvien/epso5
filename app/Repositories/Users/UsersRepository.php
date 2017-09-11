<?php 

namespace App\Repositories\Users;

use App\Repositories\Profiles\ProfilesRepository;
use App\Repositories\Repository;
use App\Repositories\Users\Traits\UsersHelpers;
use App\Repositories\Users\User;
use Credentials, DB;

class UsersRepository extends Repository {

    use UsersHelpers;

    //protected $image;
    protected $model;
    protected $profile;
 
    // public function __construct(User $model, Images $image)
    // {
    //     $this->image = $image;
    //     $this->model = $model;
    // }

    public function __construct(User $model, ProfilesRepository $profile)
    {
        $this->model    = $model;
        $this->profile  = $profile;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function store($id = null)
    {
        return DB::transaction(function () use ($id) {
            //Operations: App\Repositories\Users\Traits\UsersHelpers;
            $request = $this->requestOperations();
            //
            //Create an User
            if (is_null($id)) {
                $user = $this->model
                    ->create($request);

                //Create an profile
                //Remember: profile()
                if($user) {
                    return $user->profile()
                    ->create($request);
                }
            }
            //
            //Update an User
            if(is_numeric($id)) {
                $user = $this->model
                    ->find($id);

                //Update the profile
                ////Remember: profile
                if($user->update($request)) {
                    return $user->profile
                        ->update($request);
                }
            }
        });
        //Create an error
        return false;
    }

    /**
     * Eliminate a list of items from the DB
     * @return  boolean
     */
    public function eliminate()
    {
        //items_list() from helpers/strings.php
        return DB::transaction(function () {
            //App\Repositories\Users\Traits\UsersHelpers;
            // if($this->deleteUsers() && $this->deleteProfiles()) {
            //     return true;
            // }
            if($this->deleteUsers()) {
                return true;
            }
            return false;
        });
    }

    /**
     * List of users by role
     * Only return the list of user if the role is editor.
     * Use the Credentials::config() facade, throw the helper getConfig(), to get the client ID
     * @return  array
     */
    public function listOfUsersByRole()
    {
        if(Credentials::isEditor()) {
            return ['' => ''] + $this->model
                ->where('client_id', getConfig('client', 'id'))
                ->pluck('name', 'id')
                ->toArray();
        }
            return [];
    }
}