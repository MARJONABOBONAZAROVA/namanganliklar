<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CurrencyController extends Controller
{
    public function getExchangeRate()
    {
        $apiKey = 'API_KEY';
        $baseCurrency = 'USD';
        $targetCurrency = 'UZS';


        $client = new Client();
        $response = $client->get("https://openexchangerates.org/api/latest.json?app_id={$apiKey}&base={$baseCurrency}");
        $data = json_decode($response->getBody(), true);


        $exchangeRate = $data['rates'][$targetCurrency];


        return "1 {$baseCurrency} = {$exchangeRate} {$targetCurrency}";
    }
}
