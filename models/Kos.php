<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 10:02
 */
class Kos extends ORM {
    public function add_sub($id) {
        $sub_fasilitas = Input::postOrOr('sub_fasilitas', []);
        $old_sub_fasilitas = Input::postOrOr('old_sub_fasilitas', []);

        $ins = array_diff($sub_fasilitas, $old_sub_fasilitas);
        $del = array_diff($old_sub_fasilitas, $sub_fasilitas);
        foreach($ins as $i) {
            $this->Insert(['id_fasilitas' => $i, 'id_kos' => $id], "fasilitas_kos");
        }
        foreach($del as $i) {
            // echo "WHERE id_kos = $id AND id_fasilitas = $i ";
            if ($i !='') {
                $this->Delete("WHERE id_kos = $id AND id_fasilitas = $i", "fasilitas_kos");
            }
        }
    }
}