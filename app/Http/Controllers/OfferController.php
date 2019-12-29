<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function accept(Offer $offer)
    {
        if(auth()->user()->id !== $offer->post->user_id)
            abort(403, 'Nie możesz zaakceptować czyjegoś zlecenia');

        $offer->update(['accepted' => 1]);
        $offer->update(['status_id' => 3]);
        $offer->post()->update(['active' => 0]);


        return redirect('dashboard')->with('success', 'Oferta zaakceptowana pomyślnie');
    }
}
