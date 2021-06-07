<?php

namespace App\Components;

class Recusive
{
//    lấy data gưi từ controller về
    private $data, $htmlSelect = " ";

    public function __construct($data)
    {
        $this->data = $data;
    }

//  đệ quy time!
    function categoryRecusive($currentParent, $id, $text = '-', $parent_id = 0 )
    {

        foreach ($this->data as $value) {
            if ($value["parent_id"] == $parent_id) {

                if ($currentParent == $value['id']) {
                    $this->htmlSelect .= "<option selected value='".$value["id"]."'>".$text.$value['name']."</option>";
                }else if ($id != $value['id']){
                    $this->htmlSelect .= "<option value='".$value["id"]."'>".$text.$value['name']."</option>";
                }
                $this->categoryRecusive($currentParent, $id, $text."--", $value['id']);
            }
        }
        return $this->htmlSelect;
    }
}
