# Sleep utilities
sleep / usleep / time_nanosleep を拡張し、直感的にわかりやすくしたもの。

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
Sleep::seconds(5);
```

### Sleep::milliSeconds
**ミリ秒** を指定して sleep する。

```php
Sleep::milliSeconds(20);
```

### Sleep::microSeconds
**マイクロ秒** を指定して sleep する。

```php
Sleep::microSeconds(300);
```

### Sleep::nanoSeconds
**ナノ数** を指定して sleep する。

```php
Sleep::nanoSeconds(120);
```

### Sleep::decimalSeconds
**小数を含む秒** を指定して sleep する。
整数でも利用可能。

```php
Sleep::decimalSeconds(3.25);
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