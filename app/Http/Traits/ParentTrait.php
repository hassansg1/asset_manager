<?php

namespace App\Http\Traits;

use App\Models\Computer;
use App\Models\LoneAsset;
use App\Models\NetworkAsset;
use App\Models\Parentable;
use ReflectionClass;

trait ParentTrait
{
    /**
     * @param $request
     * @param $item
     */
    function updateParent($request, $item)
    {
        if (isset($request->parent)) {
            $prt = explode('??', $request->parent);
            Parentable::addNew($prt[0] ?? null, $prt[1] ?? null, self::class, $item->id);
        }
    }


//    /**
//     * @return string
//     */
//    public function getNameAttribute(): string
//    {
//        return $this->name;
//    }

    /**
     * @param $item
     * @return mixed
     */
    public function parent($item = null)
    {
        $item = $item ?? $this;
        $par = Parentable::where([
            'childable_type' => get_class($item),
            'childable_id' => $item->id,
        ])->first();

        return $par;
    }

    /**
     * @param $item
     * @return mixed
     */
    public function parentModel($item = null)
    {
        $par = self::parent($this);
        if ($par && $par->parentable_type)
            return $par->parentable_type::find($par->parentable_id);

        return null;
    }

    public function getLink()
    {
        $reflect = new ReflectionClass($this);
        return route(strtolower($reflect->getShortName()) . '.index');
    }

    /**
     * @return string
     */
    public function parentName()
    {
        $par = self::parent($this);
        if ($par) {
            if ($par->parentable_type) {
                $parent = $par->parentable_type::find($par->parentable_id);
                return $parent->show_name ?? '';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getParentableTypeAttribute()
    {
        $par = self::parentModel($this);
        if ($par) return get_class($par);
        return '';
    }

    /**
     * @return string
     */
    public function getParentCombineAttribute()
    {
        $par = self::parentModel($this);
        if ($par)
            return get_class($par) . "??" . $par->id;
    }

    /**
     * @return string
     */
    public function getPermissionStringAttribute()
    {
        $par = self::parentModel($this);
        if ($par)
            return get_class($par) . $par->id;
        return '';
    }

    /**
     * @return string
     */
    public function getFullPermissionStringAttribute()
    {
        $par = self::parentModel($this);
        $class = '';
        if (get_class($this) == NetworkAsset::class)
            $class = "viewnetworkassets";
        if (get_class($this) == LoneAsset::class)
            $class = "viewl01assets";
        if (get_class($this) == Computer::class)
            $class = "viewassets";
        if ($par)
            return $class . get_class($par) . $par->id;
        return '';
    }

    /**
     * @return string
     */
    public function getTableAttribute()
    {
        return $this->getTable();
    }

    /**
     * @return string
     */
    public function getCombineAttribute()
    {
        return get_class($this) . "??" . $this->id;
    }

    /**
     * @return string
     */
    public function getCombineShortAttribute()
    {
        $reflect = new ReflectionClass($this);
        return $reflect->getShortName() . "??" . $this->id;
    }

    /**
     * @return string
     */
    public function getParentableIdAttribute()
    {
        $par = self::parentModel($this);
        if ($par) return $par->id;
        return '';
    }
}
