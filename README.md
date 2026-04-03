# ELIDEK Research Funding Management System

This project is a full-stack database application designed to manage the lifecycle of research grants, researcher demographics, and funding distributions for the **Hellenic Foundation for Research and Innovation (ELIDEK)**. It was developed as the semester project for the **Databases** course (6th Semester, 2021-2022) at the **National Technical University of Athens (NTUA)**.

---

## 📊 Design & Documentation
The foundation of this project is a rigorous design phase involving complex data modeling.
* **ER & Relational Models:** The complete Entity-Relationship diagram and the resulting Relational mapping—including schema justifications and normalization—are contained in the project report.
* **File Location:** `databases-elidek/docs/anafora.pdf`

---

## 🛠 Tech Stack
* **Database Management:** MySQL (MariaDB).
* **Server-Side Logic:** PHP.
* **Client-Side Interface:** HTML5, CSS3, and PHP.
* **Environment:** XAMPP (Apache server).
* **Design & Modeling:** MySQL Workbench.

---

## 🏗️ Database Architecture & Rules
The system enforces strict business logic through relational constraints:
* **Research Projects:** Funding ranges from **100,000€ to 1,000,000€**.
* **Project Duration:** Constraints ensure projects last between **1 and 4 years**.
* **Organization Hierarchy (ISA):** Organizations are categorized into **Universities**, **Research Centers**, and **Private Companies**, each with distinct budget sources.
* **Researcher Demographics:** Logic ensures researchers are between **18 and 67 years old**.
* **Integrity:** Implementation includes `PRIMARY KEY`, `FOREIGN KEY`, and `NOT NULL` constraints, with `ON DELETE CASCADE` and `ON UPDATE CASCADE` for referential integrity.

### Performance Optimization
To handle complex joins efficiently, the following **Indexes** were implemented:
* `idx_ID_ereuniti`: For researcher-related queries.
* `idx_ID_ergou`: For project tracking.
* `idx_ID_stelehous`: For executive funding management.
* `idx_ID_epistimoniko_pediou`: For scientific field analysis.

---

## 🔍 Key Features & Queries
The application provides a User Interface to execute advanced analytical tasks:
* **Dynamic Project Filtering:** Filter projects by date, duration, and managing executive.
* **Active Research Analysis:** Identify active projects and researchers in specific fields within the last year.
* **Organization Consistency:** Locate organizations with identical project counts for two consecutive years (min. 10 projects/year).
* **Interdisciplinary Trends:** Identify the **Top-3 pairs** of scientific fields that frequently appear together.
* **Young Researcher Tracking:** List researchers under 40 working on the highest number of active projects.
* **Financial Oversight:** Identify the **Top-5 executives** who authorized the highest total funding to private companies.
* **Compliance Tracking:** Find researchers involved in 5+ projects that have no recorded deliverables.

---

## 🚀 Setup & Installation
1. **Software:** Install [XAMPP](https://www.apachefriends.org/) and [MySQL Workbench](https://www.mysql.com/products/workbench/).
2. **Server Initialization:** Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. **Database Creation:** Run the DDL scripts to create the `elidek` schema and tables.
4. **Data Import:** Import CSV data in this order to satisfy foreign key constraints:
   1. Executive, 2. Scientific Field, 3. Organization, 4. Researcher, 5. Evaluation, 6. Program, 7. Project, 8. Deliverable, 9. Employment, 10. Organization Phones, 11. Project Fields.
5. **Deployment:** Place source files in the XAMPP `htdocs` directory and access via `localhost`.

---

## 👥 Contributors
* **Athanasios Varis**
* **Georgios Vlachopoulos**
* **Project Group 97**
