# Conference Management System

A comprehensive web-based application for managing conferences, including creating, viewing, updating, and deleting conference information. Built with PHP, MySQL, and modern web technologies.

## 🌟 Features

- **Conference Management**: Complete CRUD (Create, Read, Update, Delete) operations for conferences
- **User-Friendly Interface**: Clean and intuitive UI for easy navigation
- **Real-time Updates**: Dynamic content loading using AJAX
- **Responsive Design**: Works seamlessly across different devices and screen sizes
- **Database Integration**: Robust MySQL database backend for data persistence
- **Search and Filter**: Find conferences quickly with built-in search functionality
- **Form Validation**: Client and server-side validation for data integrity

## 🛠️ Technology Stack

- **Frontend**:
  - HTML5
  - CSS3 (Custom Styles)
  - JavaScript (Vanilla JS for AJAX operations)
  - Font Awesome Icons
  
- **Backend**:
  - PHP 8.2+
  - Object-Oriented Programming (OOP) design patterns
  - PDO for secure database operations
  
- **Database**:
  - MySQL/MariaDB
  - Prepared statements for SQL injection prevention

## 📋 Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP 8.2 or higher
- MySQL 5.7+ or MariaDB 10.4+
- Apache/Nginx Web Server
- Web browser (Chrome, Firefox, Safari, or Edge)

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/SDRasanjana/Conference-Management.git
cd Conference-Management
```

### 2. Database Setup

1. Start your MySQL/MariaDB server
2. Create a new database named `conference`
3. Import the database schema:

```bash
mysql -u root -p conference < Conference-Management/conference.sql
```

Or manually import using phpMyAdmin:
- Open phpMyAdmin
- Create a database named `conference`
- Import the `conference.sql` file from the `Conference-Management` folder

### 3. Configure Database Connection

Update the database credentials in `Conference-Management/classes/DbConnector.php` if needed:

```php
private string $host = 'localhost';
private string $db = 'conference';
private string $username = 'root';
private string $password = '';
```

### 4. Web Server Configuration

#### Using XAMPP/WAMP:

1. Copy the `Conference-Management` folder to your web server's document root:
   - XAMPP: `C:\xampp\htdocs\`
   - WAMP: `C:\wamp64\www\`
   
2. Start Apache and MySQL from the XAMPP/WAMP control panel

3. Access the application at: `http://localhost/Conference-Management/`

#### Using PHP Built-in Server (Development Only):

```bash
cd Conference-Management
php -S localhost:8000
```

Access the application at: `http://localhost:8000/`

## 📖 Usage

### Viewing Conferences

1. Navigate to the home page at `http://localhost/Conference-Management/`
2. Click on "View Conferences" to see the list of all conferences
3. The conference list displays:
   - Conference Name
   - Date
   - Location
   - Action buttons (Edit/Delete)

### Adding a New Conference

1. Navigate to the "Manage Conference" page or click "Add Conference"
2. Fill in the form with:
   - Conference Name
   - Description
   - Date
   - Host Organization
   - Location
3. Click "Save Conference" to add it to the database

### Updating a Conference

1. From the conference list, click the "Edit" button on the conference you want to update
2. Modify the conference details in the popup form
3. Click "Update" to save changes

### Deleting a Conference

1. From the conference list, click the "Delete" button on the conference you want to remove
2. Confirm the deletion
3. The conference will be removed from the database

## 📁 Project Structure

```
Conference-Management/
├── Conference-Management/
│   ├── api/                    # API endpoints for CRUD operations
│   │   ├── add.php            # Add new conference
│   │   ├── delete.php         # Delete conference
│   │   ├── get_conferences.php # Fetch all conferences
│   │   └── update.php         # Update conference
│   ├── classes/               # PHP classes
│   │   ├── Conference.php     # Conference model
│   │   └── DbConnector.php    # Database connection handler
│   ├── components/            # Reusable HTML components
│   │   ├── header.html        # Header component
│   │   └── footer.html        # Footer component
│   ├── conferences/           # Conference listing page
│   │   └── index.php          # Display all conferences
│   ├── css/                   # Stylesheets
│   │   └── styles.css         # Main stylesheet
│   ├── font-awesome/          # Font Awesome icons
│   ├── images/                # Image assets
│   ├── manage-conference/     # Conference management page
│   │   └── index.php          # Add/Edit conference form
│   ├── index.php              # Home page
│   └── conference.sql         # Database schema
└── README.md                  # Project documentation
```

## 🗄️ Database Schema

The `conferences` table structure:

| Column      | Type         | Description                    |
|-------------|--------------|--------------------------------|
| id          | INT(11)      | Primary key (Auto Increment)   |
| name        | VARCHAR(255) | Conference name                |
| description | TEXT         | Conference description         |
| date        | DATE         | Conference date                |
| host        | VARCHAR(255) | Host organization              |
| location    | VARCHAR(255) | Conference location            |

## 🔒 Security Features

- **SQL Injection Prevention**: Uses PDO prepared statements
- **XSS Protection**: Input sanitization with `htmlspecialchars()`
- **Error Handling**: Comprehensive exception handling
- **Input Validation**: Client and server-side validation

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/your-feature-name`)
3. Make your changes
4. Commit your changes (`git commit -am 'Add some feature'`)
5. Push to the branch (`git push origin feature/your-feature-name`)
6. Create a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👤 Author

**SDRasanjana**

- GitHub: [@SDRasanjana](https://github.com/SDRasanjana)

## 🐛 Known Issues

- None currently reported

## 📞 Support

If you encounter any issues or have questions, please:
- Open an issue on GitHub
- Contact the repository owner

## 🔮 Future Enhancements

Potential features for future versions:
- User authentication and authorization
- Conference registration system
- Email notifications
- Export conference data to PDF/CSV
- Advanced search and filtering options
- Multi-language support
- Conference schedule management
- Speaker management
- Attendee management

---

⭐ If you find this project helpful, please consider giving it a star on GitHub!