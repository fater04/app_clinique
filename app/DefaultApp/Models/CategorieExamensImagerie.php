<?php
/**
 * Created by PhpStorm.
 * User: alcin
 * Date: 3/31/2020
 * Time: 1:40 PM
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class CategorieExamensImagerie extends Model
{

    protected $table="categorie_examens_imagerie";
    public $id,$categorie;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    private function existe($categorie){
        try{
            $con=self::connection();
            $req="select *from categorie_examens_imagerie where categorie=:categorie";
            $stmt=$con->prepare($req);
            $stmt->execute(array(
                ":categorie"=>$categorie
            ));
            $data=$stmt->fetchAll();
            if(count($data)>0){
                return true;
            }
            return false;
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }

    public function add()
    {
        if($this->existe($this->categorie)){
            return "Catégorie examens existe deja";

        }
        return parent::add(); // TODO: Change the autogenerated stub
    }

}
