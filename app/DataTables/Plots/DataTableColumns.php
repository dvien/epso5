<?php

namespace App\DataTables\Plots;

use Credentials;

trait DataTableColumns
{
    /**
     * Get columns.
     * @return array
     */
    protected function setColumns() : array
    {
        /**
         * @param  string $text
         * @param  string $name
         * @param  array $attributes [Add extra attributes]
         */
        $column_client = [$this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name')];
        $column_user   = [$this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name')];
        $column_all = [
            $this->setColumnWithRelationship(trans_title('crops', 'singular'), 'crop.crop_name'),
            $this->setColumnWithRelationship(sections('crop_varieties.variety'), 'crop_variety.crop_variety_name'),
            $this->setColumn(trans_title('plots'), 'plot_name'),
            $this->setColumn(trans('dates.date'), 'plot_start_date'),
            $this->setColumnWithRelationship(trans('persona.region'), 'region.region_name'),
            $this->setColumnWithRelationship(trans('persona.city'), 'city.city_name'),
            $this->setColumnWithRelationship(trans('persona.zip:min'), 'geolocation.geo_zip'),
            $this->setColumn(trans('units.m2'), 'plot_area'),
            $this->setColumn(trans('units.percent'), 'plot_percent_cultivated_land'),
            $this->setColumnWithRelationship(trans('base.catastro'), 'geolocation.geo_catastro'),
            $this->setColumnWithRelationship(trans('base.latitude'), 'geolocation.geo_lat'),
            $this->setColumnWithRelationship(trans('base.longitude'), 'geolocation.geo_lng'),
            $this->setColumnWithRelationship(trans('base.height'), 'geolocation.geo_height'),
        ];
        //Filtering the relationships
        if(Credentials::isAdmin()) {
            return array_merge([$this->createCheckbox()], $column_client, $column_user, $column_all);
        }
        if(Credentials::isEditor()) {
            return array_merge([$this->createCheckbox()], $column_user, $column_all);
        }
        return array_merge([$this->createCheckbox()], $column_all);
    }

    /**
     * Show / hide columns by group.
     * @return array
     */
    protected function setColumnsGroups() : array
    {
        //Filtering the relationships
        if(Credentials::isAdmin()) {
            $columns_minimize = [
                'show' => [3, 4, 5, 7, 8, 10, 12, 15, 16],
                'hide' => [1, 2, 6, 9, 11, 13, 14],
            ];
        } elseif(Credentials::isEditor()) {
            $columns_minimize = [
            'show' => [2, 3, 4, 6, 7, 9, 11, 14, 15],
            'hide' => [1, 5, 8, 10, 12, 13],
            ];
        } else {
            //User don't need filter for columns
            return [];
        }

        return [
            $this->createColumnsGroupsAll(),
            $this->createColumnsGroups(icon('minus', trans('tables.button:minimize')), $columns_minimize),
        ];
    }
}