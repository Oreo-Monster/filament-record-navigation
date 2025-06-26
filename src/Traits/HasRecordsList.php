<?php

namespace JoseEspinal\RecordNavigation\Traits;

trait HasRecordsList
{
    public function rendered($view, $html)
    {
        $query = $this->getFilteredTableQuery();

        $this->applySortingToTableQuery($query);

        $model = static::getResource()::getModel();
        $routeKeyName = (new $model)->getRouteKeyName() ?? 'id';
        session(['filament_record_navigation_ids' => $query->pluck($routeKeyName)->toArray()]);

        return $query;
    }
}
