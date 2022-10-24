<?php

namespace App\FinanceAnalyzer\Factories;

use App\FinanceAnalyzer\DTOs\UploadDTO;

class UploadFactory
{
    public function fromArray(array $data): UploadDTO
    {
        $dto = new UploadDTO();
        $dto->uploadedFile = $data['uploaded_file'];

        return $dto;
    }
}
