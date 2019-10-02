<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 13:05
 */
class Pariwisata extends ORM {
    public function add_transport($id) {
        $transport = Input::postOrOr('transport', []);
        $price = Input::postOrOr('price', []);

        foreach($transport as $i => $c) {
            if($c != '' && $price[$i] != '' && $price[$i] > 0)
                $this->Insert(['name' => $c, 'price' => $price[$i], 'pariwisata_id' => $id], "transportasi");
        }
    }

    public function edit_transport($id) {
        $old_id = Input::postOrOr('old_id', []);
        $old_transport = Input::postOrOr('old_transport', []);
        $old_price = Input::postOrOr('old_price', []);

        foreach($old_transport as $i => $c) {
            if($c != '' && $old_price[$i] != '' && $old_price[$i] > 0)
                $this->Update(['name' => $c, 'price' => $old_price[$i]], "WHERE id = " . $old_id[$i], "transportasi");
        }
    }

    public function add_recom($id) {
        $hotel = Input::postOrOr('hotel', []);
        $old_hotel = Input::postOrOr('old_hotel', []);

        $ins = array_diff($hotel, $old_hotel);
        $del = array_diff($old_hotel, $hotel);

        foreach($ins as $i) {
            $this->Insert(['hotel_id' => $i, 'pariwisata_id' => $id], "rekomendasi_hotel");
        }

        foreach($del as $i) {
            $this->Delete("WHERE pariwisata_id = $id AND hotel_id = $i", "rekomendasi_hotel");
        }

        $restoran = Input::postOrOr('restoran', []);
        $old_restoran = Input::postOrOr('old_restoran', []);

        $ins = array_diff($restoran, $old_restoran);
        $del = array_diff($old_restoran, $restoran);

        foreach($ins as $i) {
            $this->Insert(['restoran_id' => $i, 'pariwisata_id' => $id], "rekomendasi_restoran");
        }

        foreach($del as $i) {
            $this->Delete("WHERE pariwisata_id = $id AND restoran_id = $i", "rekomendasi_restoran");
        }
    }
}