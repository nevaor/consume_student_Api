<?php
//perbedaan helpers dan libraries 
//helpers bikin Api , method/func nya cuma ada 1 
//llibraries pake Api '' lebih dari satu 
namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;
class BaseApi
{   
    
    //variable yg cuma bisa did akses di class ini dan turunan nya
    
    protected $baseUrl;
    //constractor:menyiapkan isi data, dijalankan otomatis tanpa di panggil 
    public function __construct()
    {
        //variable $baseUrl yg diatas di isi nilainya dari isian file .env bagian API_HOST
        //variable ini di isi otomatis ketika file/class BaseApi di panggil di controller
        $this->baseUrl = "http://127.0.0.1:2222";
    }
    private function client()
    {
        //koneksikan ip dari var $baseURL ke dependency Http
        //menggunakan dependency Http kare3na project API nya berbasis web (protocol Http) 
        return Http::baseURL($this->baseUrl);
    }
    public function index(string $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }
}
?>

