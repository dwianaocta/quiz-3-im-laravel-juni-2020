<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel {

    public static function get_all() {
        $items = DB::table('artikel')->get();
        return $items;
    }

    public static function save($data) {
        $new_item = DB::table('artikel')->insert($data);
        return $new_item;
    }

    public static function delete($id) {
        $del = DB::table('artikel')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }
    public static function find_By_Id($id) {
        $item = DB::table('artikel')
                    ->where('id', $id)
                    ->first();
        return [$item];
    }

    public static function update($request, $id){
        //dd($request);
        $item = DB::table('artikel')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request['judul'],
                        'isi'   => $request['isi'],
                        'slug'   => $request['slug'],
                        'tag'   => $request['tag'],
                        'tanggal_diperbarui' => $request['tanggal_diperbarui']
                    ]);
        return $item;
    }

    
}

?>