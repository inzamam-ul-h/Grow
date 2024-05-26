<?php
namespace App\Repositories;
use App\Models\OrganizationProfile;
use App\Repositories\Interfaces\OrganizationProfileRepositoryInterface;

class OrganizationProfileRepository implements OrganizationProfileRepositoryInterface{
    protected $orgprofile ;
    
    public function __construct(OrganizationProfile $orgprofile )
    {
        $this->orgprofile = $orgprofile ;
    }

     public function getAll()
    {
        return OrganizationProfile::with('user')->get();
    }
    
    public function all()
    {
        return $this->orgprofile ->all();
    }
    
    public function find($id)
    {
        return $this->orgprofile ->find($id);
    }
    
    public function create(array $attributes)
    {
        return $this->orgprofile ->create($attributes);
    }



    
   /* public function update($id, array $attributes)
    {
        $blog = $this->blog->findOrFail($id);
        $blog->update($attributes);
        return $blog;
    }
    
    public function delete($id): bool
    {
        return $this->blog->find($id)->delete();
    }

    public function forceDelete($id): bool
    {
        return $this->blog->find($id)->forceDelete();
    }

    public function restore($id): bool
    {
        return $this->blog->onlyTrashed()->find($id)->restore();
    }

    public function trashed()
    {
        return $this->blog->onlyTrashed()->get();
    }*/
}