Description
The Custom Search Table with Niches plugin allows site admins to create a custom post type named Niches, where only admins can add, edit, or delete niches. Each niche can have a set of features associated with it. The plugin also provides a searchable table with an autocomplete search bar to filter and sort niches and their respective features.

Features
Custom Post Type: A custom post type for Niches.
Meta Box for Features: Admins can add/edit features for each niche using a meta box.
Search Functionality: Front-end search bar with autocomplete feature to filter through niches and features.
Admin Privileges: Only site admins can add, edit, or delete niches and features.
Lightweight & Fast: Efficient table and search functionality to ensure fast performance.
Modular Codebase: Plugin is separated into different modules for better maintainability and readability.
Installation
Download the Plugin:
Clone or download the plugin from the GitHub repository:

bash
Copy code
git clone https://github.com/ShakirDev/custom-search-table-wp.git
Upload to WordPress:
Upload the custom-search-table directory to the /wp-content/plugins/ directory.

Activate the Plugin:
Go to the WordPress dashboard.
Click on Plugins.
Find Custom Search Table with Niches, and click Activate.
Create a Page:
To display the searchable table, add the shortcode [searchable_niches_table] to any page or post.

Folder Structure
bash
Copy code
custom-search-table/
├── css/
│ └── styles.css # Styles for the plugin (if needed)
├── js/
│ └── search.js # JavaScript for handling search functionality
├── includes/
│ ├── cpt-niches.php # File to register the custom post type
│ ├── meta-boxes.php # File to handle the meta boxes for niches
│ ├── shortcode.php # File to handle the shortcode functionality
│ └── enqueue-scripts.php # File to enqueue scripts and styles
└── custom-search-table.php # Main plugin file
Usage
Create Niches:
Go to the WordPress Admin dashboard.
You will see a new menu called Niches.
Click Add New to create a new niche and add features using the Niche Features meta box.
Display the Searchable Table:
Create a new page or post in WordPress.
Use the shortcode [searchable_niches_table] to display the searchable table.
Search Functionality:
Users can search for a niche or its features using the search bar.
Exact matches and partial matches in niche titles and features will appear dynamically as they type.
Contributing
Fork the Repository.
Create a new branch (git checkout -b feature/your-feature).
Make your changes.
Commit your changes (git commit -am 'Add new feature').
Push to the branch (git push origin feature/your-feature).
Create a new Pull Request.
License
This plugin will be licensed under the MIT License. The license will be added in a future commit.
