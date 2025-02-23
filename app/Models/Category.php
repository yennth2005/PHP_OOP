<?php

namespace App\Models;

use App\Model;

class Category extends Model{
    protected $tableName = "categories";
    public function checkNameForInsert($name){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('COUNT(*)')->from($this->tableName)
                    ->where('name=:name')
                    ->setParameter('name',$name);
        
        $result=$queryBuilder->fetchOne();
        return $result >0;
    }

    public function checkNameForUpdate($id,$name){

        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('COUNT(*)')
                ->from($this->tableName)
                ->where('name =:name')
                ->andWhere('id != :id')
                ->setParameter('name', $name)
                ->setParameter('id',$id);

        $result = $queryBuilder->fetchOne();
        return $result>0;
        
    }

    public function getCateOnlyActive(){

        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')->from($this->tableName)
                    ->where('is_active=1');

        return $queryBuilder->fetchAllAssociative();
    }
}