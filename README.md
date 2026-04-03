# ELIDEK Research Funding Management System

[cite_start]This project is a full-stack database application designed to manage the lifecycle of research grants, researcher demographics, and funding distributions for the **Hellenic Foundation for Research and Innovation (ELIDEK)**[cite: 6, 9]. [cite_start]It was developed as the semester project for the **Databases** course (6th Semester, 2021-2022) at the **National Technical University of Athens (NTUA)**[cite: 3, 4].

---

## 📊 Design & Documentation
[cite_start]The foundation of this project is a rigorous design phase involving complex data modeling[cite: 94, 95].
* [cite_start]**ER & Relational Models:** The complete Entity-Relationship diagram and the resulting Relational mapping—including schema justifications and normalization—are contained in the project report[cite: 29, 31, 139].
* **File Location:** `databases-elidek/docs/anafora.pdf`

---

## 🛠 Tech Stack
* [cite_start]**Database Management:** MySQL (MariaDB)[cite: 60, 388].
* [cite_start]**Server-Side Logic:** PHP[cite: 60, 390].
* [cite_start]**Client-Side Interface:** HTML5, CSS3, and PHP[cite: 60, 391].
* [cite_start]**Environment:** XAMPP (Apache server)[cite: 387, 390].
* [cite_start]**Design & Modeling:** MySQL Workbench[cite: 389].

---

## 🏗️ Database Architecture & Rules
[cite_start]The system enforces strict business logic through relational constraints[cite: 32, 33, 195]:
* [cite_start]**Research Projects:** Funding ranges from **100,000€ to 1,000,000€**[cite: 8].
* [cite_start]**Project Duration:** Constraints ensure projects last between **1 and 4 years**[cite: 12, 275].
* [cite_start]**Organization Hierarchy (ISA):** Organizations are categorized into **Universities**, **Research Centers**, and **Private Companies**, each with distinct budget sources[cite: 18, 19, 20, 230].
* [cite_start]**Researcher Demographics:** Logic ensures researchers are between **18 and 67 years old**[cite: 243].
* [cite_start]**Integrity:** Implementation includes `PRIMARY KEY`, `FOREIGN KEY`, and `NOT NULL` constraints, with `ON DELETE CASCADE` and `ON UPDATE CASCADE` for referential integrity[cite: 195, 250, 251].

### Performance Optimization
[cite_start]To handle complex joins efficiently, the following **Indexes** were implemented[cite: 37, 373]:
* [cite_start]`idx_ID_ereuniti`: For researcher-related queries[cite: 374].
* [cite_start]`idx_ID_ergou`: For project tracking[cite: 377].
* [cite_start]`idx_ID_stelehous`: For executive funding management[cite: 379].
* [cite_start]`idx_ID_epistimoniko_pediou`: For scientific field analysis[cite: 382].

---

## 🔍 Key Features & Queries
[cite_start]The application provides a User Interface to execute advanced analytical tasks[cite: 38, 39]:
* [cite_start]**Dynamic Project Filtering:** Filter projects by date, duration, and managing executive[cite: 42, 43].
* [cite_start]**Active Research Analysis:** Identify active projects and researchers in specific fields within the last year[cite: 46, 47].
* [cite_start]**Organization Consistency:** Locate organizations with identical project counts for two consecutive years (min. 10 projects/year)[cite: 48].
* [cite_start]**Interdisciplinary Trends:** Identify the **Top-3 pairs** of scientific fields that frequently appear together[cite: 50].
* [cite_start]**Young Researcher Tracking:** List researchers under 40 working on the highest number of active projects[cite: 51].
* [cite_start]**Financial Oversight:** Identify the **Top-5 executives** who authorized the highest total funding to private companies[cite: 52, 53].
* [cite_start]**Compliance Tracking:** Find researchers involved in 5+ projects that have no recorded deliverables[cite: 54].

---

## 🚀 Setup & Installation
1. [cite_start]**Software:** Install [XAMPP](https://www.apachefriends.org/) and [MySQL Workbench](https://www.mysql.com/products/workbench/)[cite: 393].
2. [cite_start]**Server Initialization:** Start **Apache** and **MySQL** from the XAMPP Control Panel[cite: 394].
3. [cite_start]**Database Creation:** Run the DDL scripts to create the `elidek` schema and tables[cite: 395, 396].
4. [cite_start]**Data Import:** Import CSV data in this order to satisfy foreign key constraints[cite: 397, 398]:
   1. [cite_start]Executive, 2. Scientific Field, 3. Organization, 4. Researcher, 5. Evaluation, 6. Program, 7. Project, 8. Deliverable, 9. Employment, 10. Organization Phones, 11. Project Fields [cite: 399-416].
5. [cite_start]**Deployment:** Place source files in the XAMPP `htdocs` directory and access via `localhost`[cite: 417, 418].

---

## 👥 Contributors
* [cite_start]**Athanasios Varis**[cite: 89].
* [cite_start]**Georgios Vlachopoulos**[cite: 89].
* [cite_start]**Project Group 97**[cite: 92].
