<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Controller;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class PictogramController
 * @package Asdoria\SyliusPictogramPlugin\Controller
 *
 * @author  Hugo Duval <hugo.duval@asdoria.com>
 */
class PictogramGroupController extends ResourceController
{
    /**
     * @throws HttpException
     */
    public function updatePositionsAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $pictogramGroupsToUpdate = $request->get('pictogramGroups');

        if ($configuration->isCsrfProtectionEnabled() && !$this->isCsrfTokenValid('update-pictogram-group-position', $request->request->get('_csrf_token'))) {
            throw new HttpException(Response::HTTP_FORBIDDEN, 'Invalid csrf token.');
        }

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && null !== $pictogramGroupsToUpdate) {
            foreach ($pictogramGroupsToUpdate as $pictogramGroupToUpdate) {
                if (!is_numeric($pictogramGroupToUpdate['position'])) {
                    throw new HttpException(
                        Response::HTTP_NOT_ACCEPTABLE,
                        sprintf('The pictogramGroup position "%s" is invalid.', $pictogramGroupToUpdate['position'])
                    );
                }

                /** @var PictogramGroupInterface $pictogramGroup */
                $pictogramGroup = $this->repository->findOneBy(['id' => $pictogramGroupToUpdate['id']]);
                $pictogramGroup->setPosition((int) $pictogramGroupToUpdate['position']);
                $this->manager->flush();
            }
        }

        return new JsonResponse();
    }
}
