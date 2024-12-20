<?php
include 'Connexion/database.php';
session_start();
// add  tags 

if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tag_id = $_POST['tags']; 
    $user_id = $_SESSION['user_id'];

    // Image upload handling
    if ($_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_path = 'uploads/' . $image_name; 

        // Move uploaded image to the uploads folder
        move_uploaded_file($image_tmp_name, $image_path);
    } else {
        $image_path = NULL; // No image uploaded
    }

    // Insert into the article table
    $stmt = $connection->prepare("INSERT INTO article (title, content, image, user_id, Tags_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, current_timestamp(), current_timestamp())");
    $stmt->bind_param("sssii", $title, $content, $image_path, $user_id, $tag_id);

    if ($stmt->execute()) {
        echo "Article added successfully!";
        header("Location: addArticle.php"); // Redirect after successful insert
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $connection->close();
}

$tags = [];
$query = "SELECT id, name FROM tags";
$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tags[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($connection);
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://preline.co/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="dark:bg-neutral-900">
    <!-- ========== HEADER ========== -->
    <header class="bg-white border-b border-gray-200 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
        <nav class="relative max-w-[85rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <!-- Logo w/ Collapse Button -->
            <div class="flex items-center justify-between">
                <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80" href="#" aria-label="Brand">Brand</a>

                <!-- Collapse Button -->
                <div class="md:hidden">
                    <button type="button" class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-header-classic-collapse" aria-expanded="false" aria-controls="hs-header-classic" aria-label="Toggle navigation" data-hs-collapse="#hs-header-classic">
                        <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
                <!-- End Collapse Button -->
            </div>
            <!-- End Logo w/ Collapse Button -->

            <!-- Collapse -->
            <div id="hs-header-classic" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-classic-collapse">
                <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
                        <a class="p-2 flex items-center text-sm hover:text-gray-500 focus:outline-none focus:text-gray-500" href="index.php" aria-current="page">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            Home
                        </a>

                        <a class="p-2 flex items-center text-sm text-blue-600 focus:outline-none focus:text-blue-600" href="pageblog.php">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Blog
                        </a>

                        <a class="p-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500" href="#">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12h.01" />
                                <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                                <rect width="20" height="14" x="2" y="6" rx="2" />
                            </svg>
                            Contact us
                        </a>

                        <a class="p-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500" href="#">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                <path d="M18 14h-8" />
                                <path d="M15 18h-5" />
                                <path d="M10 6h8v4h-8V6Z" />
                            </svg>
                            About us
                        </a>

                        <!-- Button Group -->
                        <div class="relative flex flex-wrap items-center gap-x-1.5 md:ps-2.5 mt-1 md:mt-0 md:ms-1.5 before:block before:absolute before:top-1/2 before:-start-px before:w-px before:h-4 before:bg-gray-300 before:-translate-y-1/2">
                            <?php
                            if (isset($_SESSION['username'])) {
                                $username = $_SESSION['username'];
                                // Display username if logged in
                                echo '<span class="text-gray-800">Welcome, ' . $username . '!</span>';
                            ?>
                                <a class="p-2 w-full flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500" href="Connexion/logout.php">
                                    <svg class="shrink-0 size-4 me-3 md:me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                    </svg>
                                    Log out
                                </a>
                            <?php
                            } else {
                            ?>
                                <a class="p-2 w-full flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500" href="Connexion/login.php">
                                    <svg class="shrink-0 size-4 me-3 md:me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Log in
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>

    <!-- ========== MAIN CONTENT ========== -->
    <div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- Header -->
            <h2 class="text-2xl font-bold text-gray-800">Add a New Post</h2>
            <p class="text-sm text-gray-500">Fill out the form below to create a new post.</p>

            <!-- Tags -->
            <div class="flex items-center space-x-4">
                <!-- Tags Section -->
                <div class="flex-1">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                    <select name="tags" id="tags" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Choose a tag</option>
                        <?php
                        foreach ($tags as $tag) {
                            echo '<option value="' . $tag['id'] . '">' . $tag['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- New Tag Button -->
                <div>
                    <button id="newTagBtn" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        New Tag
                    </button>
                </div>
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter the title" required
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="5" placeholder="Write your content here" required
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-gray-700 file:bg-gray-100 hover:file:bg-gray-200" />
            </div>

            <!-- Hidden User ID -->
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="inline-block w-full md:w-auto px-6 py-2 text-white bg-indigo-600 font-medium text-sm rounded-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>


    </div>
    <!-- Popup Modal -->
    <div id="popupModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">
            <h2 class="text-xl font-bold text-gray-800">Add New Article</h2>
            <form method="POST" class="space-y-4">
                <!-- Title -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="name" id="name" placeholder="Enter the title" required
                        class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="button" id="closeModalBtn" class="mr-2 px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle the popup modal
        const newTagBtn = document.getElementById('newTagBtn');
        const popupModal = document.getElementById('popupModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // Show the popup
        newTagBtn.addEventListener('click', () => {
            popupModal.classList.remove('hidden');
        });

        // Close the popup
        closeModalBtn.addEventListener('click', () => {
            popupModal.classList.add('hidden');
        });

        // Close the popup when clicking outside of it
        popupModal.addEventListener('click', (event) => {
            if (event.target === popupModal) {
                popupModal.classList.add('hidden');
            }
        });
    </script>
    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>


</body>

</html>