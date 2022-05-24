<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @OA\Get(
     *   path="/v1/countries",
     *   operationId="getAllCountrie",
     *   tags={"Tests"},
     *   summary="Get List Of Countries",
     *   description="Returns all countries and associated provinces. The country_slug variable is used for country specific data",
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *     )
     *   ),
     *   @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *     response=403,
     *     description="Forbidden"
     *    ),
     *    @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *    ),
     *    @OA\Response(
     *      response=404,
     *      description="not found"
     *    ),
     *  )
    */
    public function getAllCountries()
    {
        return serviceApi("countries");
    }

    /**
     * @OA\Get(
     *   path="/v1/countries/{country}",
     *   operationId="getCountryConvidInfos",
     *   tags={"Tests"},
     *   summary="Get List Of Cases Per Country Per Province By Case Type From The First Recorded Case",
     *   description="Returns all cases by case type for a country from the first recorded case. Country must be the country_slug from /countries. Cases must be one of: confirmed, recovered, deaths",
     *   @OA\Parameter(
     *      name="country",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *         type="string"
     *      )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *     )
     *   ),
     *   @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *    ),
     *    @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *    ),
     *    @OA\Response(
     *      response=404,
     *      description="not found"
     *    ),
     *  )
    */
    public function getCovid19InfosByCountries($country)
    {
        $endPoint = "dayone/country/$country";
        return serviceApi($endPoint);
    }

    /**
     * @OA\Get(
     *   path="/v1/amount/{country}",
     *   operationId="getCountryConvidTotal",
     *   tags={"Tests"},
     *   summary="Get List Of Cases Per Country Per Province By Case Type From The First Recorded Case",
     *   description="Returns all cases by case type for a country from the first recorded case. Country must be the country_slug from /countries. Cases must be one of: confirmed, recovered, deaths",
     *   @OA\Parameter(
     *     name="country",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *     )
     *   ),
     *   @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *     response=403,
     *     description="Forbidden"
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="not found"
     *   ),
     *  )
    */
    public function getTotalByCountries($country)
    {
        $endPoint = "total/dayone/country/$country";
        return serviceApi($endPoint);
    }
}
