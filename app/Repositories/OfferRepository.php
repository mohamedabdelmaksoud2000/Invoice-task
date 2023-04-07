<?php

namespace App\Repositories;

use App\Interfaces\OfferRepositoryInterface;
use App\Models\Offer;

class OfferRepository implements OfferRepositoryInterface
{
    public function getAllOffer()
    {
        return Offer::all();
    }
    public function getOfferById($offerId)
    {
        return Offer::find($offerId);
    }
    public function createOffer(array $offerDetails)
    {
        return Offer::create($offerDetails);
    }
    public function deleteOffer($offerId)
    {
        return Offer::destroy($offerId);
    }
    public function updateOffer($offerId , array $offerDetails)
    {
        return Offer::find($offerId)->update($offerDetails);
    }
}