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
            'redirectUrl' => route('order.success'),
            'webhookUrl' => config('app.env') === 'production' ? route('webhooks.mollie') : $devWebhookUrl,
            'metadata' => [
                'name' => $name,
                'username' => $username,
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function successfulPayment()
    {
        return view('order-success');
    }

    public function webhook(Request $request)
    {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            // give the gems to the user

        }
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
