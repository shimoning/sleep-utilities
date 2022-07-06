# Sleep utilities
sleep / usleep / time_nanosleep を拡張し、直感的にわかりやすくしたもの。

## Support
PHP7.0 以上。

将来的には 7.3 以上にする予定 (hrtime を使いたい)。

## Install
利用するプロジェクトの `composer.json` に以下を追加する。
```composer.json
"repositories": {
    "sleep": {
        "type": "vcs",
        "url": "https://github.com/shimoning/sleep-utilities.git"
    }
},

"require": {
    "shimoning/sleep-utilities": "^0.1.0"
},
```

その後以下でインストールする。

```bash
composer update shimoning/sleep-utilities
```

## Usage
### Sleep::seconds
**秒** を指定して sleep する。

```php
Sleep::seconds(5.5);
```

### Sleep::milliSeconds
**ミリ秒** を指定して sleep する。

```php
Sleep::milliSeconds(20.30);
```

### Sleep::microSeconds
**マイクロ秒** を指定して sleep する。

```php
Sleep::microSeconds(300.500);
```

### Sleep::nanoSeconds
**ナノ秒** を指定して sleep する。

```php
Sleep::nanoSeconds(120);
```

### Sleep::usleep
**マイクロ秒** を指定して sleep する。
PHP 標準の usleep の精度を若干向上し、 int だけでなく float も扱えるようにした。
seconds, milliSeconds, microSeconds の基盤関数。

```php
Sleep::usleep(300);
```

-----

### RandomSleep::seconds
**秒単位でランダムに** sleep する。

```php
RandomSleep::seconds(1, 5);
```

### RandomSleep::milliSeconds
**ミリ秒単位でランダムに** sleep する。

```php
RandomSleep::milliSeconds(100, 300);
```

### RandomSleep::microSeconds
**マイクロ秒単位でランダムに** sleep する。

```php
RandomSleep::microSeconds(1000, 10000);
```

### RandomSleep::nanoSeconds
**ナノ秒単位でランダムに** sleep する。

```php
RandomSleep::nanoSeconds(3000, 500000);
```

## CLI 実行
```bash
php psysh.php
```