<?php
namespace App;
use Doctrine\DBAL\DriverManager;

class Model{

    protected $cont;
    protected $tableName;

    public function __construct(){
        $contParams = [
            'dbname' =>$_ENV['DB_NAME'],
            'user' =>$_ENV['DB_USERNAME'],
            'password' =>$_ENV['DB_PASSWORD'],
            'host' =>$_ENV['DB_HOST'],
            'driver' => $_ENV['DB_DRIVER']
        ];
        $this->cont = DriverManager::getConnection($contParams);
    }

    public function selectAll(){
        $sql = $this->cont->createQueryBuilder();
        $sql->select('*')
            ->from($this->tableName);
        return $sql->fetchAllAssociative();
    }

    public function selectById($id){
        $sql = $this->cont->createQueryBuilder();
        $sql->select('*') ->from($this->tableName)
            ->where('id = :id')
            ->setParameter('id',$id);
        return $sql->fetchAssociative();
    }

    public function delete($id){
        return $this->cont->delete($this->tableName,['id'=>$id]);
    }

    public function create(array $data){
         $this->cont->insert($this->tableName,$data);
         return $this->cont->lastInsertId();
    }
    public function update($data, $id){
        return $this->cont->update($this->tableName, $data, ['id'=>$id]);
    }


    public function paginate($page =1 , $limit = 10){
        $offset = ($page-1) *$limit;
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')->from($this->tableName)
            ->setFirstResult($offset) 
            ->setMaxResults($limit);
        $data =  $queryBuilder->fetchAllAssociative();
        $totalPage = ceil($this->count()/$limit);

        return [
            'data' =>$data,
            'page' =>$page,
            'limit'=>$limit,
            'totalPage'=>$totalPage
        ];


    }
    public function count(){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('COUNT(*) as total')
                ->from($this->tableName);
        return $queryBuilder->fetchOne();
    }
}