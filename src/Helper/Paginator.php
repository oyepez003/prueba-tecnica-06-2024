<?php

namespace App\Helper;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\HttpFoundation\Request;

class Paginator
{
    const DEFAULT_PAGE = 1;
    const DEFAULT_LIMIT = 10;

    public static function toArray(PaginationInterface $pagination): array
    {
        $lastPage = $pagination->getTotalItemCount() / $pagination->getItemNumberPerPage();
        $lastPage = $lastPage >= 1 ? $lastPage : 0;
        return [
            "total" => $pagination->getTotalItemCount(),
            "per_page" => $pagination->getItemNumberPerPage(),
            "current_page" => $pagination->getCurrentPageNumber(),
            "last_page" => $lastPage,
            "data" => $pagination->getItems()
        ];
    }

    public static function getRequestParameters(Request $request): array
    {
        return [
            $request->get('page', static::DEFAULT_PAGE), 
            $request->get('limit', static::DEFAULT_LIMIT)
        ];
    }
}