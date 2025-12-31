<?php
// Simple database setup script
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=optimizo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to database successfully!\n\n";

    // Read and execute SQL file
    $sql = file_get_contents(__DIR__ . '/database/optimizo_setup.sql');

    // Split by semicolon and execute each statement
    $statements = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($statements as $statement) {
        if (empty($statement) || strpos($statement, '--') === 0) {
            continue;
        }

        try {
            $pdo->exec($statement);
            echo ".";
        } catch (PDOException $e) {
            // Ignore errors for existing tables/data
            if (
                strpos($e->getMessage(), 'already exists') === false &&
                strpos($e->getMessage(), 'Duplicate entry') === false
            ) {
                echo "\nWarning: " . $e->getMessage() . "\n";
            }
        }
    }

    echo "\n\nDatabase setup complete!\n";
    echo "Tables created successfully.\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
