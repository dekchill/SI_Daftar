<?php

namespace Master;

use Config\Query_builder;

class admin
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('admin')->get()->resultArray();
        $res = '<a href="?target=admin&act=tambah_admin" class="btn btn-info btn-sm">Tambah admin</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>password</th>
                    <th>Nama</th>
                    <th>nip</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="10">' . $no . '</td>
                <td>' . $r['password'] . '</td>
                <td>' . $r['nama'] . '</td>
                <td>' . $r['nip'] . '</td>
                <td width="150">
                    <a href="?target=admin&act=edit_admin&id=' . $r['password'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?target=admin&act=delete_admin&id=' . $r['password'] . '" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=admin&act=simpan_admin">
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="text" class="form-control" id="nip" name="nip">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $data = array(
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip,
        );
        return $this->db->table('admin')->insert($data);
    }
    public function edit($id)
    {
        // get data admin
        $r = $this->db->table('admin')->where("password='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=admin&act=update_admin">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['password'] . '">

            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password" value="' . $r['password'] . '">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
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

    public function update()
    {
        $param = $_POST['param'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
       
        $data = array(
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip,
            
        );
        return $this->db->table('admin')->where("password='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('admin')->where("password='$id'")->delete();
    }
}
