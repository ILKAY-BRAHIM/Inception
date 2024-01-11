# Project Inception

Welcome to Project Inception, a comprehensive showcase of Docker mastery! This project demonstrates the power of containerization by encapsulating various services, creating an interconnected web ecosystem. From Nginx as the gateway to FTP for file sharing, each service is implemented from scratch in its own Docker container and seamlessly connected through Docker-Compose.

## **Table of Contents**

- Technical Stack
- Services Containerized
- Networking & Volumes
- Learning Outcomes
- Implementation Highlights
- Getting Started
- Contributing

## **Technical Stack**

### **Docker:**

**Containerization:**
Docker is a platform that enables developers to automate the deployment of applications inside lightweight, portable containers. Containers are isolated environments that encapsulate an application along with its dependencies, ensuring consistency and reproducibility across different environments.

Key concepts in Docker include:

1. **Images:** Docker images are lightweight, standalone, and executable packages that include everything needed to run a piece of software, including the code, runtime, libraries, and system tools.
2. **Containers:** Containers are instances of Docker images. They run in isolated environments on a host machine, ensuring that applications have consistent behavior across different environments.
3. **Dockerfile:** A Dockerfile is a script that contains instructions for building a Docker image. It specifies the base image, sets up the environment, and defines the steps to install dependencies and configure the application.
4. **Docker Hub:** Docker Hub is a cloud-based registry where Docker images can be stored and shared. It provides a convenient way to distribute and discover container images.

**Orchestration:**
While Docker is excellent for running single containers, orchestrating multiple containers in a distributed application requires additional tools. Docker provides Docker Swarm for simple orchestration, but many prefer Kubernetes for more complex scenarios.

```docker
FROM debian:bookworm

RUN apt update && apt install nginx -y && apt install openssl -y

RUN apt-get  install openssl && openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt \
-subj "/C=MA/ST=Tanger-Tetouan-Al Hoceima/L=Martil/O=1337/OU=1337MED/CN=inception"

COPY ./conf/nginx.conf /etc/nginx/conf.d

RUN unlink /etc/nginx/sites-enabled/default

CMD [ "nginx","-g","daemon off;"]
```

### **Docker Compose:**

**Container Orchestration:**
Docker Compose is a tool for defining and running multi-container Docker applications. It allows you to specify a multi-container application setup in a single file (usually **`docker-compose.yml`**) and then use a single command to start the entire application stack.

Key features of Docker Compose:

1. **Declarative Configuration:** Docker Compose uses a YAML file to define services, networks, and volumes. This declarative approach makes it easy to define and understand the application's structure.
2. **Service Definition:** You can define each service (container) in your application stack, including the image to use, environment variables, ports to expose, and more.
3. **Single Command Deployment:** With a simple **`docker-compose up`** command, Docker Compose reads the configuration file and starts the defined services, creating a fully functional application stack.
4. **Environment Variables and Networking:** Docker Compose allows you to specify environment variables for services and define networks to enable communication between containers.

By combining Docker for containerization and Docker Compose for orchestration, developers can easily manage and deploy complex applications with multiple interconnected services.

