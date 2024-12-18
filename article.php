<?php
include 'Connexion/database.php';
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Page</title>
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
                <li><a href="user.php" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Users</a></li>
                <li><a href="article.php" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Articles</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Orders</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div class="text-3xl font-semibold text-gray-800">Articles</div>
                <div class="flex items-center space-x-4">
                    <a href="Connexion/login.php" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition duration-200">
                        Log out
                    </a>
                </div>
            </div>

            <!-- Articles Table -->
            <div class="bg-white shadow-xl rounded-lg p-6 overflow-x-auto">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Articles List</h3>
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-600">ID</th>
                            <th class="py-4 px-6 text-left text-gray-600">Title</th>
                            <th class="py-4 px-6 text-left text-gray-600">Content</th>
                            <th class="py-4 px-6 text-left text-gray-600">Image</th>
                            <th class="py-4 px-6 text-left text-gray-600">User ID</th>
                            <th class="py-4 px-6 text-left text-gray-600">Tags ID</th>
                            <th class="py-4 px-6 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-6">#001</td>
                            <td class="py-3 px-6">Introduction to Tailwind CSS</td>
                            <td class="py-3 px-6">A guide to getting started with Tailwind CSS.</td>
                            <td class="py-3 px-6">
                                <img src="https://via.placeholder.com/100" alt="Article Image" class="w-20 h-20 object-cover">
                            </td>
                            <td class="py-3 px-6">12</td>
                            <td class="py-3 px-6">5</td>
                            <td class="py-3 px-6">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-full mr-3 hover:bg-yellow-400 transition duration-200">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-400 transition duration-200">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
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
