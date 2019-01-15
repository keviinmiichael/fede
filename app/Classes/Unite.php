<?php

namespace App\Classes;

trait Unite {

    public function scopeLeftUnite($query, $relation)
    {
        $this->unite($query, $relation, true);
    }

    public function scopeUnite($query, $relation, $left=false)
    {
        $cardinality = class_basename(get_class($this->$relation()));
        if ($cardinality == 'BelongToMany') {
            $query->uniteRelated($relation, $left);
        } elseif ($cardinality == 'MorphMany') {
            $query->uniteMorphMany($relation, $left);
        } elseif ($cardinality == 'HasMany') {
            $query->uniteHasMany($relation, $left);
        } elseif ($cardinality == 'HasOne') {
            //to do
        } else {
            $query->uniteSimple($relation, $left);
        }
        //if ($this->id) $query->where($this->getTable().'.'.$this->primaryKey, $this->id);
    }

    public function scopeUniteSimple($query, $relation, $left)
    {
        $join = ($left)?'leftJoin':'join';
        $relationTable = $this->$relation()->getRelated()->getTable();
        $ownerKey = $this->$relation()->getQualifiedOwnerKeyName();
        $foreignKey = $this->$relation()->getQualifiedForeignKey();
        $query->$join($relationTable, $ownerKey, '=', $foreignKey);
    }

    public function scopeUniteHasMany($query, $relation, $left)
    {
        $join = ($left)?'leftJoin':'join';
        $relationTable = $this->$relation()->getRelated()->getTable();
        

        $query->$join($relationTable, function ($join) use ($relation) {
            $ownerKey = $this->getTable().'.'.$this->primaryKey;
            $foreignKey = $this->$relation()->getQualifiedForeignKeyName();
            $join->on($ownerKey, '=', $foreignKey);
        });
    }

    public function scopeUniteRelated($query, $relation, $left)
    {
        $join = ($left)?'leftJoin':'join';
        $pivot = $this->$relation()->getTable();
        $related = $this->$relation()->getRelated()->getTable();
        $pivotOwnKey = $this->$relation()->getQualifiedForeignKeyName();
        $pivotForeingKey = $this->$relation()->getQualifiedRelatedKeyName();
        $ownerKey = $this->$relation()->getQualifiedParentKeyName();
        $foreignKey = $this->$relation()->getRelated()->getQualifiedKeyName();
        $query->$join($pivot, $pivotOwnKey, '=', $ownerKey);
        $query->$join($related, $pivotForeingKey, '=', $foreignKey);
    }

    public function scopeUniteMorphMany($query, $relation, $left)
    {
        $join = ($left)?'leftJoin':'join';
        $relationTable = $this->$relation()->getRelated()->getTable();
        

        $query->$join($relationTable, function ($join) use ($relation) {
            $ownerKey = $this->getTable().'.'.$this->primaryKey;
            $foreignKey = $this->$relation()->getQualifiedForeignKeyName();
            $morphType = $this->$relation()->getQualifiedMorphType();
            $morphClass = $this->$relation()->getMorphClass();
            $join->on($ownerKey, '=', $foreignKey)
                 ->where($morphType, $morphClass);
        });
    }

}