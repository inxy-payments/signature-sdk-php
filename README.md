# Documentation

## Introduction

Welcome to the documentation for **inxy-payments/signature-sdk-php**! This library is designed to help you sign messages using a private key. Whether you're a beginner or an experienced developer, this guide will help you get the most out of this library.

## Installation

To install the library, you can use Composer, the dependency manager for PHP. If you don't have Composer installed, you can download it from [getcomposer.org](https://getcomposer.org/).

Run the following command in your project directory:

```bash
composer require inxy-payments/signature-sdk-php
```

## Usage

Here's a quick example of how to use **inxy-payments/signature-sdk-php**:

```php
use InxyPayments\SignatureSDK\SignatureSDK;

// Create an instance of SignatureSDK
$signatureSDK = new SignatureSDK('your private key here');

// Sign a message
$result = $signatureSDK->signMessage('message');

// Output the result
echo $result->signature . "\n";
echo $result->time;
```
