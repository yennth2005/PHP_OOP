<?php

namespace App\Models;

use App\Model;

class Product extends Model
{
    protected $tableName = 'products';


    public function paginate($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('
            p.id                        p_id,
            p.name                              p_name,
            p.price                             p_price,
            c.name                              c_name,
            p.img_thumbnail                     p_img_thumbnail,
            p.price                             p_price,
            p.price_sale                        p_price_sale,
            p.is_sale                           p_is_sale,
            p.is_active                         p_is_active,
            p.is_show_home                      p_is_show_home,
            p.created_at                        p_created_at,
            p.updated_at                        p_updated_at
        ')
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id =p.category_id ')
            ->orderBy('p.id', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit);
        $data = $queryBuilder->fetchAllAssociative();
        $totalPage = ceil($this->count() / $limit);
        return [
            'data' => $data,
            'page' => $page,
            'limit' => $limit,
            'totalPage' => $totalPage
        ];
    }
    public function selectById($id){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('
            p.id                        p_id,
            p.name                              p_name,
            p.slug                              p_slug,       
            p.price                             p_price,
            p.category_id                       p_category_id,
            c.name                              c_name,
            p.img_thumbnail                     p_img_thumbnail,
            p.price                             p_price,
            p.price_sale                        p_price_sale,
            p.overview                          p_overview,
            p.content                           p_content,
            p.quantity                          p_quantity,
            p.is_sale                           p_is_sale,
            p.is_active                         p_is_active,
            p.is_show_home                      p_is_show_home,
            p.created_at                        p_created_at,
            p.updated_at                        p_updated_at
        ') ->from($this->tableName,'p')
            ->innerJoin('p','categories','c','c.id = p.category_id')
            ->where('p.id =:id')
            ->setParameter('id',$id);
        return $queryBuilder->fetchAssociative();

    }
    public function showHome(){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')
                ->from($this->tableName)
                ->where('is_show_home=1');
        $data= $queryBuilder->fetchAllAssociative();
        return $data;
    }

    public function getProductsByCategory($id){
        $queryBuilder = $this->cont->createQueryBuilder();
        $queryBuilder->select('*')
                ->from($this->tableName)
                ->where('category_id= :category_id')
                ->setParameter('category_id',$id);
        $data= $queryBuilder->fetchAllAssociative();
        return $data;
    }
    // public function paginate($page = 1, $limit = 10)
    // {
    //     $offset = ($page - 1) * $limit;

    //     $queryBuilder = $this->cont->createQueryBuilder();
    //     $queryBuilder
    //         ->select(
    //             'p.id                       p_id',
    //             'p.name                     p_name',
    //             'c.name                     c_name',
    //             'p.img_thumbnail            p_img_thumbnail',
    //             'p.price                    p_price',
    //             'p.price_sale               p_price_sale',
    //             'p.is_sale                  p_is_sale',
    //             'p.is_active                p_is_active',
    //             'p.is_show_home             p_is_show_home',
    //             'p.created_at               p_created_at',
    //             'p.updated_at               p_updated_at'
    //         )
    //         ->from($this->tableName, 'p')
    //         ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')

    //         ->orderBy('p.id', 'DESC')
    //         ->setFirstResult($offset)
    //         ->setMaxResults($limit);

    //     $data = $queryBuilder->fetchAllAssociative();
    //     $totalPage = ceil($this->count() / $limit); // Làm tròn lên

    //     return [
    //         'data'          => $data,
    //         'page'          => $page,
    //         'limit'         => $limit,
    //         'totalPage'     => $totalPage
    //     ];
    // }
}
