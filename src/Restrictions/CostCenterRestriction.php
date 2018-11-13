<?php

namespace Waygou\Xheetah\Restrictions;

use Waygou\Xheetah\Models\Client;

class CostCenterRestriction
{
    public static function restrictToClient($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            // Get all Cost Center given the Client id.
            $result = collect(Client::where('id', $value)
                                    ->first()
                                    ->costCenters
                                    ->all())
                              ->transform(function ($item) {
                                  return ['label'   => $item['name'],
                                          'display' => $item['name'],
                                          'value'   => $item['id'], ];
                              })->toArray();

            return ['options' => $result];
        } else {
            return ['options' => null, 'value' => null];
        }
    }
}
