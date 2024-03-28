<?php
namespace App\Repository;

use stdClass;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;

interface SupportRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function new(CreateSupportDTO $dto):stdClass;
    public function update(UpdateSupportDTO $dto):stdClass|null;
    public function delete(string $id): void;
}