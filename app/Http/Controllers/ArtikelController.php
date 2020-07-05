<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;
use Carbon\Carbon;
use Redirect;

class ArtikelController extends Controller
{
    public function index() {
        $articles = ArtikelModel::get_all();
        return view('artikel.index', compact('artikel'));
    }

    public function create() {
        return view('artikel.form');
    }

    public function store(Request $request) {
        $data = $request->all();
        $slugs = array("slug" => $slug);
        $uuserid = array("user_id" => "dwi");
        unset($data["_token"]);
        $dt = array("tanggal_dibuat" => Carbon::now('Asia/Jakarta')->toDateTimeString());
        $slug = strtolower(str_replace(' ', '-', $data["judul"]));
        
        $data = array_merge($data, $dt, $slugs, $uuserid);
        $item = ArtikelModel::save($data);
        return redirect('/artikel');
    }

    public function show($id) {
        $articlex = ArtikelModel::findById($id);
        return view('artikel.detail', compact('artikel'));
    }

    public function edit($id) {
        $articlex = ArtikelModel::find_By_Id($id);
        $article = $articlex[0];
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $dt = array("tanggal_diperbarui" => Carbon::now('Asia/Jakarta')->toDateTimeString());
        $slug = strtolower(str_replace(' ', '-', $data["judul"]));
        $sl = array("slug" => $slug);
        $data = array_merge($data, $dt, $sl);
        $item = ArtikelModel::update($data, $id);
        return redirect('/artikel');
    }

    public function destroy($id) {
        $delete = ArtikelModel::delete($id);
        return redirect('/artikel');
    }
}

}
