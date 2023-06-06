<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Invoice\StoreInvoiceAction;
use App\Responses\Invoice\InvoiceCollectionResponse;
use App\DataTransfertObject\Invoice\InvoiceDataObject;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //on peut faire de validation ici comme d'habitude

        //verifier si les données ont ete recues tel quel
        $invoiceDto = new InvoiceDataObject(
            totalVat: $request->total_vat,
            totalPriceExcluding: $request->total_price_excluding_vat
        );

        (new StoreInvoiceAction)
            ->handle(
                Str::uuid(),
                $request->user()->id,
                ...$invoiceDto->toArray(),
            );

            return new InvoiceCollectionResponse(
                collection: Invoice::query()
                    ->with([
                        'user',
                    ])
                    ->where('user_id', $request->user()->id)
                    ->paginate(25)
            );
    }
}
