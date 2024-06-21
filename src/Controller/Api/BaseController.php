<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

abstract class BaseController extends AbstractController
{
    /**
     * @inheritdoc
     */
    protected function json(mixed $data, int $status = 200, array $headers = [], array $context = []): JsonResponse
    {
        return parent::json(
            $data, 
            $status, 
            $headers, 
            array_merge([AbstractNormalizer::GROUPS => ['dto']], $context)
        );
    }
}
