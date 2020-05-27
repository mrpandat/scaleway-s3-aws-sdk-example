<?php
/**
 * Copyright 2010-2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *
 * ABOUT THIS PHP SAMPLE: This sample is part of the SDK for PHP Developer Guide topic at
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/s3-examples-creating-buckets.html
 *
 */

require 'vendor/autoload.php';

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

//Create a S3Client 
$s3 = new S3Client([
    'region' => 'fr-par',
    'version' => '2006-03-01',
    'endpoint' => 'http://s3.fr-par.scw.cloud',
    'credentials' => [
        'key' => getenv('AWS_ACCESS_KEY_ID'),
        'secret' => getenv('AWS_SECRET_ACCESS_KEY')
    ]
]);

$timeZone = "UTC";
$bucketName = "scalewaytest" . time();
$region = "fr-par";

date_default_timezone_set($timeZone);

function listBucketFiles($s3, $bucket) {
    print("Files in Bucket ". $bucket . "\n");

    try {
        $results = $s3->getPaginator('ListObjects', [
            'Bucket' => $bucket
        ]);

        foreach ($results as $result) {
            foreach ($result['Contents'] as $object) {
                echo $object['Key'] . PHP_EOL;
                echo $s3->getObjectUrl($bucket, $object['Key']) . PHP_EOL;

            }
        }
    } catch (S3Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}


# Lists all of your available buckets in this AWS Region.
function listMyBuckets($s3) {
    print("\nMy buckets now are:\n");

    $promise = $s3->listBucketsAsync();

    $result = $promise->wait();

    foreach ($result['Buckets'] as $bucket) {
        echo $bucket['Name'] . PHP_EOL;
    }
}

# Lists all of your available buckets files in this AWS Region.
function listMyFiles($s3) {
    $promise = $s3->listBucketsAsync();

    $result = $promise->wait();

    foreach ($result['Buckets'] as $bucket) {
        listBucketFiles($s3, $bucket['Name']);
    }
}

listMyFiles($s3);

# Create a new bucket.
print("\n\nCreating a new bucket named '$bucketName'...\n");

try {
    $promise = $s3->createBucketAsync([
        'Bucket' => $bucketName,
        'CreateBucketConfiguration' => [
            'LocationConstraint' => $region
        ]
    ]);

    $promise->wait();

} catch (Exception $e) {
    if ($e->getCode() === 'BucketAlreadyExists') {
        exit("\nCannot create the bucket. " .
            "A bucket with the name '$bucketName' already exists. Exiting.");
    }
}

listMyBuckets($s3);


# Delete the bucket you just created.
print("\n\nDeleting the bucket named '$bucketName'...\n");

$promise = $s3->deleteBucketAsync([
    'Bucket' => $bucketName
]);

$promise->wait();

listMyBuckets($s3);