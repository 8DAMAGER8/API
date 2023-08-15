<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;

class API
{
    const DEFAULT_LIMIT = 10;

    /**
     * @param object $request
     * @return object|Stock[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStosksInDateFrom(object $request): object
    {
        $limit = $this->addDefaultLimit($request->limit);

        return Stock::all()
            ->where('date', $request->dateFrom)
            ->forPage($request->page, $limit);
    }

    /**
     * @param object $request
     * @return object
     */
    public function getSalesInDate(object $request): object
    {
        $limit = $this->addDefaultLimit($request->limit);

        return Sale::whereDate('date', '>=', $request->dateFrom)
            ->whereDate('date', '<=', $request->dateTo)
            ->forPage($request->page, $limit)
            ->get();
    }

    /**
     * @param object $request
     * @return object
     */
    public function getOrdersInDate(object $request): object
    {
        $limit = $this->addDefaultLimit($request->limit);

        return Order::whereDate('date', '>=', $request->dateFrom)
            ->whereDate('date', '<=', $request->dateTo)
            ->forPage($request->page, $limit)
            ->get();
    }

    /**
     * @param object $request
     * @return object
     */
    public function getIncomesInDate(object $request): object
    {
        $limit = $this->addDefaultLimit($request->limit);

        return Income::whereDate('date', '>=', $request->dateFrom)
            ->whereDate('date', '<=', $request->dateTo)
            ->forPage($request->page, $limit)
            ->get();
    }

    /**
     * @param string $token
     * @return false|\Illuminate\Http\JsonResponse
     */
    public function authUser(string $token)
    {
        if (!User::where('id', 1)->where('remember_token', $token)->get()->toArray()) {

            return response()->json('Token invalid or empty');
        }
        return false;
    }

    /**
     * @param int $limit
     * @return int
     */
    private function addDefaultLimit(int $limit): int
    {
        return ((empty($limit)) ? self::DEFAULT_LIMIT : $limit);
    }
}
