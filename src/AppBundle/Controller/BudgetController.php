<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BudgetController extends Controller
{
	public function getBudgetsAction(Request $request)
	{
		$request = new JsonResponse ([
			"incomeStreals" => [
				[
					"key" => 1,
					"name" => "Playcheck",
					"frequency" => 2,
					"amount" => 2000,
				],
				[
					"key" => 2,
					"name" => "Investment Income",
					"frequency" => 1,
					"amount" => 200,
				]
			],

			"expense" => [
				[
					"key" => 1,
					"name" => "Mortgage",
					"amount" => 1300,
				],
				[
					"key" => 2,
					"name" => "HOA",
					"amount" => -400,
				],
				[
					"key" => 3,
					"name" => "Phone",
					"amount" => -120,
				],
				[
					"key" => 4,
					"name" => "Internet",
					"amount" => -60,
				],
			]
		]);

		return $request;
		// var_dump($request);
	}
}
