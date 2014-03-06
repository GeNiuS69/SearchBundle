<?php

namespace Engage360d\Bundle\SearchBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class SearchController extends Controller
{
    /**
     * Ресурс для поиска по всем проиндексированным сущностям.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Получение результатов поиска",
     *  filters={
     *   {"name"="query", "dataType"="string"}
     *  }
     * )
     */
    public function getSearchAction()
    {
        $searchQuery = $this->getRequest()->query->get('query');

        if (!$searchQuery) {
            return new JsonResponse(array());
        }

        $elasticaResult = $this->get('fos_elastica.index')->search($searchQuery);

        $result = array();

        foreach ($elasticaResult as $item) {
            $result[] = array(
                'id' => $item->getId(),
                'type' => $item->getType(),
                'source' => $item->getSource(),
            );
        }

        return new JsonResponse($result);
    }
}
