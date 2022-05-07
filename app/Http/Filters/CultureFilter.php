<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CultureFilter extends AbstractFilter
{
  public const NAME = 'name';
  public const N_FROM = 'n_from';
  public const N_TO = 'n_to';
  public const P_FROM = 'p_from';
  public const P_TO = 'p_to';
  public const K_FROM = 'k_from';
  public const K_TO = 'k_to';
  public const PRICE_FROM = 'price_from';
  public const PRICE_TO = 'price_to';
  public const FERTILIZER_ID = 'fertilizer_id';
  public const TAGS = 'tags';
  public const REGIONS = 'regions';  
  public const PURPOSE = 'purpose';
  public const DESCRIPTION = 'description';  
  public const ORDER_PRICE = 'order_price';  
  public const ORDER_NAME = 'order_name';  

  protected function getCallbacks(): array
  {
    return [
      self::NAME => [$this, 'name'],
      self::N_FROM => [$this, 'nFrom'],
      self::N_TO => [$this, 'nTo'],
      self::P_FROM => [$this, 'pFrom'],
      self::P_TO => [$this, 'pTo'],
      self::K_FROM => [$this, 'kFrom'],
      self::K_TO => [$this, 'kTo'],
      self::PRICE_FROM => [$this, 'priceFrom'],
      self::PRICE_TO => [$this, 'priceTo'],
      self::FERTILIZER_ID => [$this, 'fertilizerId'],
      self::TAGS => [$this, 'tags'],
      self::REGIONS => [$this, 'regions'],
      self::PURPOSE => [$this, 'purpose'],
      self::DESCRIPTION => [$this, 'description'],
      self::ORDER_PRICE => [$this, 'orderPrice'],
      self::ORDER_NAME => [$this, 'orderName'],
    ];    
  }

  public function name(Builder $builder, $value)
  {
    $builder->where('name', 'like', "%{$value}%");
  }

  public function nFrom(Builder $builder, $value)
  {
    $builder->where('nitrogen', '>', $value);
  }
  public function nTo(Builder $builder, $value)
  {
    $builder->where('nitrogen', '<', $value);
  }

  public function pFrom(Builder $builder, $value)
  {
    $builder->where('phosphorus', '>', $value);
  }
  public function pTo(Builder $builder, $value)
  {
    $builder->where('phosphorus', '<', $value);
  }

  public function kFrom(Builder $builder, $value)
  {
    $builder->where('potassium', '>', $value);
  }
  public function kTo(Builder $builder, $value)
  {
    $builder->where('potassium', '<', $value);
  }

  public function priceFrom(Builder $builder, $value)
  {
    $builder->where('price', '>', $value);
  }
  public function priceTo(Builder $builder, $value)
  {
    $builder->where('price', '<', $value);
  }

  public function fertilizerId(Builder $builder, $value)
  {
    $builder->where('fertilizer_id', $value);
  }

  public function tags(Builder $builder, $arrayOfIds)
  {    
    $cultureIds = DB::table('culture_tags')->whereIn('tag_id', $arrayOfIds)->get('culture_id')->toArray();
    $cultureValues = array_column($cultureIds, 'culture_id');
    $cultureIdsUnique = array_unique($cultureValues);
    
    $builder->whereIn('id', $cultureIdsUnique);    
  }

  public function regions(Builder $builder, $array)
  {
    $builder->whereIn('region', $array);
  }

  public function purpose(Builder $builder, $value)
  {
    $builder->where('purpose', 'like', "%{$value}%");
  }

  public function description(Builder $builder, $value)
  {
    $builder->where('description', 'like', "%{$value}%");
  }

  public function orderPrice(Builder $builder, $value)
  {
    $builder->orderBy('price', $value);
  }

  public function orderName(Builder $builder, $value)
  {
    $builder->orderBy('name', $value);
  }

}