I built a simple online store – Alex Shop – where user can choose between 2 available items (2 T-shirts). The store was built with Bootstrap 4 and PHP v8.0.11. For this project I used XAMPP to run Apache server on my localhost (Apache v2.4.51). 

In this website I exploit the LFI vulnerability. By saying this I mean that my website uses a file path as an input and the website treats that input as trusted and safe. This can lead to “Directory Traversal” attacks, where an attacker will try to find and access files on the web server to gain access to sensitive data etc.

For more information please read the PDF file in this repo.
