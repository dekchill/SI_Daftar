<?php

namespace Master;

use Config\Query_builder;

class pendaftaran
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('pendaftaran')->get()->resultArray();
        $res = '<a href="?target=pendaftaran&act=tambah_pendaftaran" class="btn btn-info btn-sm">Tambah pendaftaran</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>alamat_email</th>
                    <th>unit_kerja</th>
                    <th>instansi</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="100">' . $r['alamat_email'] . '</td>
                <td>' . $r['unit_kerja'] . '</td>
                <td>' . $r['instansi'] . '</td>
                <td width="150">
                    <a href="?target=pendaftaran&act=edit_pendaftaran&id=' . $r['alamat_email'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?target=pendaftaran&act=delete_pendaftaran&id=' . $r['alamat_email'] . '" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=pendaftaran" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pendaftaran&act=simpan_pendaftaran">
            <div class="mb-3">
                <label for="alamat_email" class="form-label">Alamat Email</label>
                <input type="text" class="form-control" id="alamat_email" name="alamat_email">
            </div>
            <div class="mb-3">
                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja">
            </div>
            <div class="mb-3">
                <label for="instansi" class="form-label">instansi</label>
                <input type="text" class="form-control" id="instansi" name="instansi">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $alamat_email = $_POST['alamat_email'];
        $unit_kerja = $_POST['unit_kerja'];
        $instansi = $_POST['instansi'];
        $data = array(
            'alamat_email' => $alamat_email,
            'unit_kerja' => $unit_kerja,
            'instansi' => $instansi,
        );
        return $this->db->table('pendaftaran')->insert($data);
    }
    public function edit($id)
    {
        // get data pendaftaran
        $r = $this->db->table('pendaftaran')->where("alamat_email='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=pendaftaran" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pendaftaran&act=update_pendaftaran">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['alamat_email'] . '">
            <div class="mb-3">
                <label for="alamat_email" class="form-label">Alamat Email</label>
                <input type="text" class="form-control" id="alamat_email" name="alamat_email" value="' . $r['alamat_email'] . '">
            </div>
            <div class="mb-3">
                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="' . $r['unit_kerja'] . '">
            </div>
            <div class="mb-3">
                <label for="instansi" class="form-label">instansi</label>
                <input type="text" class="form-control" id="instansi" name="instansi" value="' . $r['instansi'] . '">
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
        $alamat_email = $_POST['alamat_email'];
        $unit_kerja = $_POST['unit_kerja'];
        $instansi = $_POST['instansi'];

        $data = array(
            'alamat_email' => $alamat_email,
            'unit_kerja' => $unit_kerja,
            'instansi' => $instansi,
        );
        return $this->db->table('pendaftaran')->where("alamat_email='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('pendaftaran')->where("alamat_email='$id'")->delete();
    }
}
