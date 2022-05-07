<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CustomerFilter extends AbstractFilter
{
  public const NAME = 'name';
  public const DATE_FROM = 'date_from';
  public const DATE_TO = 'date_to';
  public const COST_FROM = 'cost_from';
  public const COST_TO = 'cost_to';  
  public const REGIONS = 'regions';    

  protected function getCallbacks(): array
  {
    return [
      self::NAME => [$this, 'name'],
      self::DATE_FROM => [$this, 'dateFrom'],
      self::DATE_TO => [$this, 'dateTo'],
      self::COST_FROM => [$this, 'costFrom'],
      self::COST_TO => [$this, 'costTo'],      
      self::REGIONS => [$this, 'regions'],      
    ];    
  }

  public function name(Builder $builder, $value)
  {
    $builder->where('name', 'like', "%{$value}%");
  }

  public function dateFrom(Builder $builder, $value)
  {
    $builder->where('contract_date', '>', $value);
  }
  public function dateTo(Builder $builder, $value)
  {
    $builder->where('contract_date', '<', $value);
  }

  public function costFrom(Builder $builder, $value)
  {
    $builder->where('cost', '>', $value);
  }
  public function costTo(Builder $builder, $value)
  {
    $builder->where('cost', '<', $value);
  }

  public function regions(Builder $builder, $array)
  {
    $builder->whereIn('region', $array);
  }
}