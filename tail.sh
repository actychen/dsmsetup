ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.4.25 "tail -f 172.31.4.25.1234.log" &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.2.249 "tail -f 172.31.2.249.1234.log" &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.5.152 "tail -f 172.31.5.152.1234.log" &
ssh -i ~/.ssh/ec2ymok.pem -t -o StrictHostKeyChecking=no centos@172.31.14.176 "tail -f 172.31.14.176.1234.log" &
