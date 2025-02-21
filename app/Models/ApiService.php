<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ApiService extends Model
{
    use HasFactory;

    private static $baseUrl = 'https://candidate-testing.api.royal-apps.io/api/v2';

    /**
     * Authenticates the user using provided credentials and stores tokens in the session.
     *
     * @param array $credentials User login credentials.
     * @return bool Returns true if login is successful, false otherwise.
     */
    public static function login($credentials) {
        $response = Http::post(self::$baseUrl . '/token', $credentials);
        if ($response->successful()) {
            $data = $response->json();
            Session::put('token', $data['token_key']);
            Session::put('refresh_token', $data['refresh_token_key']);
            Session::put('user', $data['user']);
            Session::put('expires_at', Carbon::parse($data['expires_at']));
            return true;
        }
        return false;
    }

    /**
     * Fetches a list of authors with optional filtering parameters.
     *
     * @param array $params Optional query parameters for filtering authors.
     * @return array Returns an array of authors.
     */
    public static function getAuthors($params = []) {
        $response = Http::withToken(Session::get('token'))->get(self::$baseUrl . "/authors",$params)->json();
        return $response;
    }

    /**
     * Fetches details of a specific author by their ID.
     *
     * @param int $id The ID of the author.
     * @return array Returns an array containing the author's details.
     */
    public static function getAuthor($id) {
        $response = Http::withToken(Session::get('token'))->get(self::$baseUrl . "/authors/{$id}")->json();
        return $response;
    }

    /**
     * Deletes an author by their ID.
     *
     * @param int $id The ID of the author to delete.
     * @return \Illuminate\Http\Client\Response Returns the HTTP response object.
     */
    public static function deleteAuthor($id) {
        return Http::withToken(Session::get('token'))->delete(self::$baseUrl . "/authors/{$id}");
    }

    /**
     * Deletes a book by its ID.
     *
     * @param int $id The ID of the book to delete.
     * @return \Illuminate\Http\Client\Response Returns the HTTP response object.
     */
    public static function deleteBook($id) {
        return Http::withToken(Session::get('token'))->delete(self::$baseUrl . "/books/{$id}");
    }
    
    /**
     * Adds a new book using the provided data.
     *
     * @param array $data The data for the new book.
     * @return \Illuminate\Http\Client\Response Returns the HTTP response object.
     */
    public static function addBook($data = []) {
        $response = Http::withToken(Session::get('token'))->post(self::$baseUrl . "/books", $data);
        return $response;
    }

   

}
