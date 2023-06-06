<?php

namespace App\DataTransfertObject\Invoice;

class InvoiceDataObject
{
    public function __construct(
        private readonly string $totalVat,
        private readonly string $totalPriceExcluding,
    ){}

    public function toArray(): array
    {
        return [
            'totalVat' => $this->totalVat,
            'totalPriceExcluding' => $this->totalPriceExcluding,
        ];
    }
}
