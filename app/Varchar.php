<?php
namespace App;

use Rinvex\Attributes\Models\Type\Varchar as RinvexVarchar;

class Varchar extends RinvexVarchar
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('rinvex.attributes.tables.attribute_varchar_values'));
        $this->setRules([
            'content' => 'string|max:150',
            'attribute_id' => 'required|integer|exists:'.config('rinvex.attributes.tables.attributes').',id',
            'entity_id' => 'required|integer',
            'entity_type' => 'required|string',
        ]);
    }
}
