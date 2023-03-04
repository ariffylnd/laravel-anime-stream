<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JikanApi
{
  private string $baseUrl = 'https://api.jikan.moe/v4';

  public function searchAnime(string $title, ?int $limit = null): ?array
  {
    $query = [
      'q' => $title,
      'limit' => $limit ?: 10,
    ];

    $response = Http::get($this->baseUrl . '/anime', $query);

    if ($response->ok()) {
      return $response->json('data');
    }

    return null;
  }

  public function getAnime(int $id): ?array
  {
    $response = Http::get($this->baseUrl . '/anime/' . $id);

    if ($response->ok()) {
      return $response->json();
    }

    return null;
  }
}
