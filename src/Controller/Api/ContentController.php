<?php

namespace App\Controller\Api;

use App\Entity\Content;
use App\Helper\Paginator;
use App\Service\ContentService;
use App\Service\UserService;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

#[Route('/api/content')]
final class ContentController extends AbstractController
{
    public function __construct(
        private UserService $userService,
        private ContentService $contentService
        )
    {
    }

    #[Route(
        name: 'app_content_index', 
        methods:[Request::METHOD_GET]
    )]
    public function index(Request $request): JsonResponse
    {
        list($page, $limit) = Paginator::getRequestParameters($request);

        $filters['title'] = $request->get('title');
        $filters['description'] = $request->get('description');

        $contents = $this->contentService->paginate(page: $page, limit: $limit, filters: $filters);

        return $this->json($contents);
    }

    #[Route(
        name: 'app_content_store', 
        methods:[Request::METHOD_POST]
    )]
    public function store(
        #[MapRequestPayload] Content $content
    ): JsonResponse
    {
        $content = $this->contentService->create($content);

        return $this->json($content);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_show', 
        methods:[Request::METHOD_GET],
        requirements: ['content' => '\d+']
    )]
    public function show(Content $content): JsonResponse
    {

        return $this->json($content);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_update', 
        methods:[Request::METHOD_PUT]
    )]
    public function update(
        Content $content,
        #[MapRequestPayload] Content $contentDto): JsonResponse
    {
        $content = $this->contentService->update($content, $contentDto);

        return $this->json($content);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_destroy', 
        methods:[Request::METHOD_DELETE]
    )]
    public function destroy(Content $content): JsonResponse
    {
        $this->contentService->destroy($content);

        return $this->json([]);
    }
}
