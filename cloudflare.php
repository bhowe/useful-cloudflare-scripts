<?php

class CloudflareAPI {
    private $apiToken;
    private $baseUrl;

    public function __construct($apiToken) {
        $this->apiToken = $apiToken;
        $this->baseUrl = 'https://api.cloudflare.com/client/v4';
    }

    private function makeRequest($endpoint) {
        $ch = curl_init($this->baseUrl . $endpoint);
        
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->apiToken,
                'Content-Type: application/json'
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception('API request failed with status code: ' . $httpCode);
        }

        return json_decode($response, true);
    }

    public function getZones() {
        $response = $this->makeRequest('/zones');
        return $response['result'] ?? [];
    }

    public function getDnsRecords($zoneId) {
        $response = $this->makeRequest("/zones/{$zoneId}/dns_records");
        return $response['result'] ?? [];
    }
}

// Usage
try {
    // Replace with your API token from Cloudflare dashboard
    $apiToken = 'your_api_token_here';
    $cf = new CloudflareAPI($apiToken);

    // Get all zones
    $zones = $cf->getZones();

    echo "\nZones and their A records:\n";
    echo str_repeat('-', 50) . "\n";

    foreach ($zones as $zone) {
        echo "\nDomain: " . $zone['name'] . "\n";

        // Get DNS records for each zone
        $dnsRecords = $cf->getDnsRecords($zone['id']);

        // Filter A records
        $aRecords = array_filter($dnsRecords, function($record) {
            return $record['type'] === 'A';
        });

        if (!empty($aRecords)) {
            foreach ($aRecords as $record) {
                echo "  └─ A Record: {$record['name']} → {$record['content']} (IP)\n";
            }
        } else {
            echo "  └─ No A records found\n";
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>