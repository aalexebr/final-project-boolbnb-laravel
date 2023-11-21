<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Requests\orders\OrderRequest;
use App\Models\Sponsorship;
use App\Models\Apartment;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway, string $id)
    {
        $client = $gateway->clientToken()->generate();

        $sponsorships = Sponsorship::all();
        $apartment = Apartment::where('id', $id)->first();
        //  dd($sponsorships, $apartment);
        return view('admin.apartment.payment', compact('client', 'sponsorships', 'apartment'));
    }

    public function makePayment(Request $request, Gateway $gateway, string $id)
    {
        $request->validate([
            'sponsor' => 'required'
        ]);
        $sponsor = Sponsorship::where('id', $request['sponsor'])->first();
        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $request->input('payment_method_nonce'),
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'transazione eseguita con successo'
            ];

            $this->test($request, $id);
            $apartment = Apartment::where('id', $id)->first();
            //dd($apartment->id, $result);
            return view('admin.apartment.successfulPayment', compact('apartment', 'result', 'sponsor'));
        }
        //DA RICOONTROLLARE QUESTO ELSE CHE DA FALSE A CASO
        else {
            $data = [
                'success' => false,
                'message' => 'transazione fallita'
            ];
            return response()->json($data, 401);
        }
    }

    public function test($request, string $id)
    {
        $formdata = $request->validate([
            'sponsor' => 'required'
        ]);

        // dd($request, $id);
        $sponsor = Sponsorship::where('id', $formdata['sponsor'])->first();
        $apartment = Apartment::where('id', $id)->first();

        if (count($apartment->sponsorships) > 0) {
            $lastSponsor = $apartment->sponsorships[count($apartment->sponsorships) - 1]->pivot->end_date;
            $startDate = now();

            if ($lastSponsor >= $startDate) {
                $endDate = date('Y-m-d H:i', strtotime('+' . $sponsor->time . 'hours', strtotime($lastSponsor)));
                // dd($sponsor->time);
            } else {
                $endDate = now()->addHours($sponsor->time);
            }

            $apartment->sponsorships()->attach($sponsor->id, ['start_date' => $lastSponsor, 'end_date' => $endDate]);
            // DB::table('apartment_sponsorship')->where('end_date',$lastSponsor)->delete();
        } else {
            $startDate = now()->setTimezone('Europe/Rome');
            $endDate = now()->setTimezone('Europe/Rome')->addHours($sponsor->time);

            $apartment->sponsorships()->attach($sponsor->id, ['start_date' => $startDate, 'end_date' => $endDate]);
        }
    }
}
