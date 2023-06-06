<?php

namespace App\Responses\Invoice;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Http\Resources\Invoice\InvoiceCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InvoiceCollectionResponse implements \Illuminate\Contracts\Support\Responsable
{
    public function __construct(
        private readonly Collection|LengthAwarePaginator $collection,
        private readonly int $status = 200 
    ){}

    public function toResponse($request): JsonResponse
    {
        return response()->json(
            data:  InvoiceCollection::make(
                $this->collection
                )->response()->getData(),
            status: $this->status
        );
    }
}
