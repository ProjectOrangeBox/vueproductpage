<?php

namespace application\models;

use StdClass;
use projectorangebox\box\DatabaseModel;
use projectorangebox\cache\CacheInterface;
use projectorangebox\container\exceptions\NotInstanceOf;

class productModel extends DatabaseModel
{
  protected $tablename = 'products';
  protected $cache = null;

  public function __construct(array $config)
  {
    parent::__construct($config);

    if (!($config['cache'] instanceof CacheInterface)) {
      throw new NotInstanceOf('cache');
    }

    $this->cache = $config['cache'];
  }

  public function getProduct(int $id): array
  {
    $cacheKey = 'product.model.id.' . $id;

    if (!$product = $this->cache->get($cacheKey)) {
      $product = $this->db->get('products', '*', ['id' => $id]);

      $product['details'] = $this->_getDetails($id);
      $product['variants'] = $this->_getVariant($id);

      $this->cache->save($cacheKey, $product, 60);
    }

    return $product;
  }

  protected function _getVariant(int $parentId): array
  {
    $variants = [];

    $records = $this->db->select('variants', '*', ['product_id' => $parentId]);

    foreach ($records as $record) {
      $record['quantity'] = ($record['quantity'] > 0);

      $variants[] = $record;
    }

    return $variants;
  }

  protected function _getDetails(int $parentId): array
  {
    $details = [];

    $records = $this->db->select('details', '*', ['product_id' => $parentId]);

    foreach ($records as $record) {
      $details[] = $record;
    }

    return $details;
  }
} /* end class */