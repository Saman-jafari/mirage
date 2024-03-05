<?php

namespace App\Services\Assets;

use Illuminate\Support\Str;

/**
 * Class JsonManifest
 * @package App\Controller\Manifest
 */
class JsonManifest implements ManifestInterface
{
    /** @var array<string> */
    public array $manifest;

    /** @var string */
    public string $dist;

    /**
     * JsonManifest constructor
     *
     * @param string $manifestPath Local filesystem path to JSON-encoded manifest
     * @param string $distUri      Remote URI to assets root
     */
    public function __construct(string $manifestPath, string $distUri)
    {
        $this->manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
        $this->dist     = $distUri;
    }

    /** @inheritdoc */
    public function get(string $asset): string
    {
        if (!Str::startsWith($asset, '/')) {
            $asset = "/{$asset}";
        }

        return $this->manifest[$asset] ?? $asset;
    }

    /** @inheritdoc */
    public function getUri(string $asset): string
    {
        return "{$this->dist}{$this->get($asset)}";
    }
}