<?php // Code within app\Helpers\Helper.php
namespace App\Helpers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class HttpRequest
{
    protected $host;
    protected $resetPasswordKey;
    protected $loginUrl;

    public function __construct()
    {
        $this->host = env('API_KAI_SUPERAPPS', 'https://api-beta.kai.id');
        $this->resetPasswordKey = env('RESET_PASSWORD_KEY', '');
        $this->loginUrl = $this->host . '/kaisuperapps/cms/auth/login';
    }

    public static function originPath()
    {
        $self = new static;
        return $self->host;
    }

    public static function loginEmployeeRequest($username, $password)
    {
        try {
            $self = new static;
            $url = $self->loginUrl;
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($url, [
                'username' => $username,
                'password' => $password,
            ]);

            $body = $response->json();
            if ($body['status'] == "Success") {
                return ['status' => 200, 'data' => $body['data']];
            }
            return ['status' => 500, 'message' => $body['message']];
        } catch (\Exception $e) {
            return ['status' => 500, 'message' => $e->getMessage()];
        }
    }

    public static function request($method, $url, $dto)
    {
        try {
            $token = session('userdata')['token'];
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->withToken($token);

            $self = new static;
            $url = $self->host . $url;
            if (Str::upper($method) == "POST") {
                $response = $response->post($url, $dto);
            } else if (Str::upper($method) == "GET") {
                if ($dto == null) {
                    $response = $response->get($url);
                } else {
                    $response = $response->withQueryParameters($dto)->get($url);
                }
            } else {
                throw new Exception("Method Not Allowed");
            }

            $body = $response->json();
            //            dd($body);
            if ($response->ok()) {
                return ['status' => 200, 'data' => $body['data'], 'totalData' => isset($body['totalData']) ? $body['totalData'] : null];
            } else if ($response->badRequest()) {
                $message = "Error API";

                if (!isset($body['message'])) {
                    if ($message = $body['errors'] != null) $message = $body['errors'];
                } else $message = $body['message'];

                return ['status' => 400, 'message' => $message];
            } else if ($response->serverError()) {
                return ['status' => 500, 'message' => $body['message']];
            } else {
                throw new Exception("Error API");
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'message' => $e->getMessage()];
        }
    }

    public static function requestResetPassword($method, $url, $dto)
    {
        try {
            $self = new static;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'key' => $self->resetPasswordKey,
            ]);

            $url = $self->host . $url;
            if (Str::upper($method) == "POST") {
                $response = $response->post($url, $dto);
            } else if (Str::upper($method) == "GET") {
                if ($dto == null) {
                    $response = $response->get($url);
                } else {
                    $response = $response->withQueryParameters($dto)->get($url);
                }
            } else {
                throw new Exception("Method Not Allowed");
            }

            $body = $response->json();
            if ($response->ok()) {
                return [
                    'status' => 200,
                    'data' => isset($body['data']) ? $body['data'] : null,
                    'message' => isset($body['message']) ? $body['message'] : null,
                    'signature' => isset($body['signature']) ? $body['signature'] : null,
                ];
            } else if ($response->badRequest()) {
                $message = "Error API";

                if (!isset($body['message'])) {
                    if ($message = $body['errors'] != null) $message = $body['errors'];
                } else $message = $body['message'];

                return ['status' => 400, 'message' => $message];
            } else if ($response->serverError()) {
                return ['status' => 500, 'message' => $body['message']];
            } else {
                throw new Exception("Error API");
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'message' => $e->getMessage()];
        }
    }

    public static function postMultipart($url, $dto)
    {
        try {
            $self = new static;
            $url = $self->host . $url;

            $token = session('userdata')['token'];
            $response = Http::asMultipart()
                ->withHeaders([
                    'Accept' => 'application/json',
                ])->withToken($token)->post($url, $dto);

            $body = $response->json();
            //            dd($dto);
            if ($response->ok()) {
                return ['status' => 200];
            } else if ($response->badRequest()) {
                $message = "Error API";

                if (!isset($body['message'])) {
                    if ($message = $body['errors'] != null) $message = $body['errors'];
                } else $message = $body['message'];

                return ['status' => 400, 'message' => $message];
            } else if ($response->serverError()) {
                return ['status' => 500, 'message' => $body['message']];
            } else {
                throw new Exception("Error API");
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'message' => $e->getMessage()];
        }
    }
}
