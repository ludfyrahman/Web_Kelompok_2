<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 10:02
 */
class Kos extends ORM {
    public function add_sub($id, $index) {
        $sub_fasilitas = Input::postOrOr('sub_fasilitas', []);
        $old_sub_fasilitas = Input::postOrOr('old_sub_fasilitas', []);
        // echo count($sub_fasilitas);
        // print_r($sub_fasilitas[$index]);
        // echo sizeof($sub_fasilitas);
        
        // foreach ($sub_fasilitas[$index] as $sb) {
            // print_r($sb);
            // echo "sub fasilitas bawah <br>";
            // print_r($old_sub_fasilitas);
            $ins = array_diff($sub_fasilitas[$index], $old_sub_fasilitas[$index]);
            $del = array_diff($old_sub_fasilitas[$index], $sub_fasilitas[$index]);
            // echo "batas <br>";
            foreach($ins as $i) {
                // print_r(['id_fasilitas' => $i, 'id_kos' => $id]);
                $this->Insert(['id_fasilitas' => $i, 'id_kos' => $id], "fasilitas_kos");
            }
            foreach($del as $i) {
                // echo "WHERE id_kos = $id AND id_fasilitas = $i ";
                if ($i !='') {
                    $this->Delete("WHERE id_kos = $id AND id_fasilitas = $i", "fasilitas_kos");
                }
            }
        // }
    }
}