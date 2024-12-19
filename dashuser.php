<?php
include 'Connexion/database.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex flex-col md:flex-row">

        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-blue-900 text-white md:h-screen shadow-lg">
            <div class="p-6 text-2xl font-bold tracking-wide flex justify-between items-center md:block">
                <span>Admin Panel</span>
                <button id="toggleSidebar" class="md:hidden text-white text-2xl">&#9776;</button>
            </div>
            <ul id="sidebarMenu" class="hidden md:block mt-6 md:mt-12 space-y-6">
                <li><a href="admin.php" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Dashboard</a></li>
                <li><a href="dashuser.php" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Users</a></li>
                <li><a href="dasharticle.php" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Articles</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Orders</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div class="text-3xl font-semibold text-gray-800">Users</div>
                <div class="flex items-center space-x-4">
                    <a href="Connexion/login.php" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition duration-200">
                        Log out
                    </a>
                </div>
            </div>

            <!-- Latest Users Table -->
            <div class="bg-white shadow-xl rounded-lg p-6 overflow-x-auto">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Latest Users</h3>
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-600">ID</th>
                            <th class="py-4 px-6 text-left text-gray-600">Full Name</th>
                            <th class="py-4 px-6 text-left text-gray-600">Email</th>
                            <th class="py-4 px-6 text-left text-gray-600">Username</th>
                            <th class="py-4 px-6 text-left text-gray-600">Password</th>
                            <th class="py-4 px-6 text-left text-gray-600">Role</th>
                            <th class="py-4 px-6 text-left text-gray-600">Created At</th>
                            <th class="py-4 px-6 text-left text-gray-600">Updated At</th>
                            <th class="py-4 px-6 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-6">#001</td>
                            <td class="py-3 px-6">John Doe</td>
                            <td class="py-3 px-6">johndoe@example.com</td>
                            <td class="py-3 px-6">johndoe</td>
                            <td class="py-3 px-6">••••••••</td>
                            <td class="py-3 px-6">Admin</td>
                            <td class="py-3 px-6">2024-01-01</td>
                            <td class="py-3 px-6">2024-01-10</td>
                            <td class="py-3 px-6">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-full mr-3 hover:bg-yellow-400 transition duration-200">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-400 transition duration-200">Delete</button>
                            </td>
                        </tr>
                        <!-- Additional Rows -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebarMenu = document.getElementById('sidebarMenu');

        toggleSidebar.addEventListener('click', () => {
            sidebarMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
