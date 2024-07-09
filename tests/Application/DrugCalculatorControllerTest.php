<?php

namespace App\Tests\Application;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DrugCalculatorControllerTest extends WebTestCase
{
    const string DRUG_CALCULATOR_CALCULATE_DOSE_ENDPOINT = '/drug-calculator/calculate-dose';
    private KernelBrowser $httpClient;

    public function setUp(): void
    {
        $this->httpClient = static::createClient([], ['HTTP_Content-Type' => 'application/json']);
    }
    #[Test]
    public function testCalculateDose()
    {
        $this->httpClient->request(
            'POST',
            self::DRUG_CALCULATOR_CALCULATE_DOSE_ENDPOINT,
        );

        $this->assertEquals(Response::HTTP_OK, $this->httpClient->getResponse()->getStatusCode());
        $this->assertJson($this->httpClient->getResponse()->getContent());
        $this->assertEquals(['oneDose' => 10], json_decode($this->httpClient->getResponse()->getContent(), true));
    }
}