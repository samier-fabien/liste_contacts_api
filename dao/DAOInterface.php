<?php
interface DAOInterface
{
    public function findAll(): array;
    public function findById(Entite $entite): array;
    public function insert(Entite $entite): bool;
    public function update(Entite $entite): bool;
    public function delete(Entite $entite): bool;
}