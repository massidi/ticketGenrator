<?php

namespace App\Controller;

use App\Service\uploadCsv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class CsvImportController extends AbstractController
{

    #[Route("/")]
    public function index()
    {
        return $this->render('csv_import/index.html.twig');
    }

    #[Route("/csv/import",name: "csv_import_import")]

    public function import(Request $request,uploadCsv $uploadCsv)
    {
        $csvData =$uploadCsv->parseCsvFile($request->files->get('csv_file'));

        return $this->render('csv_import/result.html.twig', [
            'csvData' => $csvData,
        ]);
    }

}
