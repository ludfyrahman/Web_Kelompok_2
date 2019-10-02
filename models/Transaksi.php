<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 13:05
 */
class Transaksi extends ORM {
    public function add($code) {
        $this->pdo->beginTransaction();

        $d = $_SESSION;

        try {
            $this->Insert(['code' => $code, 'status' => 1, 'phone' => $_POST['phone'], 'depart' => $_POST['depart'], 'akun_id' => $d['userid'], 'pariwisata_id' => $_POST['pariwisata_id']]);
            $id = $this->pdo->lastInsertId();

            if(isset($d['transport'])) {
                $this->Insert(['transaksi_id' => $id, 'transportasi_id' => $d['transport'], 'price' => $d['transport_price']], "transaksi_transportasi");
            }

            if(isset($d['hotel'])) {
                $this->Insert(['transaksi_id' => $id, 'kamar_id' => $d['room'], 'price' => $d['room_price'], 'check_in' => $d['check_in'], 'check_out' => $d['check_out'], 'room' => $d['room_need']], "transaksi_hotel");

                $this->CustomQuery("UPDATE kamar SET room_exists = room_exists - $d[room_need] WHERE id = $d[room]");
            }

            if(count($d['culinary']) > 0) {
                foreach($d['culinary'] as $i => $c) {
                    $this->Insert(['transaksi_id' => $id, 'kuliner_id' => $c, 'qty' => $d['qty'][$i], 'price' => $d['food_price'][$i]], "transaksi_kuliner");
                }
            }

            $this->pdo->commit();
        }
        catch(Exception $e) {
            $this->pdo->rollback();
            print_r($e);
        }
    }
}