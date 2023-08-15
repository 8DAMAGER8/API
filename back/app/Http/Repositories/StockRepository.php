<?php

namespace App\Http\Repositories;

use App\Models\Stock;

class StockRepository
{
  public function getStosksInDateFrom($dateFrom)
  {

      return Stock::all()->where('date_from', '===', $dateFrom);
  }
}
