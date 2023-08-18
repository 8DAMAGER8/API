<?php

namespace App\Services;

use App\Http\Repositories\DBRepository;
use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;

class API
{
    /**
     * limit results
     */
    const DEFAULT_LIMIT = 500;

    /**
     * @var DBRepository
     */
    private $DBRepository;

    /**
     * @var ApiClient
     */
    private $apiClient;

    public function __construct()
    {
        $this->DBRepository = (new DBRepository());
        $this->apiClient = (new ApiClient());
    }
    /**
     * @param object $request
     * @return object|Stock[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStosksInDateFrom($request)
    {
        $table = 'stocks';
        $results = $this->apiClient->poiSearch($request, $table);

        $this->DBRepository->createStock($results);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getSalesInDate($request)
    {
        $table = 'sales';
        $results = $this->apiClient->poiSearch($request, $table);

        $this->DBRepository->createSale($results);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getOrdersInDate($request)
    {
        $table = 'orders';
        $results = $this->apiClient->poiSearch($request, $table);

        $this->DBRepository->createOrder($results);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getIncomesInDate($request)
    {
        $table = 'incomes';
        $results = $this->apiClient->poiSearch($request, $table);

        $this->DBRepository->createIncome($results);

        return $results;
    }



    /**
     * @param int $limit
     * @return int
     */
    private function addDefaultLimit($limit): int
    {
        return ((empty($limit)) ? self::DEFAULT_LIMIT : $limit);
    }






}
