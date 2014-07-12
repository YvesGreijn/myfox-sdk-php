<?php

namespace LaurentSarrazin\Myfox\Tests;

use Widop\HttpAdapter\HttpAdapterInterface;

class HttpClientStub implements HttpAdapterInterface
{
    public function getName()
    {
        return 'stub';
    }

    public function getContent($url, array $headers = array())
    {
        return $this->request($url);
    }

    public function postContent($url, array $headers = array(), $content = '')
    {
        return $this->request($url);
    }

    public function request($url)
    {
        $file = sprintf('%s/%s', realpath(__DIR__ . '/../../../fixtures'), sha1($url));

        echo "\n$file";

        if (is_file($file) && is_readable($file)) {
            $response = file_get_contents($file);

            if (!empty($response)) {
                return $response;
            }
        }

        throw new \Exception("The fixture file does not exist for this url.");
    }

} 