<?php
namespace App;

use Rinvex\Attributes\Models\Type\Integer as RinvexInteger;

class Integer extends RinvexInteger
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('rinvex.attributes.tables.attribute_integer_values'));
        $this->setRules([
            'content' => 'integer',
            'attribute_id' => 'required|integer|exists:'.config('rinvex.attributes.tables.attributes').',id',
            'entity_id' => 'required|integer',
            'entity_type' => 'required|string',
        ]);
    }
}
