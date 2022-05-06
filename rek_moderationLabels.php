<?php
// The user running this code should have the following permission at least
//  1. S3ReadOnlyAccess
//  2. RekognitionFullAccess
require "./libs/aws.phar";
use Aws\Rekognition\RekognitionClient;

$rekClient = new RekognitionClient([
    'profile' => 'default',
    'region' => 'ap-southeast-1',
    'version' => 'latest'
]);

$result = $rekClient->detectModerationLabels([
    'Image' => [ // REQUIRED
        'S3Object' => [
            'Bucket' => 'liyx-media',
            'Name' => 'imgs/detect-4.jpeg', # without first /
            // 'Version' => '<string>', ignore for bucket witout versioning
        ],
    ],
    'MinConfidence' => 80,  // control confidence, 50 - 100

]);

foreach ($result['ModerationLabels'] as $label) {
    echo $label['Name'] . ": " . $label['Confidence'] . "\n";
}