<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PictogramController extends ResourceController
{
    /**
     * @throws HttpException
     */
    public function updatePositionsAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $pictogramsToUpdate = $request->get('pictograms');

        if ($configuration->isCsrfProtectionEnabled() && !$this->isCsrfTokenValid('update-pictogram-position', $request->request->get('_csrf_token'))) {
            throw new HttpException(Response::HTTP_FORBIDDEN, 'Invalid csrf token.');
        }

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && null !== $pictogramsToUpdate) {
            foreach ($pictogramsToUpdate as $pictogramToUpdate) {
                if (!is_numeric($pictogramToUpdate['position'])) {
                    throw new HttpException(
                        Response::HTTP_NOT_ACCEPTABLE,
                        sprintf('The product variant position "%s" is invalid.', $pictogramToUpdate['position'])
                    );
                }

                /** @var ProductVariantInterface $pictogram */
                $pictogram = $this->repository->findOneBy(['id' => $pictogramToUpdate['id']]);
                $pictogram->setPosition((int) $pictogramToUpdate['position']);
                $this->manager->flush();
            }
        }

        return new JsonResponse();
    }
}
