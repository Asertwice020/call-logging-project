# Android Call Logger - Interview Test

This project consists of an Android application (`app`) that logs phone call details and sends them to a PHP `backend`. The backend stores the data in a MySQL `database` and a simple web `frontend` displays the logs.

## Project Structure

\`\`\`
.
├── app/        # Android Studio Project (empty placeholder - full app using java)
├── backend/    # PHP scripts for API logic
├── frontend/   # HTML and JS for the web display
├── database/   # SQL schema file
└── README.md
\`\`\`

## Setup Instructions

### 1. Backend, Frontend, & Database Setup

You will need a web server with PHP and MySQL (e.g., XAMPP, WAMP, MAMP).

1.  **Database:**
    -   Create a new MySQL database (e.g., `call_logger_db`).
    -   Import or run the SQL script from `database/schema.sql` to create the `calls` table.

2.  **Web Server:**
    -   Copy the `backend` and `frontend` folders from this project into your web server's root directory (e.g., `htdocs` in XAMPP).

3.  **Configure Backend:**
    -   Open `backend/db_config.php` and update the database credentials (`DB_SERVER`, `DB_USERNAME`, `DB_PASSWORD`, `DB_NAME`).

4.  **Test Frontend:**
    -   Navigate to `http://localhost/frontend/` in your browser. You should see an empty table.

### 2. Android App Setup

1.  **Create/Open Project:**
    -   Create a new Android project or use an existing one. Place it inside the `app` folder.

2.  **Configure API URL:**
    -   In your Android app's network/API helper class, set the API endpoint URL.
    -   Find your computer's local IP address (e.g., by running `ipconfig` or `ifconfig`). **Do not use `localhost`**.
    -   The URL should point to your `log_call.php` script: `http://YOUR_COMPUTER_IP/backend/log_call.php`

3.  **Build and Run:**
    -   Ensure your phone and computer are on the **same Wi-Fi network**.
    -   Run the app, grant permissions, and make a test call.

## How to Test

1.  After the service is running on the Android app, make or receive a phone call.
2.  After the call ends, refresh the frontend page in your browser (`http://localhost/frontend/`).
3.  The new call log should appear in the table.
