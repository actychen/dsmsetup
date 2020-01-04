ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.4.25 'java -jar tiled-dsm/target/dsm-jar-with-dependencies.jar -port 1234 -a_e 172.31.2.249:1234 -a_s 172.31.5.152:1234 -log_filename 172.31.4.25.1234 -log_interval 5 > 172.31.4.25.1234.log' &
ssh -i ~/.ssh/ec2ymok.pem -o StrictHostKeyChecking=no centos@172.31.4.25 'dstat -a -t --output ~/dstat.172.31.4.25.1234.csv 1 > /dev/null &' &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.2.249 'java -jar tiled-dsm/target/dsm-jar-with-dependencies.jar -port 1234 -a_s 172.31.14.176:1234 -a_w 172.31.4.25:1234 -log_filename 172.31.2.249.1234 -log_interval 5 > 172.31.2.249.1234.log' &
ssh -i ~/.ssh/ec2ymok.pem -o StrictHostKeyChecking=no centos@172.31.2.249 'dstat -a -t --output ~/dstat.172.31.2.249.1234.csv 1 > /dev/null &' &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.5.152 'java -jar tiled-dsm/target/dsm-jar-with-dependencies.jar -port 1234 -a_n 172.31.4.25:1234 -a_e 172.31.14.176:1234 -log_filename 172.31.5.152.1234 -log_interval 5 > 172.31.5.152.1234.log' &
ssh -i ~/.ssh/ec2ymok.pem -o StrictHostKeyChecking=no centos@172.31.5.152 'dstat -a -t --output ~/dstat.172.31.5.152.1234.csv 1 > /dev/null &' &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.14.176 'java -jar tiled-dsm/target/dsm-jar-with-dependencies.jar -port 1234 -a_n 172.31.2.249:1234 -a_w 172.31.5.152:1234 -log_filename 172.31.14.176.1234 -log_interval 5 > 172.31.14.176.1234.log' &
ssh -i ~/.ssh/ec2ymok.pem -o StrictHostKeyChecking=no centos@172.31.14.176 'dstat -a -t --output ~/dstat.172.31.14.176.1234.csv 1 > /dev/null &' &
