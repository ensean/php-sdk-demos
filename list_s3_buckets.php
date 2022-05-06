<?php
    require "./libs/aws.phar";
    use Aws\S3\S3Client;
    $s3Client = new S3Client([
        'profile' => 'default',
        'region' => 'ap-northeast-1',
        'version' => 'latest'
    ]);
    
    //Listing all S3 Bucket
    $buckets = $s3Client->listBuckets();
    foreach ($buckets['Buckets'] as $bucket) {
        echo $bucket['Name'] . "\n";
    }
?>