<?php

namespace App\Interfaces ;

interface OfferRepositoryInterface
{
    public function getAllOffer();
    public function getOfferById($offerId);
    public function createOffer(array $offerDetails);
    public function deleteOffer($offerId);
    public function updateOffer($offerId,array $offerDetails);
}