<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class BuyCrystalController extends Controller
{
    public function preparePayment(Request $request, int $amount)
    {
        $devWebhookUrl = 'https://marco-meijer.eu-1.sharedwithexpose.com';
        $item = $this->find($amount);

        $request->validate([
            'username' => 'required|min:3|max:24'
        ]);

        $username = $request->username;

        if ($item === null) {
            return redirect("/", 404);
        }

        $price = $item['price'];
        $name = $item['name'];

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $price,
            ],
            'description' => "Order of $name for $username",
            'redirectUrl' => route('shop'),
            'webhookUrl' => config('app.env') === 'production' ? route('webhooks.mollie') : $devWebhookUrl,
            'metadata' => [
                'order_id' => '12345',
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    private function find(int $amount)
    {
        foreach (config('shop.crystals') as $crystal) {
            if ($crystal['amount'] === $amount) {
                return $crystal;
            }
        }
        return null;
    }
}
