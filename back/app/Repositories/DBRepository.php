<?php

namespace App\Repositories;

use App\Models\Result;
use App\Models\Stock;
use App\Models\User;

class DBRepository
{
    /**
     * @param $request
     * @param $limit
     * @param $tableModel
     * @return mixed
     */
    public function getNotStocksFromDB($request, $limit, $tableModel): object
    {
        return $tableModel::whereDate('date', '>=', $request->dateFrom)
            ->whereDate('date', '<=', $request->dateTo)
            ->forPage($request->page, $limit)
            ->get();
    }

    /**
     * @param $request
     * @param $limit
     * @return object|Stock[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStocksFromDB($request, $limit): object
    {
        return Stock::all()
            ->where('date', $request->dateFrom)
            ->forPage($request->page, $limit);
    }

    /**
     * @param $results
     * @param $tableName
     * @return void
     */
    public function createResults($results, $tableName): void
    {
        foreach ($results as $result) {
            Result::create([
                "table&id" => $tableName . $result->id,
                "title" => $result->title,
                "income" => $result->income,
                "date" => $result->date
            ]);
        }
    }

    /**
     * @param string $token
     * @return false|\Illuminate\Http\JsonResponse
     */
    public function authUser($token)
    {
        if (!User::where('id', 1)->where('remember_token', $token)->get()->toArray()) {

            return response()->json('Token invalid or empty');
        }
        return false;
    }
}
