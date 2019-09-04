<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller {

    protected $url = 'http://petstore.swagger.io/v2/pet/';

    public function index(Request $request) {


        return view('pets.index');
    }

    public function add(Request $request) {


        return view('pets.add_pet');
    }

    public function store(Request $request) {


        $getdata = json_encode(array(
            'id' => $request->id,
            'category' => [
                'id' => $request->cat_id,
                'name' => $request->cat_name
            ],
            'name' => $request->name,
            'photoUrls' => ['text'],
            'status' => $request->status,
            'tags' => [
                [
                    'id' => $request->tags_id,
                    'name' => $request->tags_name
                ]
            ]
        ));

        $response = $this->callAPI('POST', $this->url, $getdata);

        return $response;
    }

    public function update() {


        return view('pets.update');
    }

    public function edit(Request $request) {


        $getdata = json_encode(array(
            'id' => $request->id,
            'category' => [
                'id' => $request->cat_id,
                'name' => $request->cat_name
            ],
            'name' => $request->name,
            'photoUrls' => ['text'],
            'status' => $request->status,
            'tags' => [
                [
                    'id' => $request->tags_id,
                    'name' => $request->tags_name
                ]
            ]
        ));

        $response = $this->callAPI('PUT', $this->url, $getdata);

        return $response;
    }

    public function findByStatus(Request $request) {
        $response = [];

        if ($request->status) {

            $response = $this->callAPI('GET', $this->url . 'findByStatus?status=' . $request->status);
            $response = json_decode($response);
        }

        return view('pets.find_by_status', compact('response'));
    }

    public function getByStatus(Request $request) {
        $response = [];

        if ($request->status) {

            $response = $this->callAPI('GET', $this->url . 'findByStatus?status=' . $request->status);
        }

        return $response;
    }

    public function find() {

        return view('pets.find');
    }

    public function details(Request $request) {

        $response = $this->callAPI('GET', $this->url . $request->id);

        return $response;
    }

    public function delete() {

        return view('pets.delete');
    }

    public function detailsPet(Request $request) {


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url . $request->id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');


        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api_key: 1';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $response = [];
        $response['data'] = json_decode($result);
        $response['status'] = $httpcode;

        return $response;
    }

    public function updateByFormData() {

        return view('pets.update_form_data');
    }

    public function saveFormData(Request $request) {
        $getdata = json_encode(array(
            'name' => $request->name,
            'status' => $request->status,
        ));

        $getdata = http_build_query(
                array(
                    'name' => $request->name,
                    'status' => $request->status,
                )
        );


        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $getdata
            )
        );

        $context = stream_context_create($opts);

        $getContent = file_get_contents($this->url . $request->id, false, $context);
        $allData = json_decode($getContent);

        return json_encode(['Update Success!!']);
    }

    private function callAPI($method, $url, $data = '') {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'access-control-allow-headers: Content-Type, api_key, Authorization',
            'access-control-allow-methods: GET, POST, DELETE, PUT',
            'access-control-allow-origin: *',
            'connection: close',
            'Api_key: 1',
            'content-type: application/json',
            'date: Tue, 03 Sep 2019 10:35:28 GMT',
            'server: Jetty(9.2.9.v20150224)',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $response = [];
        $response['data'] = json_decode($result);
        $response['status'] = $httpcode;

        return $response;
    }

}
