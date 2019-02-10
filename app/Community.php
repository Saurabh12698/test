<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Community extends Model
{
    use ElasticquentTrait;

    protected $mappingProperties = array(
        
        'cid' => [
            'type' => 'text',
            "analyzer" => "standard",
          ],
        'name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'url' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'text',
            "analyzer" => "standard",
          ],
        'tags' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
      );
}