```yaml
version: "3.8"
services: 

  mariadb:
    build: ./requirements/mariadb
    container_name: mariadb
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      MYSQL_DATABASE: ${MYSQL_DATABASE}
      MYSQL_USER: ${MYSQL_USER}
      MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - data_mariadb:/var/lib/mysql
    networks:
      - my_net
  
  wordpress:
    build: ./requirements/wordpress
    container_name: wordpress
    depends_on:
      - mariadb
    networks:
      - my_net
    volumes:
      - data_word:/var/www/html
    environment:
      WORDPRESS_DB_HOST: ${WORDPRESS_DB_HOST}
      WORDPRESS_DB_USER: ${WORDPRESS_DB_USER}
      WORDPRESS_DB_PASSWORD: ${WORDPRESS_DB_PASSWORD}
      WORDPRESS_DB_NAME: ${WORDPRESS_DB_NAME}
      WP_URL: ${WP_URL}
      WP_TITLE: ${WP_TITLE}
      WP_ADMIN: ${WP_ADMIN}
      WP_ADMIN_PASSWD: ${WP_ADMIN_PASSWD}
      WP_ADMIN_EMAIL: ${WP_ADMIN_EMAIL}
  nginx:
    build: ./requirements/nginx
    container_name: nginx
    depends_on: 
      - wordpress
      - redis
      - adminer
      - portfolio
      - cadvisor
    ports:
      - 443:443
    volumes:
      - data_word:/var/www/html
    networks:
      - my_net
  redis:
    build: ./requirements/bonus/redis
    container_name: redis
    volumes:
      - data_word:/var/www/html
    networks:
      - my_net
    restart: always
  adminer:
    depends_on:
      - wordpress
    build: ./requirements/bonus/adminer
    container_name: adminer
    volumes:
      - data_word:/var/www/html
    networks:
      - my_net
    restart: always
  ftp:
    build: ./requirements/bonus/ftp
    container_name: ftp
    environment:
      FTP_USER: ${FTP_USER}
      FTP_PASSWORD: ${FTP_PASSWORD}
    networks:
      - my_net
    restart: always
    volumes:
      - data_word:/var/www/html
  portfolio:
    build: ./requirements/bonus/portfolio
    container_name: portfolio
    networks:
      - my_net
    volumes:
      - data_word:/var/www/html
    restart: always
  cadvisor:
    container_name: cadvisor
    build: ./requirements/bonus/cadvisor
    image: cadvisor
    networks:
      - my_net
    volumes:
      - /:/rootfs:ro
      - /var/run:/var/run:ro 
      - /sys:/sys:ro
      - /var/lib/docker/:/var/lib/docker:ro
    restart: always

networks:
  my_net:
    driver: bridge

volumes:
  data_word:
    driver_opts:
      o: bind 
      type : none
      device: /home/bchifour/data/wordpress
  data_mariadb:
    driver_opts:
      o: bind 
      type : none
      device: /home/bchifour/data/mariadb
```

### **Container Architecture:** Efficient encapsulation of services.

Container architecture is centered around the efficient encapsulation of services within lightweight, portable containers. Containers provide a consistent and reproducible environment, enabling applications to run consistently across different environments. Here are key aspects of container architecture:

### **1. Isolation:**

- **Process Isolation:** Containers run as isolated processes on the host machine. Each container has its own file system, processes, and network, ensuring that applications don't interfere with each other.
- **Resource Isolation:** Containers can be allocated specific resources such as CPU and memory, preventing resource conflicts and ensuring predictable performance.

### **2. Images:**

- **Immutable and Portable:** Container images are immutable and can be easily moved between different environments. Once an image is built, it remains unchanged throughout its lifecycle.
- **Layered File System:** Images are built using a layered file system. Each layer represents a set of changes to the file system, allowing for efficient sharing of common layers among different images.

### **3. Dockerfile:**

- **Declarative Configuration:** Dockerfile is a script that defines the steps to build a container image. It specifies the base image, sets up the environment, installs dependencies, and configures the application.
- **Reproducibility:** Dockerfiles provide a declarative and reproducible way to describe an application's dependencies and configuration, ensuring consistency across different stages of development and deployment.

### **4. Orchestration:**

- **Container Orchestration Platforms:** Tools like Docker Swarm, Kubernetes, and others help manage and deploy multiple containers as part of a distributed application. They provide features for scaling, load balancing, service discovery, and automated updates.
- **Service Discovery:** Containers need to discover and communicate with each other. Orchestration tools often provide service discovery mechanisms, allowing containers to find and communicate with other services dynamically.

### **5. Networking:**

- **Container Networking:** Containers can communicate with each other over isolated networks. Networking configurations can be specified in the Dockerfile or using tools like Docker Compose.
- **Exposed Ports:** Containers can expose specific ports to the host machine or other containers, enabling communication with the outside world.

### **6. Environment Variables:**

- **Configuration via Environment Variables:** Containers often use environment variables to configure applications dynamically. This makes it easier to customize the behavior of containers without modifying their code.

### **7. Volumes:**

- **Data Persistence:** Containers are designed to be ephemeral, but persistent data needs to be handled separately. Volumes allow containers to share data with the host machine or other containers.

### **8. Security:**

- **Isolation for Security:** Containers provide a level of isolation that enhances security. Each container has its own user space and kernel namespace, limiting the impact of security vulnerabilities.

