# Membership Manager

[Live Demo](https://membership-manager.onrender.com/)

**Membership Manager** is a web application designed to help administrators efficiently manage families and their family members. The application also provides the ability to manage member types descriptions and contribution amounts. Additionally, it automates processes such as updating fiscal years, contributions and the member type of a family member.

## Table of Contents
1. [Description](#description)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Getting Started](#getting-started)
5. [Usage](#usage)
6. [Known Limitations](#known-limitations)
7. [License](#license)

---

## Description

**Membership Manager** was developed as part of a backend development course, focusing on building a robust system for managing a membership administration within an organization. The application leverages Laravel with Blade, Tailwind CSS, and PostgreSQL to ensure consistent and efficient data management.

Membership Manager provides a robust and user-friendly system for managing membership administration within an organization. The app is divided into three main sections:

1. **Families**: View all families and perform CRUD operations on families and their members.
2. **Member Types**: View all member types and update their descriptions as needed.
3. **Contributions**: View all contributions and update their amounts.

---

## Features

- **CRUD Functionalities**: The app provides full CRUD functionalities across four main sections:
   - Families: View all families, manage their details, and add or remove associated family members.
   - Member Types: View all member types and update their descriptions.
   - Contributions: View all contributions and update their contribution amounts.
   - User Authentication: Register new users and authenticate existing users by checking stored credentials.

- **Responsive Design**: Built with Tailwind CSS to ensure a seamless user experience across mobile, tablet, and desktop devices.

- **Tailored Views**: Logged-in users can access all sections of the app, while non-logged-in users are prompted to log in or register.

- **Customizable Data**: Administrators can define and adjust member types, contribution amounts, and family details to fit the organization's needs.

- **Database Relationships**: The relationships between tables (such as families, members, member types, contributions and fiscal years) are defined using Laravel Models to ensure consistent and efficient data management.


---

## Technologies Used
- **Laravel with Blade**: For backend logic, templating, and database management.
- **Tailwind CSS**: For styling and responsive design.
- **MySQL**: Used as the database during local development with XAMPP.
- **PostgreSQL**: Used as the database for the hosted version on Render.
- **XAMPP**: For local server and database management during development.


---

## Getting Started

### Follow these steps to set up the application locally:

1. **Install prerequisites**:
   - Install [XAMPP](https://www.apachefriends.org/index.html) on your computer and start both Apache and MySQL in the XAMPP control panel.
   - Install [Composer](https://getcomposer.org/) and ensure you check the "Add to PATH" option during installation.
   - Install Laravel globally via Composer:
     ```bash
     composer global require "laravel/installer"
     ```

2. **Clone the repository**:
   - Place the cloned repository into the `c:\xampp\htdocs` directory:
     ```bash
     git clone https://github.com/ronald-it/membership-manager.git
     ```

3. **Set up the database**:
   - Open phpMyAdmin by navigating to [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser.
   - In phpMyAdmin, do the following:
     1. Click on the **"New"** button in the left sidebar.
     2. Enter `membership_manager` as the database name.
     3. Click **"Create"** to create the database.

4. **Configure the `.env` file**:
   - Create a copy of the `.env.example` file and rename it to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Open the `.env` file and configure the following database settings to match your local environment:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=membership_manager
     DB_USERNAME=root
     DB_PASSWORD=
     ```
     - `DB_DATABASE`: The name of the database you just created (`membership_manager`).
     - `DB_USERNAME` and `DB_PASSWORD`: Set these according to your local MySQL setup (default for XAMPP is `root` with no password).

5. **Run migrations and seed data**:
   - Navigate to the project directory in your terminal:
     ```bash
     cd c:\xampp\htdocs\membership-manager
     ```
   - Execute the following command to set up the database schema and seed data:
     ```bash
     php artisan migrate --seed
     ```

6. **Install dependencies**:
   - Install PHP dependencies via Composer:
     ```bash
     composer install
     ```
   - Install frontend dependencies:
     ```bash
     npm install
     ```

7. **Start the development server**:
   - Start the Laravel server:
     ```bash
     php artisan serve
     ```
   - In a separate terminal, start the Tailwind CSS development process:
     ```bash
     npm run dev
     ```

8. **Access the application**:
   - Open your browser and navigate to [http://localhost:8000](http://localhost:8000) to view the application.

## Usage

The Membership Manager application is divided into four main sections: Families, Member Types, Contributions, and Authorization. Below is an overview of what you can do in each section.

### Families Section
- **Dashboard**:
  - Displays an overview of all families and their calculated contributions.
  - Click the "Edit" button next to a family to navigate to the **Family Edit Page**.
  - Click the "Add New Family" button to navigate to the **Family Create Page**.
- **Family Create Page**:
  - Fill in the name and address of a family.
  - Click the "Confirm" button to create the new family.
- **Family Edit Page**:
  - Update the address of a family and click "Confirm" to save changes.
  - Delete the family by clicking the "Delete Family" button.
  - For each family member:
    - Click the "Delete" button to remove the member.
  - Add a new family member by entering the name and birthdate, then click the "Add Member" button.

### Member Types Section
- **Member Type Overview Page**:
  - View all member types.
  - Click the "Edit" button next to a member type to navigate to the **Member Type Edit Page**.
- **Member Type Edit Page**:
  - Update the description of the member type and click "Confirm" to save changes.

### Contributions Section
- **Contributions Overview Page**:
  - View all contributions for each fiscal year.
  - Click the "Edit" button next to a contribution to navigate to the **Contribution Edit Page**.
- **Contribution Edit Page**:
  - Update the contribution amount and click "Confirm" to save changes.

### Authorization Section
- **Registration Page**:
  - Enter a username, email address, and password to register.
  - Upon successful registration, the user is automatically logged in.
- **Login Page**:
  - Enter an email address and password to log in and gain access to the application.

---

## Known Limitations

1. **Fiscal Year and Contributions**:
   - New contributions are automatically generated for new fiscal years, but existing fiscal years cannot be deleted.

2. **Multi-User Support**:
   - The application does not support multiple administrators with different permission levels.

---

## License

This project is licensed under the [MIT License](LICENSE).
