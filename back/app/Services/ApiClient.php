<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiClient
{
    const BASE_URL = '89.108.115.241:6969';
    const KEY = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';

    public function poiSearch($request, $table)
    {
        $queryString = sprintf(
            '%s/api/%s?dateFrom=%s&dateTo=%s&page=%s&key=%s&limit=%s',

            self::BASE_URL,
            $table,
            $request->dateFrom,
            $request->dateTo,
            $request->page,
            self::KEY,
            $request->limit,

        );

        return Http::get($queryString)->json();
    }
}