### **9. Monitoring and Logging:**

- **Container Monitoring:** Tools and platforms for monitoring containerized applications provide insights into resource usage, performance, and potential issues.
- **Centralized Logging:** Container logs can be collected centrally, making it easier to troubleshoot and analyze application behavior.

### **10. Registry:**

- **Image Registry:** Container images are stored in registries like Docker Hub or private registries. Registries facilitate the distribution and versioning of container images.

Container architecture has become fundamental in modern software development and deployment. It promotes agility, scalability, and consistency, allowing organizations to efficiently manage and scale their applications in various environments.

### **Networking & Volumes:** Seamless communication and persistent data management.

In containerized environments, networking and volumes play crucial roles in facilitating seamless communication between containers and managing persistent data. Let's explore each aspect:

### **Networking:**

1. **Container Isolation:**
    - Containers are isolated instances, but they often need to communicate with each other. Docker provides various networking options:
        - **Default Bridge Network:** Containers on the same host can communicate over a default bridge network. However, external access might be limited.
        - **Custom Bridge Networks:** Users can create custom bridge networks to enable communication between containers on the same or different hosts.
2. **Host Networking:**
    - Containers can use the host's network stack, sharing the network namespace with the host. This allows containers to access network services as if they were running on the host itself.
3. **Port Mapping:**
    - Containers expose specific ports, and these can be mapped to ports on the host machine. This allows external services to communicate with containers through specified ports.
4. **Service Discovery:**
    - Container orchestration tools often provide built-in service discovery mechanisms, allowing containers to discover and communicate with each other using service names or DNS.
5. **Overlay Networks:**
    - Advanced container orchestration platforms, like Kubernetes and Docker Swarm, support overlay networks for seamless communication between containers across multiple hosts.

### **Volumes:**

1. **Data Persistence:**
    - Containers are typically stateless, and any data created within a container is ephemeral. Volumes provide a way to persist data beyond the lifecycle of a container.
2. **Volume Types:**
    - Docker supports various volume types:
        - **Named Volumes:** Named volumes are managed by Docker and are persistent. They are often used to store data that needs to persist across container restarts or removals.
        - **Host-mounted Volumes:** Containers can also use directories on the host machine as volumes, allowing data to be shared between the host and containers.
3. **Data Sharing Between Containers:**
    - Volumes can be shared between multiple containers. This is useful for scenarios where multiple containers need access to the same set of data.
4. **Volume Drivers:**
    - Docker supports volume drivers that extend volume functionality. For example, volume drivers can provide access to external storage systems like AWS EBS or network-based storage solutions.
5. **Data Backup and Restore:**
    - Volumes simplify data backup and restoration processes. Since data is stored outside the container, it can be backed up independently of the container.
6. **Consistent Data Across Containers:**
    - Volumes ensure that data is consistent across containers. Changes made by one container are reflected in others that share the same volume.
7. **Database and Stateful Applications:**
    - Volumes are crucial for databases and stateful applications where persistent storage is essential. They allow data to survive container restarts or upgrades.
8. **Data Versioning:**
    - Some volume solutions support versioning, enabling users to roll back to previous states of the data.

## **Services Containerized**

1. **Nginx:** Gateway for routing and SSL termination.
2. **WordPress:** Dynamic content delivery.
3. **Rides:** Custom rides service.
4. **Portfolio:** Web application showcasing containerization.
5. **MariaDB:** Database service for data management.
6. **Adminer:** Database management tool.
7. **Cadviser:** Real-time monitoring and visualization.
8. **FTP:** File Transfer Protocol service for secure file sharing.

## **Learning Outcomes**

This project served as a deep dive into Docker fundamentals, showcasing the power of containerization in building a complex, interconnected web ecosystem. The mastery of Docker, Docker-Compose, container architecture, networking, and volumes is evident in the seamless integration of diverse services.

## **Implementation Highlights**

Each service, from Nginx to FTP, is implemented from scratch in its own Docker container. This emphasizes the versatility and scalability of Docker in creating a robust and interconnected web environment.

## **Getting Started**

To get started with Project Inception, follow the steps outlined in Getting Started Guide.

## **Contributing**

Contributions are welcome! Please follow our Contribution Guidelines for more details.
