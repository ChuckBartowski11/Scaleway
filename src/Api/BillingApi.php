<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class BillingApi extends AbstractApi
{
    private const BASE = '/billing/v2beta1';

    public function consumptions(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/consumptions', $query);
    }

    public function invoices(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/invoices', $query);
    }

    public function downloadInvoice(string $invoiceId, string $fileType = 'pdf'): ApiResponse
    {
        return $this->get(sprintf('%s/invoices/%s/download', self::BASE, $invoiceId), ['file_type' => $fileType]);
    }

    public function discounts(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/discounts', $query);
    }
}
