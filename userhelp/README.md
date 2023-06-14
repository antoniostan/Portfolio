# User-Help

## Introduction
User-Help is a project designed to assist users in finding help for various situations. The program allows users to input their problem, and it returns relevant links to pages that can provide assistance.

## Installation
To get started with User-Help, follow the steps below:

### Clone the Projects
1. Open the terminal and navigate to your desired directory.
2. Run the following commands to clone the projects from GitLab:
    - git clone https://git.mam.dev/anstan/userhelp.git
    - git clone https://git.mam.dev/anstan/elasticcluster.git
This will create two directories named 'userhelp' and 'elasticcluster' containing the source code.

### Usage
The Elastic Cluster script (elasticcluster) is responsible for uploading files to the Elastic Server, which will be used to assist users.
The User-Help project (userhelp) is the main component that accesses the Elastic Server and searches for specific files based on user input.

### Set up the Elastic Cluster
In the 'elasticcluster' directory, read the README file for instructions on using the scripts and starting the Elastic Server.

### Run User-Help
1. Start your application by running it from your IDE of choice or use the command `mvn spring-boot:run`.
2. Open Postman or any API testing tool.
3. Send a GET request to 'localhost:8080/search' and provide a search query as a parameter to see if the program returns any paths to pages related to your query.

### Git
In order to keep the project up to date, make sure to run the commands from under the section 'Clone the Projects', step 2.



