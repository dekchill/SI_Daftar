<?php

namespace Master;

use Config\Query_builder;

class pegawai
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('pegawai')->get()->resultArray();
        $res = '<a href="?target=pegawai&act=tambah_pegawai" class="btn btn-info btn-sm">Tambah pegawai</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>nama_gelar</th>
                    <th>nip</th>
                    <th>alamat</th>
                    <th>jenis_jfk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="100">' . $r['nama_gelar'] . '</td>
                <td>' . $r['nip'] . '</td>
                <td>' . $r['alamat'] . '</td>
                <td>' . $r['jenis_jfk'] . '</td>
                <td width="150">
                    <a href="?target=pegawai&act=edit_pegawai&id=' . $r['nama_gelar'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?target=pegawai&act=delete_pegawai&id=' . $r['nama_gelar'] . '" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pegawai&act=simpan_pegawai">
            <div class="mb-3">
                <label for="nama_gelar" class="form-label">nama_gelar</label>
                <input type="text" class="form-control" id="nama_gelar" name="nama_gelar">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="text" class="form-control" id="nip" name="nip">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="jenis_jfk" class="form-label">jenis_jfk</label>
                <input type="text" class="form-control" id="jenis_jfk" name="jenis_jfk">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $nama_gelar = $_POST['nama_gelar'];
        $nip = $_POST['nip'];
        $alamat = $_POST['alamat'];
        $jenis_jfk = $_POST['jenis_jfk'];

        $data = array(
            'nama_gelar' => $nama_gelar,
            'nip' => $nip,
            'alamat' => $alamat,
            'jenis_jfk' => $jenis_jfk,
        );
        return $this->db->table('pegawai')->insert($data);
    }
    public function edit($id)
    {
        // get data pegawai
        $r = $this->db->table('pegawai')->where("nama_gelar='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pegawai&act=uptext_pegawai">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['nama_gelar'] . '">

            <div class="mb-3">
                <label for="nama_gelar" class="form-label">nama_gelar</label>
                <input type="text" class="form-control" id="nama_gelar" name="nama_gelar" value="' . $r['nama_gelar'] . '">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="' . $r['alamat'] . '">
            </div>
            <div class="mb-3">
                <label for="jenis_jfk" class="form-label">jenis_jfk</label>
                <input type="text" class="form-control" id="jenis_jfk" name="jenis_jfk" value="' . $r['jenis_jfk'] . '">
            </div>


            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    }

    public function cekRadio($val, $val2)
    {
        if ($val == $val2) {
            return "checked";
        }
        return "";
    }

    public function uptext()
    {
        $param = $_POST['param'];
        $nama_gelar = $_POST['nama_gelar'];
        $nip = $_POST['nip'];
        $alamat = $_POST['alamat'];
        $jenis_jfk = $_POST['jenis_jfk'];

        $data = array(
            'nama_gelar' => $nama_gelar,
            'nip' => $nip,
            'alamat' => $alamat,
            'jenis_jfk' => $jenis_jfk,
        );
        return $this->db->table('pegawai')->where("nama_gelar='$param'")->uptext($data);
    }

    public function delete($id)
    {
        return $this->db->table('pegawai')->where("nama_gelar='$id'")->delete();
    }
}
