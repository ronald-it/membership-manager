# Membership Manager

**Membership Manager** is a web application designed to help administrators manage members, families, and contributions efficiently. The app offers full CRUD functionality for managing data, automates processes like contribution updates, and generates new fiscal years seamlessly.

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

**Membership Manager** was developed as part of a backend development course, focusing on building a robust system for managing membership administration within an organization. The application leverages Laravel, Tailwind CSS, and MySQL to ensure consistent and efficient data management.

### Key Features:
- **Dashboard**: Overview of all families and their contributions.
- **Family Management**: CRUD operations for families and their members.
- **Contributions**: Automatically generated contributions per fiscal year, with specific rates based on membership types.
- **Membership Types**: Admins can manage membership categories and link them to contributions.

---

## Features

### CRUD Functionalities:
- **Families**: Add, edit, and delete families and their members.
- **Membership Types**: Modify membership descriptions and link them to specific contributions.
- **Contributions**: View and edit contributions for each fiscal year.

### Automatic Updates:
- Fiscal years and associated contributions are generated automatically via the `updateData()` function.

### Tailored Views:
- Non-logged-in users are greeted with clear login or registration prompts.
- Admins have access to user-friendly navigation and member management pages.

### Responsive Design:
- Optimized for various screen sizes using Tailwind CSS.

### Database Relationships:
- Families can have multiple members.
- Membership types and contributions are linked via clear relationships.

---

## Technologies Used
- **Laravel**: For backend logic and database management.
- **Tailwind CSS**: For styling and responsive design.
- **MySQL**: For data storage.
- **XAMPP**: For local server and database management.

---

## Getting Started

### Follow these steps to set up the application locally:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/ronald-it/membership-manager.git
   ```
2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Create the database**:
   - Open phpMyAdmin and create a new database called `membership_manager`.
   - Import the provided SQL export file.
4. **Run migrations and seed data**:
    ```bash
    php artisan migrate --seed
    ```
5. **Start the development server**:
    ```bash
    php artisan serve
    npm run dev 
    ```
6. **Access the application: Open http://localhost:8000 in your browser**

## Usage

### Navigation:
- **Dashboard**: The main screen shows an overview of all families with calculated contributions.
- **Family Management**:
  - Add a new family through the form.
  - Click on a family to manage or add members.
  - Edit or delete family details.
- **Membership Types**:
  - View and edit membership type descriptions.
- **Contributions**:
  - View contribution summaries by fiscal year.
  - Adjust contributions or add new values.

---

## Known Limitations

1. **Fiscal Year and Contributions**:
   - New contributions are automatically generated for new fiscal years, but existing fiscal years cannot be deleted.

2. **Multi-User Support**:
   - The application currently does not support multiple administrators with different permission levels.

---

## License

This project is licensed under the [MIT License](LICENSE).
