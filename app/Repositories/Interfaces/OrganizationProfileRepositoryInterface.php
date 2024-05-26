<?php
namespace App\Repositories\Interfaces;

interface OrganizationProfileRepositoryInterface{
    public function all();
    public function find($id);
    public function create(array $attributes);
   /* public function update($id, array $attributes);
   
    public function delete($id): bool;
    public function forceDelete($id): bool;
    public function restore($id): bool;
    public function trashed();
    public function getAll();*/
   
 
    
}