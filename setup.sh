rm ./logs/*

php create-instances.php > instances
php create-tags.php instances
php retrieve-ip.php instances > ips
php gen-start-script.php ips > start.sh
php gen-stop-script.php ips > stop.sh
php gen-tail-script.php ips > tail.sh
php gen-collect-log-script.php ips > collect-log.sh
