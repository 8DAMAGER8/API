<?php

namespace App\Http\Repositories;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
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

    public function createStock($results): void
    {
        dd($results);
        foreach ($results['data'] as $result) {
            dd($results);
            Sale::create([
                "g_number" => $result['g_number'],
                "date" => $result['date'],
                "supplier_article" => $result['supplier_article'],
                "tech_size" => $result['tech_size'],
                "barcode" => $result['barcode'],
                "total_price" => $result['total_price'],
                "discount_percent" => $result['discount_percent'],
                "is_supply" => $result['is_supply'],
                "promo_code_discount" => $result['promo_code_discount'],
                "warehouse_name" => $result['warehouse_name'],
                "country_name" => $result['country_name'],
                "oblast_okrug_name" => $result['oblast_okrug_name'],
                "region_name" => $result['region_name'],
                "income_id" => $result['income_id'],
                "sale_id" => $result['sale_id'],
                "odid" => $result['odid'],
                "spp" => $result['spp'],
                "for_pay" => $result['for_pay'],
                "finished_price" => $result['finished_price'],
                "price_with_disc" => $result['price_with_disc'],
                "subject" => $result['subject'],
                "category" => $result['category'],
                "brand" => $result['brand'],
                "is_storno" => $result['is_storno'],
            ]);
        }
    }

    public function createSale($results): void
    {
        foreach ($results['data'] as $result) {
            Sale::create([
                "g_number" => $result['g_number'],
                "date" => $result['date'],
                "supplier_article" => $result['supplier_article'],
                "tech_size" => $result['tech_size'],
                "barcode" => $result['barcode'],
                "total_price" => $result['total_price'],
                "discount_percent" => $result['discount_percent'],
                "is_supply" => $result['is_supply'],
                "promo_code_discount" => $result['promo_code_discount'],
                "warehouse_name" => $result['warehouse_name'],
                "country_name" => $result['country_name'],
                "oblast_okrug_name" => $result['oblast_okrug_name'],
                "region_name" => $result['region_name'],
                "income_id" => $result['income_id'],
                "sale_id" => $result['sale_id'],
                "odid" => $result['odid'],
                "spp" => $result['spp'],
                "for_pay" => $result['for_pay'],
                "finished_price" => $result['finished_price'],
                "price_with_disc" => $result['price_with_disc'],
                "subject" => $result['subject'],
                "category" => $result['category'],
                "brand" => $result['brand'],
                "is_storno" => $result['is_storno'],
            ]);
        }
    }

    public function createIncome($results): void
    {
        foreach ($results['data'] as $result) {
            Income::create([
                "income_id" => $result['income_id'],
                "number" => $result['number'],
                "date" => $result['date'],
                "supplier_article" => $result['supplier_article'],
                "tech_size" => $result['tech_size'],
                "barcode" => $result['barcode'],
                "quantity" => $result['quantity'],
                "total_price" => $result['total_price'],
                "date_close" => $result['date_close'],
                "warehouse_name" => $result['warehouse_name'],
                "nm_id" => $result['nm_id'],
                "status" => $result['status']
            ]);
        }
    }

    public function createOrder($results): void
    {
        foreach ($results['data'] as $result) {
//            dd($results['data']);
            Order::create([
                "g_number" => $result['g_number'],
                "date" => $result['date'],
                "last_change_date" => $result['last_change_date'],
                "supplier_article" => $result['supplier_article'],
                "tech_size" => $result['tech_size'],
                "barcode" => $result['barcode'],
                "total_price" => $result['total_price'],
                "discount_percent" => $result['discount_percent'],
                "warehouse_name" => $result['warehouse_name'],
                "oblast" => $result['oblast'],
                "income_id" => $result['income_id'],
                "odid" => $result['odid'],
                "nm_id" => $result['nm_id'],
                "subject" => $result['subject'],
                "category" => $result['category'],
                "brand" => $result['brand'],
                "is_cancel" => $result['is_cancel'],
                "cancel_dt" => $result['cancel_dt']
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
