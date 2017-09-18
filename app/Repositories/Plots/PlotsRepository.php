<?php

namespace App\Repositories\Plots;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Plots\Plot;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Repository;
use App\Repositories\Users\UsersRepository;
use Credentials;
//use DB;

class PlotsRepository extends Repository
{
    use PlotsHelpers; //There is helper functions!!!!

    protected $client;
    protected $model;
    protected $user;

    public function __construct(Plot $model, ClientsRepository $client, UsersRepository $user)
    {
        $this->client   = $client;
        $this->model    = $model;
        $this->user     = $user;
    }

    /**
     * Only for assign. Show only the plots without users.
     * Prepare the database query for the yajra dataTable service
     * @param   string   $columns
     * @param   string   $id [In case we need an extra variable to check with something...]
     * @param   string   $table [Just in case we need to add de table name for avoid ambiguous row names]
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $id = null, $table = null)
    {
        //Just in case we need to add de table name for avoid ambiguous row names
        $table = $table ? $table . '.' : '';
        //The query
        $query = $this->model->select($columns);
            //The filters
            return $this->filter($query, $table, $id);
    }

    /**
     * Filter by role and empty users
     * @param   object   $query
     * @param   string   $table
     * @param   boolean  $emptyUser [Value from the controller assign]
     * @return  ajax
     */
    private function filter($query, $table, $emptyUser = false)
    {
        return $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
            return $query;
        })
        ->when(Credentials::maxRole() === 'editor', function ($query) use ($table) {
            return $query->where($table . 'client_id', Credentials::client());
        })
        ->when(Credentials::maxRole() === 'user', function ($query) use ($table) {
            return $query->where($table . 'user_id', Credentials::id());
        })
        ->when($emptyUser, function ($query) use ($table) {
            return $query->where('user_id', null);
        });
    }
}
