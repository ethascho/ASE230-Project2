+++
title = "Project 1 – REST API Tutorial"
date = 2025-12-02
draft = false
type = "page"
+++

---

# Project 1 – REST API Tutorial
### ASE 230 – Ethan Schoultheis  
**Instructor:** Professor Samuel Cho  
**Project Goal:** Build a complete REST API in PHP/MySQL with authentication and deployment.

---

# Slide 2 – Overview

This project demonstrates a RESTful web service built using:
- **PHP** (server-side scripting)
- **MySQL** database integration
- **Bearer Token** authentication
- **CRUD** operations for student data
- Testing using **cURL** and **HTML/JavaScript**
- Deployment with **NGINX**

![bg left height:6in](/images/image-2.png)


---

# Slide 3 – Objectives

- Understand how REST APIs communicate using HTTP methods  
- Implement CRUD in PHP and connect to MySQL  
- Secure access using token-based authentication  
- Test API endpoints via cURL and browser  
- Document and deploy the final project  

---

# Slide 4 – System Architecture

**Frontend:** HTML/JavaScript Test Page  
**Backend:** PHP REST API  
**Database:** MySQL (via phpMyAdmin)

Flow:
1. Client sends HTTP request.  
2. PHP interprets request and interacts with MySQL.  
3. Response returns JSON.

![Screenshot 2025-10-17 203221](/images/Screenshot%202025-10-17%20203221.png)


---

# Slide 5 – Database Design

**Database Name:** `restapi`  
**Tables:**  
1. `students`  
2. `users`

![](/images/Screenshot%202025-10-17%20203647.png)

---

# Slide 6 – Users Table Structure

| Column | Type | Description |
|---------|------|-------------|
| id | INT | Primary key |
| username | VARCHAR(50) | Unique login name |
| password_hash | VARCHAR(255) | Hashed password |
| role | VARCHAR(20) | User role |
| token | VARCHAR(64) | Session token |
| created_at | DATETIME | Created timestamp |

![](/images/Screenshot%202025-10-17%20205352.png)

---

# Slide 7 – Students Table Structure

| Column | Type | Description |
|---------|------|-------------|
| id | INT | Auto increment |
| name | VARCHAR(100) | Student name |
| age | INT | Age |
| major | VARCHAR(50) | Major field |
| created_at | DATETIME | Date added |

![](/images/Screenshot%202025-10-17%20204115.png)

---

# Slide 8 – API Endpoints Summary

| Endpoint | Method | Description |
|-----------|---------|-------------|
| `/students` | GET | List all students |
| `/students/{id}` | GET | Retrieve specific student |
| `/students` | POST | Add new student |
| `/students/{id}` | PUT | Update student |
| `/students/{id}` | DELETE | Delete student |
| `/auth/login` | POST | Login & return token |
| `/auth/profile` | GET | View user profile |
| `/auth/logout` | POST | Logout and clear token |

---

# Slide 9 – GET /students

**Request**
```bash
curl http://localhost/project1/code/index.php/students
```
**Response** 
```json
{
  "success": true,
  "message": "All students",
  "data": [
    {"id":1,"name":"Alice","age":21,"major":"Math"}
  ]
}
```
---

# Slide 10 – GET /students

**Request**
```bash
curl http://localhost/project1/code/index.php/students/1
```

**Response**
(Note: I added too many on accident)
```json
{
  "success": true,
  "message": "Student found",
  "data": {"id":1,"name":"Alice","age":21,"major":"Math"}
}
```
![](/images/Screenshot%202025-10-17%20211441.png)

---

# Slide 11 – POST /students

**request**
```bash
curl -X POST -H "Content-Type: application/json" \
  -d '{"name":"John Doe","age":22,"major":"CS"}' \
  http://localhost/project1/code/index.php/students


```

**Response**
```json
{"success": true, "message": "Student added", "data": {"id": 11}}
```
![](/images/Screenshot%202025-10-17%20212117.png)

---

# Slide 12 – PUT /students/{id}

**request**
```bash
curl -X PUT -H "Content-Type: application/json" \
  -d '{"major":"Software Engineering"}' \
  http://localhost/project1/code/index.php/students/5

```

**Response**
```json
{"success": true, "message": "Student updated successfully"}
```
![](/images/Screenshot%202025-10-17%20212940.png)

---

# Slide 13 – DELETE /students/{id}

**request**
```bash
curl -X DELETE http://localhost/project1/code/index.php/students/25

```

**Response**
```json
{"success": true, "message": "Student deleted"}
```
![](/images/Screenshot%202025-10-17%20220332.png)

---

# Slide 14 – POST /auth/login

**request**
```bash
curl -X POST -H "Content-Type: application/json" \
  -d '{"username":"student","password":"password"}' \
  http://localhost:80/project1/code/index.php/auth/login
```

**Response**
```json
{
  "success": true,
  "message": "Login successful",
  "data": { "token": "bef63eb62764ff..." }
}

```
![](/images/Screenshot%202025-10-18%20015418.png)

---

# Slide 15 – GET /auth/profile

**request**
```bash
curl -H "Authorization: Bearer <token>" \
  http://localhost/project1/code/index.php/auth/profile

```

**Response**
```json
{
  "id": 1,
  "username": "student",
  "role": "student"
}

```

![](/images/Screenshot%202025-10-18%20020439.png)

---

# Slide 16 – POST /auth/logout

**request**
```bash
curl -X POST -H "Authorization: Bearer <token>" \
  http://localhost:80/project1/code/index.php/auth/logout

```

**Response**
```json
{"success": true, "message": "Logged out successfully"}

```

![](/images/Screenshot%202025-10-18%20020618.png)

---

# Slide 17 - Testing With cURL

* Used curl_tests.php to automate endpoint validation

* Confirms all CRUD and auth endpoints work

* Each test returns JSON showing success/failure

* Helps detect broken routes quickly

![](/images/Screenshot%202025-10-18%20023421.png)
![](/images/Screenshot%202025-10-18%20023702.png)


--- 

# Slide 18 – Testing With HTML/JS

* Provides user-friendly browser test buttons

* Tests all /students and /auth routes

* Displays formatted JSON output for readability

![](/images/Screenshot%202025-10-18%20024040.png)

---

# Slide 19 – Deployment Preparation (NGINX)

* Exported working REST API from XAMPP

* Configured /etc/nginx/sites-available/project1.conf

* Verified with sudo nginx -t

* Restarted service and confirmed endpoints run under http://localhost/project1


![](/images/Screenshot%202025-10-18%20024239.png)

---

# Slide 20 – Key Takeaways

Learned REST architecture and HTTP methods
- Implemented secure authentication
- Practiced database integration
- Tested and debugged API endpoints
- Documented and deployed project successfully

