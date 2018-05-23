# Database Exporter

This package make you a backup or dump from your database.

## Installation
  ```
  composer require arapel/database-exporter
  ```
## Step two publish config

```
php artisan vendor:publish --tag=exporter
```

## Usage
Open your browser and go to http://localhost:8000/database click on generate Backup ...

## Manual Usage
You can call DatabaseExporter::export() in your controller. After call this method a Sql file with backup name is in your public folder you just need to download it.
Copyright 2018 Arapel Co.
