<?php

namespace App\Http\Controllers;

use App\Services\API;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    private $api;

    const MAX_LIMIT = 10;
    const ERROR_LIMIT = 'The limit must not be greater than 10.';
    const DATE_ERROR = 'The date must be a date today.';
    const DATE_FORM = 'Y-m-d';

    public function __construct()
    {
        $this->api = (new API);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function stock(Request $request): JsonResponse
    {
        $auth = $this->api->authUser($request->key);

        if ($request->limit > self::MAX_LIMIT) {
            return response()->json(self::ERROR_LIMIT);
        }
        if ($auth) {
            return $auth;
        }
        if ($request->dateFrom != date(self::DATE_FORM)) {
            return response()->json(self::DATE_ERROR);
        } else {
            return response()->json($this->api->getStosksInDateFrom($request));
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sale(Request $request): JsonResponse
    {
        $auth = $this->api->authUser($request->key);

        if ($request->limit > self::MAX_LIMIT) {
            return response()->json(self::ERROR_LIMIT);
        }
        if ($auth) {
            return $auth;
        }
        return response()->json($this->api->getSalesInDate($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function order(Request $request): JsonResponse
    {
        $auth = $this->api->authUser($request->key);

        if ($request->limit > self::MAX_LIMIT) {
            return response()->json(self::ERROR_LIMIT);
        }
        if ($auth) {
            return $auth;
        }
        return response()->json($this->api->getOrdersInDate($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function income(Request $request): JsonResponse
    {
        $auth = $this->api->authUser($request->key);

        if ($request->limit > self::MAX_LIMIT) {
            return response()->json(self::ERROR_LIMIT);
        }
        if ($auth) {
            return $auth;
        }
        return response()->json($this->api->getIncomesInDate($request));
    }
}
