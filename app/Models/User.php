<?php

namespace App\Models;

use App\Model;

class User extends Model{
    protected $tableName = 'users';

    public function paginate($page = 1, $limit = 10){

        $offset = ($page -1) *$limit;
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')
                ->from($this->tableName)
                ->setFirstResult($offset)
                ->setMaxResults($limit);
        $data= $queryBuilder->fetchAllAssociative();
        $totalPage = ceil($this->count()/$limit);
        return [
            'data'=>$data,
            'page'=>$page,
            'limit'=>$limit,
            'totalPage'=>$totalPage
        ];
                
    }
    public function checkEmailForInsert($email){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('COUNT(*)')->from($this->tableName)
                    ->where('email=:email')
                    ->setParameter('email',$email);
        
        $result=$queryBuilder->fetchOne();
        return $result >0;
    }

    public function checkEmailForUpdate($id,$email){

        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('COUNT(*)')
                ->from($this->tableName)
                ->where('email =:email')
                ->andWhere('id != :id')
                ->setParameter('email', $email)
                ->setParameter('id',$id);

        $result = $queryBuilder->fetchOne();
        return $result>0;
        
    }

    public function getUserByEmail($email){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')->from($this->tableName)
                    ->where('email=:email')
                    ->setParameter('email',$email);
        
        $result=$queryBuilder->fetchAssociative();
        return $result;
    }

}