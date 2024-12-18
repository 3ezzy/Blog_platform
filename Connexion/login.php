<?php
include 'database.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are not empty
    if (!empty($email) && !empty($password)) {
        // Prepare SQL to fetch the user
        $stmt = $connection->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $token = bin2hex(random_bytes(16));

            // Insert into userLogin table
            $stmt = $connection->prepare("INSERT INTO userLogin (userId, token) VALUES (?, ?)");
            $stmt->bind_param("is", $user['id'], $token);
            $stmt->execute();

            // Set cookies
            setcookie("user_id", $user['id'], time() + (86400 * 7), "/"); // Valid for 7 days
            setcookie("auth_token", $token, time() + (86400 * 7), "/");

            header("Location: ../index.php");
            exit;
        } else {
            echo "Invalid email or password.";
        }

        $stmt->close();
    } else {
        echo "Please fill in both fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="From bold visuals to interactive elements, this template is fully customizable to suit your unique needs and preferences.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Creative Agency Demo Template Tailwind CSS | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description" content="From bold visuals to interactive elements, this template is fully customizable to suit your unique needs and preferences.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Creative Agency Demo Template Tailwind CSS | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description" content="From bold visuals to interactive elements, this template is fully customizable to suit your unique needs and preferences.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://preline.co/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="dark:bg-neutral-900">
    <header class="bg-white border-b border-gray-200 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
        <nav class="relative max-w-[85rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <div class="flex items-center justify-between">
                <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80" href="#" aria-label="Brand">Brand</a>
            </div>
        </nav>
    </header>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md mx-auto mt-12 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-6 sm:p-8">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Sign in</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Don't have an account yet?
                        <a class="text-blue-600 hover:underline font-medium" href="register.php">Register</a>
                    </p>
                </div>

                <div class="mt-6">
                    <form method="POST">
                        <div class="grid gap-y-4">
                            <div>
                                <label for="email" class="block text-sm mb-2">Email address</label>
                                <input type="email" id="email" name="email" class="py-2.5 px-4 block w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="password" class="block text-sm mb-2">Password</label>
                                <input type="password" id="password" name="password" class="py-2.5 px-4 block w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="py-2 px-4 bg-blue-600 text-white rounded-lg">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
