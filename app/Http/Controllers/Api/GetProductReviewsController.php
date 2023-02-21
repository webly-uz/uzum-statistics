<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\GetProductReviewsRequest;
use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetProductReviewsController extends BaseApiController
{
    public function __construct(
        private readonly UzumApiClient $apiClient
    ) {
    }

    public function __invoke(
        GetProductReviewsRequest $request,
        int $productId
    ): JsonResponse {
        $params = $request->toDTO();

        $reviews = $this->apiClient->getProductReviews(
            $productId,
            $params
        );

        return $this->respondWithData($reviews);
    }
}
