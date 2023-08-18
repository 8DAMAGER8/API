<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Order;
use App\Models\Result;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use App\Repositories\DBRepository;

class API
{
    /**
     * limit results
     */
    const DEFAULT_LIMIT = 10;

    /**
     * @var Sale
     */
    private $sale;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var Income
     */
    private $income;

    /**
     * @var DBRepository
     */
    private $DBRepository;

    /**
     *
     */
    public function __construct()
    {
        $this->sale = (new Sale());
        $this->order = (new Order());
        $this->income = (new Income());
        $this->DBRepository = (new DBRepository());
    }
    /**
     * @param object $request
     * @return object|Stock[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStosksInDateFrom($request): object
    {
        $tableName = 'Stock';
        $limit = $this->addDefaultLimit($request->limit);
        $results = $this->DBRepository->getStocksFromDB($request, $limit);
        $this->DBRepository->createResults($results, $tableName);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getSalesInDate($request): object
    {
        $tableName = 'Sale';
        $tableModel = $this->sale;
        $limit = $this->addDefaultLimit($request->limit);
        $results = $this->DBRepository->getNotStocksFromDB($request, $limit, $tableModel);
        $this->DBRepository->createResults($results, $tableName);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getOrdersInDate($request): object
    {
        $tableName = 'Order';
        $tableModel = $this->order;
        $limit = $this->addDefaultLimit($request->limit);
        $results = $this->DBRepository->getNotStocksFromDB($request, $limit, $tableModel);
        $this->DBRepository->createResults($results, $tableName);

        return $results;
    }

    /**
     * @param object $request
     * @return object
     */
    public function getIncomesInDate($request): object
    {
        $tableName = 'Income';
        $tableModel = $this->income;
        $limit = $this->addDefaultLimit($request->limit);
        $results = $this->DBRepository->getNotStocksFromDB($request, $limit, $tableModel);
        $this->DBRepository->createResults($results, $tableName);

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
