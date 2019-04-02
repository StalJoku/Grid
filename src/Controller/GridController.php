<?php
	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use App\Services\GridObject;

	class GridController extends Controller
	{
		/**
		 * @Route("/"), methods={"GET","HEAD"})	 
		 */		

		public function index(GridObject $gridSize) 
		{
			return $this->render('grid/index.html.twig', [
				'gridSize' => $gridSize->getGrid()
			]);
		}
	}