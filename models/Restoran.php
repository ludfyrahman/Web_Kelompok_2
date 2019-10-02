<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 11:41
 */
class Restoran extends ORM {
    public function add_kuliner($id) {
        $culinary = Input::postOrOr('culinary', []);
        $price = Input::postOrOr('price', []);

        foreach($culinary as $i => $c) {
            if($c != '' && $price[$i] != '' && $price[$i] > 0)
                $this->Insert(['name' => $c, 'price' => $price[$i], 'restoran_id' => $id], "kuliner");
        }
    }

    public function edit_kuliner($id) {
        $old_id = Input::postOrOr('old_id', []);
        $old_culinary = Input::postOrOr('old_culinary', []);
        $old_price = Input::postOrOr('old_price', []);

        foreach($old_culinary as $i => $c) {
            if($c != '' && $old_price[$i] != '' && $old_price[$i] > 0)
                $this->Update(['name' => $c, 'price' => $old_price[$i]], "WHERE id = " . $old_id[$i], "kuliner");
        }
    }
}