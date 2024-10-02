Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  
  # Networking: Set static IP instead of DHCP
  config.vm.network "private_network", ip: "20.20.20.10"
  


  # increase memory and cpu
  config.vm.provider "virtualbox" do |vb|
  vb.memory = "1024"  # Increase memory to 1GB
  vb.cpus = 2         # Increase to 2 CPUs
  end

  # Provisioning
  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
    apt-get install -y php libapache2-mod-php php-mysql
    apt-get install -y mysql-server
    apt-get install -y git unzip
    apt-get install -y php-cli
    apt-get install -y curl
  SHELL
end

