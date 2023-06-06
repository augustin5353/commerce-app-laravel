<?php

namespace App\Actions\Invoice;

use App\Models\Invoice;

class StoreInvoiceAction
{
    public function handle(
        $invoiceNumber,
        $userId,
        $totalVat,
        $totalPriceExcluding
    ): void {
        Invoice::create([
            'invoice_number' => $invoiceNumber,
            'total_vat' => $totalVat,
            'total_price_excluding_vat' => $totalPriceExcluding,
            'total_price' => (float) $totalVat + (float) $totalPriceExcluding,
            'user_id' => $userId
        ]);
    }
}
