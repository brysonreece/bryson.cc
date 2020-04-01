---
view: layouts.post
title: Using S3 with Laravel in 2020
path: /posts/using-s3-with-laravel-in-2020
---

Recently I needed the ability to expand the service of a standard Laravel app to include functions like allowing users to upload documents and images. While a common strategy is to store files in your Laravel `storage/` directory, today I'll show you how to swap out your disk storage for <a href="https://aws.amazon.com/s3/">Amazon S3</a>, offering the ability to scale your storage infrastructure dynamically.

---

## So what's Amazon S3?

Amazon S3 is an easy-to-use data storage service provided by AWS. While the AWS console can traditionally be intimidating, the S3 team has gone a long way to make the S3 dashboard easier to use over the last few months. Unfortunately, the drawback to these updates results in a different user interface than most Laravel S3 tutorials showcase today.

---

## Getting Started

So you're intrigued? Awesome, let's get started.

<br>

To begin, you need to have already covered a few bases:

-   A [new](https://laravel.com/docs/getting-started) or existing Laravel instance
-   Access to an [AWS account](https://aws.amazon.com/)
    -   Optional: [Create an IAM user for better security](https://docs.aws.amazon.com/IAM/latest/UserGuide/getting-started_create-delegated-user.html)
-   The [Composer](https://getcomposer.org/) package manager installed

## Prerequisite: Install the Flysystem S3 Driver

Unfortunately, while close, Laravel doesn't completely work with Amazon S3 out-of-the-box. To get started using S3 with Laravel, run the following command to install the S3 driver:

<br>

```bash
composer require league/flysystem-aws-s3-v3
```

<br>

Alternatively, you can also add `league/flysystem-aws-s3-v3` to your `composer.json` file and update your packages using `composer update`.

## Getting an AWS access token

To allow Laravel to act on your behalf, or optionally an IAM user, you'll first need to generate an access token that we'll store in your project's `.env` file.

<br>

To generate an access key for your root account, visit the Security Credentials page in the AWS Management Console. For IAM users, ([which can offer better security](https://docs.aws.amazon.com/IAM/latest/UserGuide/getting-started_create-delegated-user.html)), you can get credentials from the IAM console by visiting your IAM user's overview page and visiting the "Security Credentials" tab.

---

### Security Credentials for a Root user account
<img src="/img/posts/using-s3-with-laravel-in-2020/aws-root-credentials.png">

<img src="/img/posts/using-s3-with-laravel-in-2020/aws-root-credentials-2.png" class="mt-8">

### Security Credentials for an IAM user account
<img src="/img/posts/using-s3-with-laravel-in-2020/aws-iam-credentials.png">

---

## Configuring Laravel to use AWS

After generating a new Access Key, you'll insert the key's ID and Secret into your `.env` file:

<br>

```none
...

AWS_ACCESS_KEY_ID="<YOUR KEY ID>"
AWS_SECRET_ACCESS_KEY="<YOUR KEY SECRET>"
```

<br>

Awesome, you've now configured your Laravel instance with the proper credentials to communicate with AWS! Now let's get to work connecting to S3.

---

## Creating an Amazon S3 "Bucket"

<div class="bg-yellow-50 border-4 border-dotted border-yellow-200 px-4 py-3 rounded-md text-sm">
    <span class="text-base font-bold block">But wait, what's a "bucket"?</span>
    <p>A "bucket" in Amazon S3 is where you'll store your files. Think of it as your file disk in the cloud.</p>
</div>

<br>

To get started with Amazon S3, log back into your AWS console and search for `S3` under **Services**, or select it from the **Services List** below the search bar.

<br>

Once on the S3 Dashboard, select **Create Bucket** at the top right of the page.

<br>

<img src="/img/posts/using-s3-with-laravel-in-2020/aws-s3.png">

<br>

On the next page, fill out your **Bucket Details**

<br>

<img src="/img/posts/using-s3-with-laravel-in-2020/s3-bucket-name.png">

<br>

If you're not experienced with S3 make sure to leave the privacy settings of your Bucket to **Block _all_ public access** by default. (Don't worry, you can selectively allow files to be public using the `->setVisibility()` method in Laravel).

<br>

<img src="/img/posts/using-s3-with-laravel-in-2020/s3-bucket-privacy.png">

## Configuring Laravel to use S3

After creating your S3 bucket, we'll head back over your `.env` file and insert the following values:

<br>

```none
...

AWS_DEFAULT_REGION="<YOUR BUCKET REGION>"
AWS_BUCKET="<YOUR BUCKET ID>"
```

<br>

<div class="bg-orange-50 border-4 border-dotted border-orange-200 px-4 py-3 rounded-md text-sm">
    <span class="text-base font-bold block">If you're utilizing IAM Permission Management</span>
    <p>You can configure your S3 Policies to only allow the following permissions:</p>
    <ul>
        <li>s3:GetObject</li>
        <li>s3:PutObject</li>
        <li>s3:ListBucket</li>
        <li>s3:DeleteObject</li>
        <li>s3:PutObjectAcl</li>
        <li>s3:GetObjectAcl</li>
    </ul>
    <br>
    <p>
        You can also find an example <strong>IAM JSON Policy</strong> <a href="https://gist.github.com/brysonreece/bcb81a577948f37458c7862a78fe7fd5">here</a>.
    </p>
</div>

<br>

Right on! We're almost there. Now that Laravel is configured to use S3, we can learn how to interact with `objects`, or files, from your application.

---

# Interacting with S3

Here are a few examples of how to interact with the S3 Storage driver, allowing you to perform many common functions on files:

### Storing Files
```php
use Illuminate\Support\Facades\Storage;

$contents = $request->get('avatar');

return Storage::put('file.jpg', $contents);
```

<br>

### Retrieving Files
```php
$contents = Storage::get('file.jpg');
```

<br>

### Downloading Files
```php
return Storage::download('file.jpg');
```

<br>

### Setting File Visibility
```php
$visibility = Storage::getVisibility('file.jpg');

Storage::setVisibility('file.jpg', 'public');
```

<br>

Credit for most of these examples belongs to the [Laravel docs](https://laravel.com/docs/filesystem) where you can check out just how much more you can do with S3!

<br>

<strong>Well, that should be it! If you have any questions feel free to reach out, I'd love to help.</strong> <span class="wave">👋</span>

<br>
<br>
<br>

<small class="italic text-gray-400">2020 &copy; Bryson Reece