# Web Media SolutionZ

This project uses Wordpress version 4.9.8 to start with but can be upgraded to whatever the latest version of Wordpress is once the Docker container is up and running.

## Requirements
if you want to run the application with Docker, a rescent version of Docker for MAC, Docker for Windows or Docker ToolBox...if not, then you'll need something like XAMPP

## Development server

You can start a dev server by running `docker-compose up` or `npm start` if you have Node and npm installed on your machine. Navigate to `//localhost/`. you can stop the dev server by running `docker-compose stop` or `npm run stop`. Clear unused containers and volumes by running `docker system prune` or `npm run prune`.

## Build and run Development server

Run `docker build -t max2wms/wms .` ( or `npm run build` if you have Node and npm installed ) to build the project. Run `npm run build:up` to build the project and start a dev server.
