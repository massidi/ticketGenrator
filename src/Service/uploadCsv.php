<?php

namespace App\Service;

class uploadCsv
{
    public function parseCsvFile($file): array
    {
        $csvData = [];
        $filePath = $file->getPathname();

        if (($handle = fopen($filePath, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $csvData[] = $data;
            }
            fclose($handle);
        }

        return $csvData;
    }

}