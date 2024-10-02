# my_web_project

The goal of this project is to show how we created a project that involves web application. 


Kreativstorm Project Management Program - This is a dummy web application only for our small projects

Team Members:

![image](https://github.com/user-attachments/assets/fbe548b2-81c0-43b9-98ca-1918dc60c5f4)


HERE ARE 
Here's a general step-by-step guide to setting up a website with HTML, CSS, Bootstrap, PHP, and MySQL using Virtual Machine (VM) and Vagrant:

Here's a general step-by-step guide to setting up a website with HTML, CSS, Bootstrap, PHP, and MySQL using Virtual Machine (VM) and Vagrant:

1. Install Vagrant and VirtualBox
You’ll first need to install Vagrant and VirtualBox, as Vagrant will be used to manage the virtual machine, and VirtualBox will run it.

Download and install VirtualBox.
Download and install Vagrant.

2. Create a Project Directory
Create a folder on your computer where you want to store your Vagrant setup and web project files.

![image](https://github.com/user-attachments/assets/7b69a4bb-804c-4004-a324-efa0a788658b)

3. Initialize Vagrant
Inside your project folder, initialize Vagrant with a base box. For a typical LAMP stack setup, you can use an Ubuntu box.

![image](https://github.com/user-attachments/assets/f56c5dd8-d265-4657-a54c-21ed78452a4c)

This command creates a Vagrantfile in your directory.

4. Edit the Vagrantfile
Open the Vagrantfile created and make the following changes to provision your VM with the necessary software:

----------------
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  
  # Networking
  config.vm.network "private_network", type: "dhcp"
  config.vm.network "forwarded_port", guest: 80, host: 8080

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
-----------------

This configuration does the following:

Installs Apache2, PHP, MySQL, and necessary PHP extensions.
Sets up port forwarding so you can access the website on localhost:8080.
Updates the package list and installs necessary packages.

5. Start the Vagrant VM
Start the virtual machine using:

![image](https://github.com/user-attachments/assets/dedbcab1-7c43-4d8c-8eba-6789bde21f9a)

This will download the base box (if not already downloaded) and provision the VM according to the Vagrantfile setup.


![image](https://github.com/user-attachments/assets/cec99d7b-02e8-4b96-8ce5-637880bfaccf)

Optional: If you are getting an error down below, ensure that you configure your VM with the static IP address that is different from any other VM that you already have.


![image](https://github.com/user-attachments/assets/aeed7704-7593-4fb2-9b1a-1621567050f7)



Here's how i changed the vagrantfile configuration:


![image](https://github.com/user-attachments/assets/5f600053-59e0-4663-8da6-e31558edae61)

and ensure that the IP chosen is not the same as your other VM


![image](https://github.com/user-attachments/assets/df414fd3-34cc-4ddb-bc9f-5da1d695d91b)



HAHA! Problem Solved!



6. Access the Virtual Machine
SSH into your VM to set up your web files:

![image](https://github.com/user-attachments/assets/64d4d8ee-e5d4-4ebc-82e4-ae5b63ac5911)

Once you’re inside the VM, you can navigate to the web server's document root:

![image](https://github.com/user-attachments/assets/1ce97330-a553-46ae-9648-bbe35c45a8d2)

7. Set Up Your Website Files
You can now create your HTML, CSS, Bootstrap, and PHP files here:

Create an index.php file:

![image](https://github.com/user-attachments/assets/ee270d10-ea78-42b4-a3da-30ab5c649e9b)

dummy website:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Welcome to Your Website</h1>
        <p class="lead text-center">This is a sample website using HTML, CSS, Bootstrap, PHP, and MySQL.</p>
    </div>
</body>
</html>

Save the file and exit the editor.

8. Test Your Website
   
On your host machine, open a browser and navigate to:

![image](https://github.com/user-attachments/assets/deaec65e-8ebd-4ae4-bd49-5b52df4735f5)

You should see your website running with Bootstrap styling.

9. Configure MySQL
   You can set up MySQL for database interactions:
   1. Access MySQL:
      
   ![image](https://github.com/user-attachments/assets/7c0dad67-6d90-4ae7-9b4c-1a4a70be8c78)
   
   2. Create a new database and user:
      CREATE DATABASE my_database;
      CREATE USER 'my_user'@'localhost' IDENTIFIED BY 'password';
      GRANT ALL PRIVILEGES ON my_database.* TO 'my_user'@'localhost';
      FLUSH PRIVILEGES;
      EXIT;

   3. Now you can connect to MySQL from your PHP files using:
      $conn = new mysqli('localhost', 'my_user', 'password', 'my_database');
      

11. Syncing Local Files with Vagrant
To make it easier to develop your website, you can sync your local project files with the VM. In your Vagrantfile, add the following line to sync the /var/www/html folder on the VM with a folder on your local machine:


![image](https://github.com/user-attachments/assets/f93c1ef4-4c29-46dd-894a-83ba349b4d29)



11. Optional: Install phpMyAdmin
You can optionally install phpMyAdmin to manage your MySQL databases more easily:

  1. SSH into the VM:
   

  ![image](https://github.com/user-attachments/assets/09b7c0c1-89ca-4e9e-bebe-b6a4eec0f88c)
  

  2. Install phpMyAdmin:
     
  ![image](https://github.com/user-attachments/assets/ef6216ee-9f81-440a-8369-d6738db3b1db)

  
  3. Follow the installation instructions, and then access phpMyAdmin at:
     http://localhost:8080/phpmyadmin


12. Stop the VM
    When you’re done working on your project, you can stop the virtual machine with:



Recap:

Vagrant and VirtualBox are used to set up the development environment.
I installed Apache, PHP, and MySQL on an Ubuntu VM.
I created a basic website using HTML, CSS, Bootstrap, PHP, and set up MySQL.
I can sync files between your host machine and VM for easier development.

----------------------------------------

Project Structure of the web files 

Organize the Project Structure in GitHub
You’ll want to ensure that your project has a clean structure for anyone who wants to clone and use it. Here's how you can organize your files and document the process:

Project Structure
The project structure might look like this:


![image](https://github.com/user-attachments/assets/b1e3d219-ff0a-441a-b810-258afe4d9447)

└── README.md



Create a README.md file in your project root:

 ![image](https://github.com/user-attachments/assets/00a7e648-7541-41c8-8f7c-073b5257cb73)


 Then open the file in a text editor and add the relevant information, such as:


# My Web Project

This project sets up a basic web environment using Vagrant, VirtualBox, Apache, PHP, and MySQL. 

## Project Structure

- `Vagrantfile`: Contains the Vagrant configuration for setting up the virtual machine.
- `website/`: Contains the website's files, including HTML, CSS, Bootstrap, and PHP files.
- `README.md`: Provides instructions on setting up and running the project.

## Prerequisites

- [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/) installed on your local machine.

## Setup Instructions

1. Clone this repository to your local machine:
   ```bash
   git clone https://github.com/your-username/my_web_project.git



 



  

  

   

   

   

