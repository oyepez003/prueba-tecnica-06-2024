<?php

namespace App\Serializer;

use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiNormalizer implements NormalizerInterface
{
    public function normalize($exception, ?string $format = null, array $context = []): array
    {
        $contextException = $context['exception'] ?? null;
        $errors = [];
        if($contextException instanceof UnprocessableEntityHttpException 
            && $contextException->getPrevious()) {
            $violations = $contextException->getPrevious()->getViolations();
            foreach($violations as $violation) {
                $errors[] = [
                    'message' => $violation->getMessage(),
                    'field' => $violation->getPropertyPath(),
                ];
            } 
        }

        $error = [
            'message' => Response::$statusTexts[$exception->getStatusCode()] ?? $exception->getMessage(),
            'code' => $exception->getStatusCode(),
        ];

        if($errors) {
            $error['violations'] = $errors;
        }

        if($context['debug'] && $exception->getStatusCode() >= Response::HTTP_INTERNAL_SERVER_ERROR) {
            $error['detail'] = $exception->getTraceAsString();
        }

        return compact('error');
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof FlattenException;
    }

    public function getSupportedTypes(?string $format): array {
        return [
            '*' => true,
        ];
    }
}