<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/drug-calculator', name: 'drug_calculator')]
class DrugCalculatorController extends AbstractController
{
    #[Route(path: '/calculate-dose', name: 'calculate_dose')]
    public function calculateDose(Request $request): JsonResponse
    {
        $weight = $request->get('weight');

        return new JsonResponse(['oneDose' => $weight * 0.15], Response::HTTP_OK);
    }
}