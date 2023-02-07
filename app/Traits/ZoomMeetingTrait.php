<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Log;

/**
 * trait ZoomMeetingTrait
 */
trait ZoomMeetingTrait
{
    public $client;
    public $jwt;
    public $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->jwt = $this->generateZoomToken();
        $this->headers = [
            'Authorization' => 'Bearer '.$this->jwt,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
    }
    public function generateZoomToken()
    {
//         $key = env('ZOOM_API_KEY', '');y-2re5W6R2Or5Hx488xTBw
        $key = "y-2re5W6R2Or5Hx488xTBw";
//         $secret = env('ZOOM_API_SECRET', '');ye9ljHwU6fk3hcwPKuy1RmODRn78EacylSRS
        $secret = "ye9ljHwU6fk3hcwPKuy1RmODRn78EacylSRS";
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];

        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    private function retrieveZoomUrl()
    {
//         return env('ZOOM_API_URL', '');https://api.zoom.us/v2/
        return "https://api.zoom.us/v2/";
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);

            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toZoomTimeFormat : '.$e->getMessage());

            return '';
        }
    }

    public function create($data)
    {
        $path = 'users/me/meetings';
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([
                'topic'      => $data['title'],
                'type'       => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration'   => 40,
                'agenda'     => (! empty($data['desc'])) ? $data['desc'] : null,
                'timezone'     => 'Africa/Dar_es_Salaam',
                'settings'   => [
                    'host_video'        => false,
                    'participant_video' => false,
                    'waiting_room'      => true,
                ],
            ]),
        ];

        // $body = [
        //     'headers' => $this->headers,
        //     'body'    => json_encode([
        //         'topic'      => "yess",
        //         'type'       => self::MEETING_TYPE_SCHEDULE,
        //         'start_time' =>  $this->toZoomTimeFormat('05:57'),
        //         'duration'   => "20",
        //         'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
        //         'timezone'     => 'Africa/Dar_es_Salaam',
        //         'settings'   => [
        //             'host_video'        =>  false,
        //             'participant_video' =>  false,
        //             'waiting_room'      => true,
        //             "enforce_login" => true
        //         ],
        //     ]),
        // ];

        $response =  $this->client->post($url.$path, $body);
        return json_decode($response->getBody(), true);
        // return [
        //     'success' => $response->getStatusCode() === 201,
        //     'data'    => json_decode($response->getBody(), true),
        // ];
    }

    public function update($id, $data)
    {
        $path = 'meetings/'.$id;
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([
                'topic'      => $data['topic'],
                'type'       => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration'   => $data['duration'],
                'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone'     => 'Asia/Kolkata',
                'settings'   => [
                    'host_video'        => ($data['host_video'] == "1") ? true : false,
                    'participant_video' => ($data['participant_video'] == "1") ? true : false,
                    'waiting_room'      => true,
                ],
            ]),
        ];
        $response =  $this->client->patch($url.$path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data'    => json_decode($response->getBody(), true),
        ];
    }

    public function get($id)
    {
        $path = 'meetings/'.$id;
        $url = $this->retrieveZoomUrl();
        $this->jwt = $this->generateZoomToken();
        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([]),
        ];

        $response =  $this->client->get($url.$path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data'    => json_decode($response->getBody(), true),
        ];
    }

    /**
     * @param string $id
     * 
     * @return bool[]
     */
    public function delete($id)
    {
        $path = 'meetings/'.$id;
        $url = $this->retrieveZoomUrl();
        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([]),
        ];

        $response =  $this->client->delete($url.$path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
        ];
    }
}
