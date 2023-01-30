<?php

namespace App\Support\Elasticsearch;

use Monolog\Formatter\NormalizerFormatter;

/**
 * Inspired by https://flareapp.io/blog/30-how-we-use-elasticsearch-kibana-and-filebeat-to-handle-our-logs
 */
class ElasticsearchFilebeatFormatter extends NormalizerFormatter
{
    public function format(array $record): string
    {
        $message = [
            '@timestamp' => $this->normalize($record['datetime']),
            'log' => [
                'level' => $record['level_name'],
                'logger' => $record['channel'],
            ],
        ];

        if (isset($record['message'])) {
            $message['message'] = $record['message'];
        }
        if (isset($record['context'])) {
            $message['context'] = $record['context'];
        }

        return $this->toJson($message) . "\n";
    }
}
