<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Responses\Invoice\InvoiceCollectionResponse;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
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
