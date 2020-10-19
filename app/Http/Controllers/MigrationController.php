<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
	public function waw()
	{
		$client = new \GuzzleHttp\Client();
		$body = $client->get('http://localhost:8001/')->getBody(); 
		$obj = json_decode($body);

		foreach ($obj as $key => $value) {
			if ($value->google_schoolar == NULL) {
				$google1 = NULL;
			} else {
				$google = explode("user=", $value->google_schoolar)[1];
				$google1 = explode("&", $google)[0];
			}
			
			Dosen::create([
				'nidn'				=> $value->nidn,
				'nama'				=> $value->nama,
				'jabatan_id'		=> $value->id_jabatan,
				'prodi_id'			=> $value->id_prodi,
				'email'				=> $value->email,
				'hp'				=> $value->telp,
				'google_scholar_id'	=> $google1,
				'created_at'		=> Carbon::now(),
				'updated_at'		=> Carbon::now(),
			]);
				
			$user = User::updateOrCreate(['nidn' => $value->nidn], [
				'nidn'			=> $value->nidn,
				'password'		=> Hash::make($value->nidn),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			]);
			$user
				->roles()
				->attach(Role::where('name', 'dosen')->first());
		}

        return 'sukses';
	}

	public function wawdetail()
	{
		$get = $this->getToken();
		$data = [
			'token' 		=> $get['data']['id_token'],
			'id_pengguna' 	=> $get['data']['id_pengguna']
		];
		$dosen = $this->getDosenInternal($data);
		$loop = 0;
		foreach ($dosen['data'] as $key => $a) {
			$hasil[$key] = $a;
			$hasil[$key]['detail'] = $this->getDosenDetail($data, $a['id_dosen']);
			$loop++;

			// Custom record
			$prodi_id = ($hasil[$key]['nama_program_studi'] == 'Teknik Informatika') ? 2 : 1 ;

			Dosen::where('nidn', $hasil[$key]['detail']['data']['nidn'])->update([
				'alamat'		=> $hasil[$key]['detail']['data']['alamat'],
				'tempat_lahir'	=> $hasil[$key]['detail']['data']['tempat_lahir'],
				'tanggal_lahir'	=> $hasil[$key]['detail']['data']['tanggal_lahir'],
				'ktp'			=> $hasil[$key]['detail']['data']['nik'],
				'telepon'		=> $hasil[$key]['detail']['data']['no_telepon_rumah'],
				'prodi_id'		=> $prodi_id,
			]);
		}

		return $hasil;
	}

	public function getConfigSister(){
        
        $url = "http://203.142.74.174:4480/apisandbox.php/0.1";
        // $url = "http://sister.stiki-indonesia.ac.id/api.php/0.1";
        $username = "cjNkVFQTYXdXsBzO4/rNApEy9UTY2UF3esPB03vnBW/Ng7+ku1HIDv3/PqgLqLxo";
        $password = "VOMWsyhZ1e24CjMkTtPkJ9Ho4tf0Dmim6yZVd/l8XQGH7P4Pxt++SpiqaOp13jt/";
        $id_pengguna = "eb2bb9bc-bf5e-4663-8b7f-c067ed9b29c2";
        
        return array("url"=>$url, "username"=>$username, "password"=>$password, "id_pengguna"=>$id_pengguna); 
	}

    public function getToken(){    
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"username\": \"".$par["username"]."\", \"password\":\"".$par["password"]."\", \"id_pengguna\":\"".$par["id_pengguna"]."\"}",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if($err){
            return array( 
                "error_code" => 404,
                "error_desc" => "cURL Error #:".$err
            );
        } else {
          return json_decode($response, true);
        }
    }

    public function getDosenInternal($request){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_pengguna==""){
            return "Data Pengguna tidak ditemukan!";
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Referensi/doseninternal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"token\": \"".$token."\",\n  \"id_pengguna\": \"".$id_pengguna."\"\n}",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getDosenDetail($request, $id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Dosen/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"token\": \"".$token."\",\n  \"id_dosen\": \"".$id_dosen."\"\n}",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getReferensiLitabmas($request,$id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_pengguna==""){
            return "Data Pengguna tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Referensi/Litabmas",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_pengguna\": \"".$id_pengguna."\", 
                            \"id_dosen\": \"".$id_dosen."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
    
    public function getPenelitian($request,$id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Penelitian",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                        \"id_dosen\": \"".$id_dosen."\", 
                        \"updated_after\": { \"tahun\": \"1990\", \"bulan\": \"01\", \"tanggal\": \"01\" }}",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPenelitianDetail($request,$id_dosen,$id){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id==""){
            return array("error_code"=>2, "error_desc" =>"ID Penelitian Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Penelitian/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\", 
                            \"id_penelitian_pengabdian\": \"".$id."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPengabdian($request,$id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Pengabdian",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                        \"id_dosen\": \"".$id_dosen."\", 
                        \"updated_after\": { \"tahun\": \"1990\", \"bulan\": \"01\", \"tanggal\": \"01\" }}",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPengabdianDetail($request,$id_dosen,$id){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id==""){
            return array("error_code"=>2, "error_desc" =>"ID Penelitian Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Pengabdian/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\", 
                            \"id_penelitian_pengabdian\": \"".$id."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getReferensiAnggotaDosen($request,$id_pen_peng,$tipe){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_pengguna==""){
            return array("error_code"=>1, "error_desc" =>"ID Pengguna kosong!");
        }
        if($id_pen_peng==""){
            return array("error_code"=>2, "error_desc" =>"ID Penelitian/Pengabdian kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Referensi/AnggotaDosen",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_pengguna\": \"".$id_pengguna."\", 
                            \"id_penelitian_pengabdian\": \"".$id_pen_peng."\",
                            \"tipe_tridarma\": \"".$tipe."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPendidikanFormal($request, $id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/PendidikanFormal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"updated_after\": { \"tahun\": \"1970\", \"bulan\": \"01\", \"tanggal\": \"01\" } }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
    
    public function getPendidikanFormalDetail($request, $id_dosen, $id_riwayat){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id_riwayat==""){
            return array("error_code"=>2, "error_desc" =>"ID Detail kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/PendidikanFormal/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"id_riwayat_pendidikan\": \"".$id_riwayat."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPublikasi($request, $id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Publikasi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"updated_after\": { \"tahun\": \"1970\", \"bulan\": \"01\", \"tanggal\": \"01\" } }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getPublikasiDetail($request, $id_dosen, $id_riwayat){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id_riwayat==""){
            return array("error_code"=>2, "error_desc" =>"ID Detail kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Publikasi/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"id_riwayat_publikasi_paten\": \"".$id_riwayat."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getFungsional($request, $id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/JabatanFungsional",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"updated_after\": { \"tahun\": \"1970\", \"bulan\": \"01\", \"tanggal\": \"01\" } }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getFungsionalDetail($request, $id_dosen, $id_riwayat){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id_riwayat==""){
            return array("error_code"=>2, "error_desc" =>"ID Detail kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/JabatanFungsional/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"id_riwayat_jabatan_fungsional\": \"".$id_riwayat."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getSertifikasi($request, $id_dosen){
        extract($request,EXTR_SKIP);
        
        if($token=="")
            return "Token tidak ditemukan!";
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Sertifikasi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"updated_after\": { \"tahun\": \"1970\", \"bulan\": \"01\", \"tanggal\": \"01\" } }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
    
    public function getSertifikasiDetail($request, $id_dosen, $id_riwayat){
        extract($request,EXTR_SKIP);
        
        if($token==""){
            return "Token tidak ditemukan!";
        }
        if($id_dosen==""){
            return array("error_code"=>1, "error_desc" =>"ID Dosen kosong!");
        }
        if($id_riwayat==""){
            return array("error_code"=>2, "error_desc" =>"ID Detail kosong!");
        }
        
        $par = $this->getConfigSister();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $par["url"]."/Sertifikasi/detail",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"id_token\": \"".$token."\", 
                            \"id_dosen\": \"".$id_dosen."\",
                            \"id_riwayat_sertifikasi\": \"".$id_riwayat."\" }",
            CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
}
